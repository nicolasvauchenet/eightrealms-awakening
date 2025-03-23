<?php

namespace App\DataFixtures\Screen;

use App\Entity\Screen\CombatScreen;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CombatScreenFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $screens = [
            // Combats de quête
            [
                'name' => 'Des rats sur les Docks',
                'reference' => 'screen_combat_des_rats_sur_les_docks',
            ],

            // Combats de zone
            [
                'name' => 'Une bande de rats',
                'reference' => 'screen_combat_une_bande_de_rats',
            ],
            [
                'name' => 'Des malfrats vous accostent',
                'reference' => 'screen_combat_malfrats_docks_de_l_ouest',
            ],
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
        return 29;
    }
}
