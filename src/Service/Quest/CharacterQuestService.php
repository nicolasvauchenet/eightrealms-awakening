<?php

namespace App\Service\Quest;

use App\Entity\Character\Npc;
use App\Entity\Character\Player;
use App\Entity\Quest\PlayerQuest;
use App\Entity\Quest\PlayerQuestStep;
use App\Entity\Quest\Quest;
use App\Entity\Quest\QuestStep;
use Doctrine\ORM\EntityManagerInterface;

readonly class CharacterQuestService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function getPlayerMainQuest(Player $character, ?bool $isRewarded = false): ?PlayerQuest
    {
        $playerQuest = $this->entityManager->getRepository(PlayerQuest::class)->findMainQuest($character, $isRewarded);

        return $playerQuest;
    }

    public function getPlayerSideQuests(Player $character, ?bool $isRewarded = false): array
    {
        return $this->entityManager->getRepository(PlayerQuest::class)->findSideQuests($character, $isRewarded);
    }

    public function hasQuestStep(Player $player, array $data): bool
    {
        $quest = $this->entityManager->getRepository(Quest::class)->findOneBy(['slug' => $data['quest']]);
        $questStep = $this->entityManager->getRepository(QuestStep::class)->findOneBy(['quest' => $quest, 'position' => $data['quest_step']]);
        $playerQuestStep = $this->entityManager->getRepository(PlayerQuestStep::class)->findOneBy(['player' => $player, 'questStep' => $questStep, 'status' => $data['status']]);

        return $playerQuestStep ? true : false;
    }
}
