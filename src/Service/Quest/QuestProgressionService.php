<?php

namespace App\Service\Quest;

use App\Entity\Character\Player;
use App\Entity\Quest\PlayerQuest;
use App\Entity\Quest\PlayerQuestStep;
use App\Entity\Quest\Quest;
use App\Service\Character\CharacterReputationService;
use App\Service\Reward\RewardService;
use Doctrine\ORM\EntityManagerInterface;

readonly class QuestProgressionService
{
    public function __construct(
        private EntityManagerInterface     $entityManager,
        private RewardService              $rewardService,
        private CharacterReputationService $characterReputationService)
    {
    }

    public function startQuest(Player $player, string $slug): ?PlayerQuest
    {
        $quest = $this->entityManager->getRepository(Quest::class)->findOneBy(['slug' => $slug]);
        if(!$quest) return null;

        $playerQuest = $this->entityManager->getRepository(PlayerQuest::class)->findOneBy([
            'player' => $player,
            'quest' => $quest,
        ]);

        if(!$playerQuest) {
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

            $this->entityManager->flush();
        }

        return $playerQuest;
    }

    public function startQuestStep(Player $player, array $data): void
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
                $playerQuest = $this->startQuest($player, $entry['quest']);
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

        $this->entityManager->flush();
    }

    public function editQuestStepStatus(Player $player, array $data, ?bool $goNext = true): void
    {
        $entries = isset($data['quest']) ? [$data] : $data;

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
            $this->entityManager->persist($playerQuestStep);

            if($entry['status'] === 'completed') {
                if($reward = $playerQuestStep->getQuestStep()->getReward()) {
                    $this->rewardService->giveReward($reward, $player);
                }

                if($goNext) {
                    $currentPos = $step->getPosition();
                    $steps = $quest->getQuestSteps();
                    $maxPos = $steps->last()?->getPosition() ?? $currentPos;

                    for($i = $currentPos + 1; $i <= $maxPos; $i++) {
                        $candidate = $steps->filter(fn($s) => $s->getPosition() === $i)->first();
                        if(!$candidate) continue;

                        if(isset($manualStatuses[$entry['quest']][$i])) {
                            break;
                        }

                        $existing = $this->entityManager->getRepository(PlayerQuestStep::class)->findOneBy([
                            'player' => $player,
                            'questStep' => $candidate,
                        ]);

                        if(!$existing) {
                            $nextStatus = $entry['next'] ?? 'progress';

                            $newStep = (new PlayerQuestStep())
                                ->setPlayer($player)
                                ->setQuestStep($candidate)
                                ->setPlayerQuest($playerQuest)
                                ->setStatus($nextStatus);

                            $this->entityManager->persist($newStep);
                        }

                        break;
                    }
                }
            }
        }

        $this->entityManager->flush();
    }

    public function rewardQuest(Player $player, string $questSlug): void
    {
        $quest = $this->entityManager->getRepository(Quest::class)->findOneBy(['slug' => $questSlug]);
        if(!$quest) return;

        $playerQuest = $this->entityManager->getRepository(PlayerQuest::class)->findOneBy([
            'player' => $player,
            'quest' => $quest,
        ]);
        if(!$playerQuest || $playerQuest->getStatus() === 'rewarded') return;

        $questSteps = $quest->getQuestSteps();
        $stepRepo = $this->entityManager->getRepository(PlayerQuestStep::class);

        foreach($questSteps as $step) {
            $playerQuestStep = $stepRepo->findOneBy([
                'player' => $player,
                'questStep' => $step,
            ]);

            if($playerQuestStep) {
                if($playerQuestStep->getStatus() !== 'skipped') {
                    $playerQuestStep->setStatus('completed');
                    $this->entityManager->persist($playerQuestStep);
                }
            } else {
                // Étape manquante → on la crée et on la complète directement
                $newStep = (new PlayerQuestStep())
                    ->setPlayer($player)
                    ->setQuestStep($step)
                    ->setPlayerQuest($playerQuest)
                    ->setStatus('completed');
                $this->entityManager->persist($newStep);
            }
        }

        if($reward = $quest->getReward()) {
            $this->rewardService->giveReward($reward, $player);
        }

        $lastStep = $quest->getQuestSteps()->filter(fn($s) => $s->isLast())->first();
        $giver = $quest->getGiver() ? $lastStep?->getGiver() : null;
        if($giver) {
            $this->characterReputationService->increaseReputationFromQuestReward($player, $giver);
        }

        $playerQuest->setStatus('rewarded');
        $this->entityManager->persist($playerQuest);
        $this->entityManager->flush();
    }
}
