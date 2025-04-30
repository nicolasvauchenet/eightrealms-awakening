<?php

namespace App\Service\Dialog;

use App\Entity\Character\Player;
use App\Entity\Location\Location;
use App\Entity\Quest\PlayerQuest;
use App\Entity\Location\CharacterLocation;
use App\Entity\Quest\PlayerQuestStep;
use App\Entity\Quest\Quest;
use App\Service\Game\Reward\RewardService;
use Doctrine\ORM\EntityManagerInterface;

readonly class DialogEffectApplierService
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private RewardService          $rewardService)
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
                        ->setStatus('progress');

                    $this->entityManager->persist($playerQuestStep);
                    break;
                }
            }
        }
    }

    private function startQuestStep(Player $player, array $data): void
    {
        if(!isset($data['quest'], $data['quest_step'])) {
            return;
        }

        $quest = $this->entityManager->getRepository(Quest::class)->findOneBy(['slug' => $data['quest']]);
        if(!$quest) return;

        $step = $quest->getQuestSteps()->filter(fn($s) => $s->getPosition() === $data['quest_step'])->first();
        if(!$step) return;

        $playerQuest = $this->entityManager->getRepository(PlayerQuest::class)->findOneBy([
            'player' => $player,
            'quest' => $quest,
        ]);
        if(!$playerQuest) return;

        $existing = $this->entityManager->getRepository(PlayerQuestStep::class)->findOneBy([
            'player' => $player,
            'questStep' => $step,
        ]);
        if($existing) return;

        $playerQuestStep = (new PlayerQuestStep())
            ->setPlayer($player)
            ->setQuestStep($step)
            ->setStatus('progress');

        $this->entityManager->persist($playerQuestStep);
    }

    private function editQuestStepStatus(Player $player, array $data): void
    {
        if(!isset($data['quest'], $data['quest_step'], $data['status'])) {
            return;
        }

        $quest = $this->entityManager->getRepository(Quest::class)->findOneBy(['slug' => $data['quest']]);
        if(!$quest) return;

        $step = $quest->getQuestSteps()->filter(fn($s) => $s->getPosition() === $data['quest_step'])->first();
        if(!$step) return;

        $playerQuest = $this->entityManager->getRepository(PlayerQuest::class)->findOneBy([
            'player' => $player,
            'quest' => $quest,
        ]);
        if(!$playerQuest) return;

        $playerQuestStep = $this->entityManager->getRepository(PlayerQuestStep::class)->findOneBy([
            'player' => $player,
            'questStep' => $step,
        ]);

        if(!$playerQuestStep) {
            $playerQuestStep = (new PlayerQuestStep())
                ->setPlayer($player)
                ->setQuestStep($step);
            $this->entityManager->persist($playerQuestStep);
        }

        $playerQuestStep->setStatus($data['status']);
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

        // Marquer la quête comme récompensée
        $playerQuest->setStatus('rewarded');
        $this->entityManager->persist($playerQuest);

        // Terminer la dernière étape si ce n’est pas déjà fait
        $lastStep = $quest->getQuestSteps()->filter(fn($step) => $step->isLast())->first();
        if($lastStep) {
            $playerQuestStep = $this->entityManager->getRepository(PlayerQuestStep::class)->findOneBy([
                'player' => $player,
                'questStep' => $lastStep,
            ]);

            if($playerQuestStep && $playerQuestStep->getStatus() !== 'completed') {
                $playerQuestStep->setStatus('completed');
                $this->entityManager->persist($playerQuestStep);
            }
        }

        // Donner la récompense liée à la quête, si définie
        $reward = $quest->getReward();

        if($reward) {
            $this->rewardService->giveReward($reward, $player);
        }

        $this->entityManager->flush();
    }
}
