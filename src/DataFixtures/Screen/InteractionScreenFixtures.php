<?php

namespace App\DataFixtures\Screen;

use App\Entity\Character\Npc;
use App\Entity\Screen\InteractionScreen;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class InteractionScreenFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $screens = [
            // Port Saint-Doux
            [
                'name' => 'Sophie la Marchande',
                'npc' => 'npc_sophie_la_marchande',
                'reference' => 'screen_interaction_sophie_la_marchande',
            ],
            [
                'name' => 'Robert le Garde',
                'npc' => 'npc_robert_le_garde',
                'reference' => 'screen_interaction_robert_le_garde',
            ],
            [
                'name' => 'Bilo le Passant',
                'npc' => 'npc_bilo_le_passant',
                'reference' => 'screen_interaction_bilo_le_passant',
            ],
        ];

        foreach($screens as $data) {
            $screen = new InteractionScreen();
            $screen->setName($data['name'])
                ->setNpc($this->getReference($data['npc'], Npc::class));
            $manager->persist($screen);
            $this->addReference($data['reference'], $screen);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 33;
    }
}
