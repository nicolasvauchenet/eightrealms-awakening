<?php

namespace App\DataFixtures\Screen;

use App\Entity\Character\Npc;
use App\Entity\Screen\DialogueScreen;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class DialogueScreenFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $screens = [
            [
                'name' => 'Discuter avec Sophie la Marchande',
                'npc' => 'npc_sophie_la_marchande',
                'reference' => 'screen_dialogue_sophie_la_marchande',
            ],
            [
                'name' => 'Discuter avec Robert le Garde',
                'npc' => 'npc_robert_le_garde',
                'reference' => 'screen_dialogue_robert_le_garde',
            ],
            [
                'name' => 'Discuter avec Bilo le Passant',
                'npc' => 'npc_bilo_le_passant',
                'reference' => 'screen_dialogue_bilo_le_passant',
            ],
            [
                'name' => 'Discuter avec Gart le Forgeron',
                'npc' => 'npc_gart_le_forgeron',
                'reference' => 'screen_dialogue_gart_le_forgeron',
            ],
            [
                'name' => 'Discuter avec Jarrod le Tavernier',
                'npc' => 'npc_jarrod_le_tavernier',
                'reference' => 'screen_dialogue_jarrod_le_tavernier',
            ],
        ];

        foreach($screens as $data) {
            $screen = new DialogueScreen();
            $screen->setName($data['name'])
                ->setNpc($this->getReference($data['npc'], Npc::class));
            $manager->persist($screen);
            $this->addReference($data['reference'], $screen);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 25;
    }
}
