<?php

namespace App\Service\Quest;

use App\Entity\Character\Player;
use App\Entity\Quest\PlayerQuest;
use App\Entity\Quest\Quest;
use App\Entity\Quest\Step;
use Doctrine\ORM\EntityManagerInterface;

readonly class QuestService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function startQuest(Quest $quest, Player $player): bool
    {
        $step = $this->entityManager->getRepository(Step::class)->findOneBy(['quest' => $quest, 'position' => 1]);
        $playerQuest = $this->entityManager->getRepository(PlayerQuest::class)->findOneBy(['player' => $player, 'step' => $step]);
        if(!$playerQuest) {
            $playerQuest = (new PlayerQuest())
                ->setPlayer($player)
                ->setQuest($quest)
                ->setStep($step)
                ->setQuestStatus('progress')
                ->setStatus('progress');
            $this->entityManager->persist($playerQuest);
            $this->entityManager->flush();

            return true;
        }

        return false;
    }

    public function getQuests(Player $player): array
    {
        $playerQuests = $this->entityManager->getRepository(PlayerQuest::class)->findQuestsWithStepsByPlayer($player);
        $quests = [];

        foreach($playerQuests as $playerQuest) {
            $quest = $playerQuest->getQuest();
            $step = $playerQuest->getStep();
            $questId = $quest->getId();

            if(!isset($quests[$questId])) {
                $quests[$questId] = [
                    'quest' => $quest,
                    'steps' => [],
                    'status' => $playerQuest->getQuestStatus(),
                ];
            }

            $quests[$questId]['steps'][] = $step;
        }

        return $quests;
    }
}
