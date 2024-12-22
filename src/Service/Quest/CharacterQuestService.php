<?php

namespace App\Service\Quest;

use App\Entity\Character\Player;
use App\Entity\Location\Location;
use App\Entity\Quest\CharacterQuest;
use App\Entity\Quest\CharacterQuestStep;
use App\Entity\Quest\Quest;
use App\Entity\Quest\QuestStep;
use Doctrine\ORM\EntityManagerInterface;

class CharacterQuestService
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function startQuest(Player     $character,
                               ?Quest     $quest = null,
                               ?QuestStep $questStep = null,
                               ?Location  $location = null): bool
    {
        $questAlreadyExists = true;

        if($quest) {
            $characterQuest = $this->entityManager->getRepository(CharacterQuest::class)
                ->findOneBy(['character' => $character, 'quest' => $quest]);

            if(!$characterQuest) {
                $questAlreadyExists = false;
                $characterQuest = (new CharacterQuest())
                    ->setCharacter($character)
                    ->setQuest($quest)
                    ->setStartLocation($location)
                    ->setStatus('progress');
                $this->entityManager->persist($characterQuest);
                $this->entityManager->flush();
            }
        }

        if($questStep) {
            $characterQuestStep = $this->entityManager->getRepository(CharacterQuestStep::class)
                ->findOneBy(['character' => $character, 'questStep' => $questStep]);
            if(!$characterQuestStep) {
                $questAlreadyExists = false;
                $characterQuestStep = (new CharacterQuestStep())
                    ->setCharacter($character)
                    ->setQuestStep($questStep)
                    ->setStatus('progress');
                $this->entityManager->persist($characterQuestStep);
                $this->entityManager->flush();
            }
        }

        return $questAlreadyExists;
    }

    public function getCharacterPrimaryQuest(Player $character): ?CharacterQuest
    {
        return $this->entityManager->getRepository(CharacterQuest::class)->findCharacterPrimaryQuest($character);
    }

    public function getCharacterSecondaryQuests(Player $character): array
    {
        return $this->entityManager->getRepository(CharacterQuest::class)->findCharacterSecondaryQuests($character);
    }

    public function getCharacterQuestSteps(Player $character, Quest $quest): array
    {
        return $this->entityManager->getRepository(CharacterQuestStep::class)->findCharacterQuestSteps($character, $quest);
    }
}
