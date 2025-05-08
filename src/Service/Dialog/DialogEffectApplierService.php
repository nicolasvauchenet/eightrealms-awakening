<?php

namespace App\Service\Dialog;

use App\Entity\Character\Player;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Item;
use App\Entity\Location\Location;
use App\Entity\Quest\PlayerQuest;
use App\Entity\Location\CharacterLocation;
use App\Entity\Quest\PlayerQuestStep;
use App\Entity\Quest\Quest;
use App\Service\Character\CharacterReputationService;
use App\Service\Game\Reward\RewardService;
use Doctrine\ORM\EntityManagerInterface;

readonly class DialogEffectApplierService
{
    public function __construct(
        private EntityManagerInterface     $entityManager,
        private RewardService              $rewardService,
        private CharacterReputationService $characterReputationService)
    {
    }

    public function applyEffects(?array $effects, Player $player): void
    {
        if(empty($effects)) {
            return;
        }

        foreach($effects as $type => $value) {
            $this->apply($type, $value, $player);
        }

        $this->entityManager->flush();
    }

    private function apply(string $type, mixed $value, Player $player): void
    {
        match ($type) {
            'reveal_location' => $this->revealLocation($player, $value),
            'start_quest' => $this->startQuest($player, $value),
            'edit_quest_step_status' => $this->editQuestStepStatus($player, $value),
            'start_quest_step' => $this->startQuestStep($player, $value),
            'add_items' => $this->addItems($player, $value),
            'remove_items' => $this->removeItems($player, $value),
            'reward_quest' => $this->rewardQuest($player, $value),
            default => null,
        };
    }

    private function revealLocation(Player $player, string $slug): void
    {
        $location = $this->entityManager->getRepository(Location::class)->findOneBy(['slug' => $slug]);
        if(!$location) return;

        $existing = $this->entityManager->getRepository(CharacterLocation::class)->findOneBy([
            'character' => $player,
            'location' => $location,
        ]);

        if(!$existing) {
            $characterLocation = (new CharacterLocation())
                ->setCharacter($player)
                ->setLocation($location);
            $this->entityManager->persist($characterLocation);
        }
    }

    private function startQuest(Player $player, string $slug): void
    {
        $quest = $this->entityManager->getRepository(Quest::class)->findOneBy(['slug' => $slug]);
        if(!$quest) return;

        $existing = $this->entityManager->getRepository(PlayerQuest::class)->findOneBy([
            'player' => $player,
            'quest' => $quest,
        ]);

        if(!$existing) {
            $playerQuest = (new PlayerQuest())
                ->setPlayer($player)
                ->setQuest($quest)
                ->setStatus('progress');

            $this->entityManager->persist($playerQuest);

            foreach($quest->getQuestSteps() as $step) {
                if($step->isFirst()) {
                    $playerQuestStep = (new PlayerQuestStep())
                        ->setPlayer($player)
                        ->setQuestStep($step)
                        ->setPlayerQuest($playerQuest)
                        ->setStatus('progress');

                    $this->entityManager->persist($playerQuestStep);
                    break;
                }
            }
        }
    }

    private function startQuestStep(Player $player, array $data): void
    {
        $entries = isset($data['quest']) ? [$data] : $data;

        foreach($entries as $entry) {
            if(!isset($entry['quest'], $entry['quest_step'])) {
                continue;
            }

            $quest = $this->entityManager->getRepository(Quest::class)->findOneBy(['slug' => $entry['quest']]);
            if(!$quest) {
                continue;
            }

            $step = $quest->getQuestSteps()->filter(fn($s) => $s->getPosition() === $entry['quest_step'])->first();
            if(!$step) {
                continue;
            }

            $playerQuest = $this->entityManager->getRepository(PlayerQuest::class)->findOneBy([
                'player' => $player,
                'quest' => $quest,
            ]);
            if(!$playerQuest) {
                continue;
            }

            $existing = $this->entityManager->getRepository(PlayerQuestStep::class)->findOneBy([
                'player' => $player,
                'questStep' => $step,
            ]);
            if($existing) {
                continue;
            }

            $playerQuestStep = (new PlayerQuestStep())
                ->setPlayer($player)
                ->setQuestStep($step)
                ->setPlayerQuest($playerQuest)
                ->setStatus($entry['status'] ?? 'progress');

            $this->entityManager->persist($playerQuestStep);
        }
    }

    private function editQuestStepStatus(Player $player, array $data): void
    {
        $entries = isset($data['quest']) ? [$data] : $data;

        // On prépare une map des statuts explicitement demandés
        $manualStatuses = [];
        foreach($entries as $entry) {
            if(isset($entry['quest'], $entry['quest_step'], $entry['status'])) {
                $manualStatuses[$entry['quest']][$entry['quest_step']] = $entry['status'];
            }
        }

        foreach($entries as $entry) {
            if(!isset($entry['quest'], $entry['quest_step'], $entry['status'])) {
                continue;
            }

            $quest = $this->entityManager->getRepository(Quest::class)->findOneBy(['slug' => $entry['quest']]);
            if(!$quest) continue;

            $step = $quest->getQuestSteps()->filter(fn($s) => $s->getPosition() === $entry['quest_step'])->first();
            if(!$step) continue;

            $playerQuest = $this->entityManager->getRepository(PlayerQuest::class)->findOneBy([
                'player' => $player,
                'quest' => $quest,
            ]);
            if(!$playerQuest) continue;

            $playerQuestStep = $this->entityManager->getRepository(PlayerQuestStep::class)->findOneBy([
                'player' => $player,
                'questStep' => $step,
            ]);

            if(!$playerQuestStep) {
                $playerQuestStep = (new PlayerQuestStep())
                    ->setPlayer($player)
                    ->setQuestStep($step)
                    ->setPlayerQuest($playerQuest);
                $this->entityManager->persist($playerQuestStep);
            }

            $playerQuestStep->setStatus($entry['status']);

            // Si cette étape est complétée, on cherche la suivante non manuelle et non skippée
            if($entry['status'] === 'completed') {
                $currentPos = $step->getPosition();
                $steps = $quest->getQuestSteps();
                $maxPos = $steps->last()?->getPosition() ?? $currentPos;

                for($i = $currentPos + 1; $i <= $maxPos; $i++) {
                    $candidate = $steps->filter(fn($s) => $s->getPosition() === $i)->first();
                    if(!$candidate) continue;

                    // Vérifie si une instruction manuelle prévoit un statut
                    if(isset($manualStatuses[$entry['quest']][$i])) {
                        // On laisse le statut manuel gérer cette étape
                        break;
                    }

                    // Sinon on vérifie la base
                    $existing = $this->entityManager->getRepository(PlayerQuestStep::class)->findOneBy([
                        'player' => $player,
                        'questStep' => $candidate,
                    ]);

                    if($existing && $existing->getStatus() === 'skipped') {
                        continue;
                    }

                    if(!$existing) {
                        $newStep = (new PlayerQuestStep())
                            ->setPlayer($player)
                            ->setQuestStep($candidate)
                            ->setPlayerQuest($playerQuest)
                            ->setStatus('progress');
                        $this->entityManager->persist($newStep);
                    }

                    break; // on s'arrête dès qu'on a trouvé une étape à activer
                }
            }
        }

        $this->entityManager->flush();
    }

    private function rewardQuest(Player $player, string $questSlug): void
    {
        $quest = $this->entityManager->getRepository(Quest::class)->findOneBy(['slug' => $questSlug]);
        if(!$quest) return;

        $playerQuest = $this->entityManager->getRepository(PlayerQuest::class)->findOneBy([
            'player' => $player,
            'quest' => $quest,
        ]);
        if(!$playerQuest || $playerQuest->getStatus() === 'rewarded') return;

        foreach($quest->getQuestSteps() as $step) {
            $playerQuestStep = $this->entityManager->getRepository(PlayerQuestStep::class)->findOneBy([
                'player' => $player,
                'questStep' => $step,
            ]);

            if(!$playerQuestStep) {
                // on ignore les steps jamais entamées
                continue;
            }

            if($playerQuestStep->getStatus() === 'skipped') {
                // on ne touche pas aux steps volontairement ignorées
                continue;
            }

            $playerQuestStep->setStatus('completed');
            $this->entityManager->persist($playerQuestStep);
        }

        if($reward = $quest->getReward()) {
            $this->rewardService->giveReward($reward, $player);
        }

        $lastStep = $quest->getQuestSteps()->filter(fn($s) => $s->isLast())->first();
        $giver = $quest->getGiver() ?? $lastStep?->getGiver();

        if($giver) {
            $this->characterReputationService->increaseReputationFromQuestReward($player, $giver);
        }

        $playerQuest->setStatus('rewarded');
        $this->entityManager->persist($playerQuest);
        $this->entityManager->flush();
    }

    private function addItems(Player $player, array $items): void
    {
        foreach($items as $data) {
            if(!isset($data['item'])) {
                continue;
            }

            $item = $this->entityManager->getRepository(Item::class)->findOneBy(['slug' => $data['item']]);
            if(!$item) {
                continue;
            }

            $existing = $this->entityManager->getRepository(CharacterItem::class)->findOneBy([
                'character' => $player,
                'item' => $item,
            ]);

            if($existing) {
                continue;
            }

            $characterItem = (new CharacterItem())
                ->setCharacter($player)
                ->setItem($item)
                ->setEquipped(false)
                ->setQuestItem($data['questItem'] ?? false);
            $this->entityManager->persist($characterItem);
        }

        $this->entityManager->flush();
    }

    private function removeItems(Player $player, array $items): void
    {
        foreach($items as $slug) {
            $item = $this->entityManager->getRepository(Item::class)->findOneBy(['slug' => $slug]);
            if(!$item) {
                continue;
            }
            $characterItem = $this->entityManager->getRepository(CharacterItem::class)->findOneBy([
                'character' => $player,
                'item' => $item,
            ]);
            if($characterItem) {
                $this->entityManager->remove($characterItem);
                $this->entityManager->flush();
            }
        }
    }
}
