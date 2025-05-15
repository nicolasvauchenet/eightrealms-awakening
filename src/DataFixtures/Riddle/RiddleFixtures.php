<?php

namespace App\DataFixtures\Riddle;

use App\DataFixtures\Riddle\Riddle\BoisDuPendu\ClairiereDeLOublieTrait;
use App\Entity\Riddle\Riddle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RiddleFixtures extends Fixture implements OrderedFixtureInterface
{
    use ClairiereDeLOublieTrait;

    public function load(ObjectManager $manager): void
    {
        $allRiddles = [
            // Bois du Pendu
            self::CLAIRIERE_DE_L_OUBLIE_RIDDLES,
        ];

        foreach($allRiddles as $riddles) {
            foreach($riddles as $data) {
                $riddle = (new Riddle())
                    ->setName($data['name'])
                    ->setThumbnail($data['thumbnail'])
                    ->setDescription($data['description'])
                    ->setType($data['type'])
                    ->setCharacteristic($data['characteristic'] ?? null)
                    ->setDifficulty($data['difficulty'] ?? null)
                    ->setRepeatOnFailure($data['repeatOnFailure'])
                    ->setSuccessEffects($data['successEffects'])
                    ->setFailureEffects($data['failureEffects'] ?? null);
                $manager->persist($riddle);
                $this->addReference($data['reference'], $riddle);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 39;
    }
}
