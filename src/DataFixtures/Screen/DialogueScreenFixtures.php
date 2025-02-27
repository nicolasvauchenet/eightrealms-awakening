<?php

namespace App\DataFixtures\Screen;

use App\Entity\Dialogue\Dialogue;
use App\Entity\Screen\DialogueScreen;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class DialogueScreenFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $screens = [
            // Sophie la Marchande
            [
                'name' => 'Discuter avec Sophie la Marchande',
                'dialogue' => 'dialogue_sophie_la_marchande_1',
                'reference' => 'screen_dialogue_sophie_la_marchande',
            ],

            // Robert le Garde
            [
                'name' => 'Discuter avec Robert le Garde',
                'dialogue' => 'dialogue_robert_le_garde_1',
                'reference' => 'screen_dialogue_robert_le_garde',
            ],
            [
                'name' => 'Les ragots de Robert le Garde',
                'dialogue' => 'dialogue_robert_le_garde_rumor_1',
                'reference' => 'screen_dialogue_robert_le_garde_rumor_1',
            ],
            [
                'name' => 'Les ragots de Robert le Garde',
                'dialogue' => 'dialogue_robert_le_garde_rumor_2',
                'reference' => 'screen_dialogue_robert_le_garde_rumor_2',
            ],
            [
                'name' => 'Les ragots de Robert le Garde',
                'dialogue' => 'dialogue_robert_le_garde_rumor_accept',
                'reference' => 'screen_dialogue_robert_le_garde_rumor_accept',
            ],
            [
                'name' => 'Les ragots de Robert le Garde',
                'dialogue' => 'dialogue_robert_le_garde_rumor_decline',
                'reference' => 'screen_dialogue_robert_le_garde_rumor_decline',
            ],

            // Bilo le Passant
            [
                'name' => 'Discuter avec Bilo le Passant',
                'dialogue' => 'dialogue_bilo_le_passant_1',
                'reference' => 'screen_dialogue_bilo_le_passant',
            ],
            [
                'name' => 'Les ragots de Bilo le Passant',
                'dialogue' => 'dialogue_bilo_le_passant_rumor_1',
                'reference' => 'screen_dialogue_bilo_le_passant_rumor_1',
            ],
            [
                'name' => 'Les ragots de Bilo le Passant',
                'dialogue' => 'dialogue_bilo_le_passant_rumor_2',
                'reference' => 'screen_dialogue_bilo_le_passant_rumor_2',
            ],
            [
                'name' => 'Les ragots de Bilo le Passant',
                'dialogue' => 'dialogue_bilo_le_passant_rumor_accept',
                'reference' => 'screen_dialogue_bilo_le_passant_rumor_accept',
            ],
            [
                'name' => 'Les ragots de Bilo le Passant',
                'dialogue' => 'dialogue_bilo_le_passant_rumor_decline',
                'reference' => 'screen_dialogue_bilo_le_passant_rumor_decline',
            ],
        ];

        foreach($screens as $data) {
            $screen = new DialogueScreen();
            $screen->setName($data['name'])
                ->setDialogue($this->getReference($data['dialogue'], Dialogue::class));
            $manager->persist($screen);
            $this->addReference($data['reference'], $screen);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 35;
    }
}
