<?php

namespace App\DataFixtures\Screen;

use App\Entity\Character\Creature;
use App\Entity\Character\Npc;
use App\Entity\Location\Location;
use App\Entity\Screen\CombatScreen;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CombatScreenFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $screens = [
            [
                'name' => 'Gros Rats',
                'creatures' => [
                    'creature_gros_rat',
                    'creature_gros_rat',
                    'creature_gros_rat',
                ],
                'location' => 'location_zone_anciens_docks',
                'reference' => 'screen_combat_three_big_rats',
            ],
        ];

        foreach($screens as $data) {
            $screen = new CombatScreen();
            $screen->setName($data['name'])
                ->setLocation($this->getReference($data['location'], Location::class));
            if(isset($data['npcs'])) {
                foreach($data['npcs'] as $npc) {
                    $screen->addNpc($this->getReference($npc, Npc::class));
                }
            }
            if(isset($data['creatures'])) {
                foreach($data['creatures'] as $creature) {
                    $screen->addCreature($this->getReference($creature, Creature::class));
                }
            }
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
