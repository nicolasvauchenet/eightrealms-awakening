<?php

namespace App\Service\Quest;

use App\Entity\Character\Npc;
use App\Entity\Character\Player;
use App\Entity\Quest\PlayerQuest;
use App\Entity\Quest\Quest;
use App\Entity\Quest\QuestStep;
use Doctrine\ORM\EntityManagerInterface;

readonly class QuestService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function getNpcQuests(Npc $character): array
    {
        $quests = $this->entityManager->getRepository(Quest::class)->findBy(['giver' => $character], ['id' => 'ASC']);

        return $quests;
    }

    public function getNpcQuestSteps(Npc $character, Quest $quest): array
    {
        $questSteps = $this->entityManager->getRepository(QuestStep::class)->findBy(['giver' => $character, 'quest' => $quest], ['position' => 'ASC']);

        return $questSteps;
    }

    public function getNextQuestStep(QuestStep $currentStep): ?QuestStep
    {
        $quest = $currentStep->getQuest();
        $position = $currentStep->getPosition();

        return $this->entityManager->getRepository(QuestStep::class)->findOneBy([
            'quest' => $quest,
            'position' => $position + 1,
        ]);
    }
}
