<?php

namespace App\DataFixtures\Screen\CombatScreen;

use App\Entity\Screen\CombatScreen;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CombatScreenFixtures extends Fixture implements OrderedFixtureInterface
{
    use AnciensDocksTrait;

    public function load(ObjectManager $manager): void
    {
        $screens = [
            self::RATS,
        ];

        foreach($screens as $data) {
            $screen = new CombatScreen();
            $screen->setName($data['name']);
            $manager->persist($screen);
            $this->addReference($data['reference'], $screen);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 44;
    }
}
