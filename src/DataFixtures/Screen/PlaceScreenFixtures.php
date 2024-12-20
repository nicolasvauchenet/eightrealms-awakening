<?php

namespace App\DataFixtures\Screen;

use App\Entity\Character\Npc;
use App\Entity\Location\Place;
use App\Entity\Screen\PlaceScreen;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PlaceScreenFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $screens = [
            [
                'name' => 'Place du Marché',
                'place' => 'place_place_du_marche',
                'npcs' => [
                    'npc_sophie_la_marchande',
                    'npc_robert_le_garde',
                    'npc_bilo_le_passant',
                ],
                'reference' => 'screen_place_place_du_marche',
            ],
        ];

        foreach($screens as $data) {
            $screen = new PlaceScreen();
            $screen->setName($data['name'])
                ->setPlace($this->getReference($data['place'], Place::class));
            foreach($data['npcs'] as $npc) {
                $screen->addNpc($this->getReference($npc, Npc::class));
            }
            $manager->persist($screen);
            $this->addReference($data['reference'], $screen);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 21;
    }
}
