<?php

namespace App\DataFixtures\Character;

use App\DataFixtures\Character\Race\CreatureTrait;
use App\DataFixtures\Character\Race\PlayableTrait;
use App\Entity\Character\Race;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RaceFixtures extends Fixture implements OrderedFixtureInterface
{
    use PlayableTrait;
    use CreatureTrait;

    public function load(ObjectManager $manager): void
    {
        $allRaces = [
            // Personnages & PNJs
            self::PLAYABLE_RACES,

            // Créatures
            self::CREATURE_RACES,
        ];

        foreach($allRaces as $races) {
            foreach($races as $data) {
                $race = new Race();
                $race->setName($data['name'])
                    ->setPlayable($data['playable']);
                $manager->persist($race);
                $this->addReference($data['reference'], $race);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 2;
    }
}
