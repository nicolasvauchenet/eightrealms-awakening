<?php

namespace App\Service\Location;

use App\Entity\Character\Character;
use App\Entity\Location\CharacterLocationReputation;
use App\Entity\Location\Location;
use Doctrine\ORM\EntityManagerInterface;

class CharacterLocationReputationService
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getBaseReputation(Character $character): int
    {
        return $character->getRace()->getBaseReputation()
            + $character->getProfession()->getBaseReputation();
    }

    public function getLocalReputation(Character $character, Location $location): int
    {
        $rep = $this->entityManager->getRepository(CharacterLocationReputation::class)
            ->findOneBy([
                'character' => $character,
                'location' => $location,
            ]);

        return $rep ? $rep->getValue() : 0;
    }

    public function getTotalReputation(Character $character, Location $location): int
    {
        return $this->getBaseReputation($character)
            + $this->getLocalReputation($character, $location);
    }

    public function modifyReputation(Character $character, Location $location, int $delta): void
    {
        $rep = $this->entityManager->getRepository(CharacterLocationReputation::class)
            ->findOneBy(['character' => $character, 'location' => $location]);

        if(!$rep) {
            $rep = new CharacterLocationReputation();
            $rep->setCharacter($character);
            $rep->setLocation($location);
            $rep->setValue(0);
            $this->entityManager->persist($rep);
        }

        $rep->setValue($rep->getValue() + $delta);
        $this->entityManager->flush();
    }
}
