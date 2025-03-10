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
            [
                'name' => 'Grand Prêtre de Port Saint-Doux',
                'npc' => 'npc_grand_pretre_de_port_saint_doux',
                'reference' => 'screen_interaction_grand_pretre_de_port_saint_doux',
            ],
            [
                'name' => 'Gart le Forgeron',
                'npc' => 'npc_gart_le_forgeron',
                'reference' => 'screen_interaction_gart_le_forgeron',
            ],
            [
                'name' => 'Jarrod le Tavernier',
                'npc' => 'npc_jarrod_le_tavernier',
                'reference' => 'screen_interaction_jarrod_le_tavernier',
            ],
            [
                'name' => "Wilbert l'Arcaniste",
                'npc' => 'npc_wilbert_larcaniste',
                'reference' => 'screen_interaction_wilbert_larcaniste',
            ],
            [
                'name' => 'Pêcheur',
                'npc' => 'npc_pecheur',
                'reference' => 'screen_interaction_pecheur',
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
