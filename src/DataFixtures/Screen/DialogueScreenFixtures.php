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
