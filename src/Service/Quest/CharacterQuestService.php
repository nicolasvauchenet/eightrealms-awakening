<?php

namespace App\Service\Quest;

use App\Entity\Character\Player;
use App\Entity\Location\Location;
use App\Entity\Quest\CharacterQuest;
use App\Entity\Quest\CharacterQuestStep;
use App\Entity\Quest\Quest;
use App\Entity\Quest\QuestStep;
use App\Service\Location\CharacterLocationReputationService;
use Doctrine\ORM\EntityManagerInterface;

class CharacterQuestService
{
    private EntityManagerInterface $entityManager;
    private CharacterLocationReputationService $characterLocationReputationService;

    public function __construct(EntityManagerInterface             $entityManager,
                                CharacterLocationReputationService $characterLocationReputationService)
    {
        $this->entityManager = $entityManager;
        $this->characterLocationReputationService = $characterLocationReputationService;
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

    public function completeQuestStep(Player $character, QuestStep $questStep): void
    {
        $characterQuestStep = $this->entityManager->getRepository(CharacterQuestStep::class)
            ->findOneBy(['character' => $character, 'questStep' => $questStep]);
        if($characterQuestStep) {
            $characterQuestStep->setStatus('completed');
            $this->entityManager->persist($characterQuestStep);
            $character->setExperience($character->getExperience() + $characterQuestStep->getQuestStep()->getXpReward())
                ->setFortune($character->getFortune() + $characterQuestStep->getQuestStep()->getCrownReward());
            $this->characterLocationReputationService->modifyReputation($character, $character->getCurrentPlace()->getLocation(), 2);
            $this->entityManager->persist($character);
            $this->entityManager->flush();

            $characterQuest = $this->entityManager->getRepository(CharacterQuest::class)
                ->findOneBy(['character' => $character, 'quest' => $questStep->getQuest()]);

            if($characterQuest) {
                $questSteps = $characterQuest->getQuest()->getQuestSteps();
                $completedQuestSteps = $this->entityManager->getRepository(CharacterQuestStep::class)
                    ->findCompletedQuestSteps($character, $questStep->getQuest());
                if(count($questSteps) === count($completedQuestSteps)) {
                    $characterQuest->setStatus('completed');
                    $this->entityManager->persist($characterQuest);
                    $character->setExperience($character->getExperience() + $questStep->getQuest()->getXpReward())
                        ->setFortune($character->getFortune() + $questStep->getQuest()->getCrownReward());
                    $this->characterLocationReputationService->modifyReputation($character, $character->getCurrentPlace()->getLocation(), 10);
                    $this->entityManager->persist($character);
                }
            }
            $this->entityManager->flush();
        }
    }

    public function isQuestActive(Player $player, string $questSlug): bool
    {
        // On cherche la quête par son slug
        $quest = $this->entityManager
            ->getRepository(Quest::class)
            ->findOneBy(['slug' => $questSlug]);

        if(!$quest) {
            return false;
        }

        // On récupère le CharacterQuest correspondant
        $characterQuest = $this->entityManager
            ->getRepository(CharacterQuest::class)
            ->findOneBy(['character' => $player, 'quest' => $quest]);

        if(!$characterQuest) {
            return false; // Le joueur n'a pas cette quête
        }

        // Si elle est au statut "completed", on considère qu'elle n'est plus active
        return $characterQuest->getStatus() !== 'completed';
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
