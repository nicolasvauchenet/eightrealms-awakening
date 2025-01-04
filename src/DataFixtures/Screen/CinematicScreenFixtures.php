<?php

namespace App\DataFixtures\Screen;

use App\Entity\Screen\CinematicScreen;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CinematicScreenFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $screens = [
            [
                'name' => 'Introduction',
                'reference' => 'screen_cinematic_introduction',
            ],
            [
                'name' => 'Prison',
                'reference' => 'screen_cinematic_jail',
            ],
            [
                'name' => 'Victoire',
                'reference' => 'screen_cinematic_combat_anciens_docks_rats_victory',
            ],
            [
                'name' => 'Échec',
                'reference' => 'screen_cinematic_combat_anciens_docks_rats_defeat',
            ],
        ];

        foreach($screens as $data) {
            $screen = new CinematicScreen();
            $screen->setName($data['name']);
            $manager->persist($screen);
            $this->addReference($data['reference'], $screen);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 40;
    }
}
