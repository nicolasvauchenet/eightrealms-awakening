<?php

namespace App\DataFixtures\Dialogue;

use App\Entity\Dialogue\Dialogue;
use App\Entity\Dialogue\DialogueChoice;
use App\Entity\Location\Location;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class DialogueChoiceFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $dialogueChoices = [
            // Sophie la Marchande
            [
                'text' => 'Où se trouve le temple&nbsp;?',
                'position' => 1,
                'dialogue' => 'dialogue_sophie_la_marchande_rumor_1',
                'conditions' => [
                    'hasNoLocation' => 'location_zone_vieille_ville',
                ],
                'effects' => [
                    'newLocation' => 'location_zone_vieille_ville',
                    'changeDialogue' => 'dialogue_sophie_la_marchande_rumor_2',
                ],
                'reference' => 'dialogue_sophie_la_marchande_rumor_1_choice_1',
            ],

            // Robert le Garde
            [
                'text' => 'Où se trouve cette taverne&nbsp;?',
                'position' => 1,
                'dialogue' => 'dialogue_robert_le_garde_rumor_1',
                'effects' => [
                    'newLocation' => 'location_zone_docks_de_l_ouest',
                    'changeDialogue' => 'dialogue_robert_le_garde_rumor_2',
                ],
                'reference' => 'dialogue_robert_le_garde_rumor_1_choice_1',
            ],
            [
                'text' => "Je m'en occupe",
                'position' => 1,
                'type' => 'accept',
                'picture' => 'accept.png',
                'dialogue' => 'dialogue_robert_le_garde_rumor_2',
                'effects' => [
                    'changeDialogue' => 'dialogue_robert_le_garde_rumor_2_accept',
                ],
                'reference' => 'dialogue_robert_le_garde_rumor_2_choice_accept',
            ],
            [
                'text' => 'Laissez tomber',
                'position' => 2,
                'type' => 'decline',
                'picture' => 'decline.png',
                'dialogue' => 'dialogue_robert_le_garde_rumor_2',
                'effects' => [
                    'changeDialogue' => 'dialogue_robert_le_garde_rumor_2_decline',
                ],
                'reference' => 'dialogue_robert_le_garde_rumor_2_choice_decline',
            ],

            // Bilo le Passant
            [
                'text' => 'Où se trouve cet endroit&nbsp;?',
                'position' => 1,
                'dialogue' => 'dialogue_bilo_le_passant_rumor_1',
                'effects' => [
                    'newLocation' => 'location_zone_anciens_docks',
                    'changeDialogue' => 'dialogue_bilo_le_passant_rumor_2',
                ],
                'reference' => 'dialogue_bilo_le_passant_rumor_1_choice_1',
            ],
            [
                'text' => "Je m'en occupe",
                'position' => 1,
                'type' => 'accept',
                'picture' => 'accept.png',
                'dialogue' => 'dialogue_bilo_le_passant_rumor_2',
                'effects' => [
                    'changeDialogue' => 'dialogue_bilo_le_passant_rumor_2_accept',
                ],
                'reference' => 'dialogue_bilo_le_passant_rumor_2_choice_accept',
            ],
            [
                'text' => 'Laissez tomber',
                'position' => 2,
                'type' => 'decline',
                'picture' => 'decline.png',
                'dialogue' => 'dialogue_bilo_le_passant_rumor_2',
                'effects' => [
                    'changeDialogue' => 'dialogue_bilo_le_passant_rumor_2_decline',
                ],
                'reference' => 'dialogue_bilo_le_passant_rumor_2_choice_decline',
            ],

            // Gart le Forgeron
            [
                'text' => 'Plouc&nbsp;?',
                'position' => 1,
                'dialogue' => 'dialogue_gart_le_forgeron_rumor_1',
                'effects' => [
                    'newLocation' => 'location_plouc',
                    'changeDialogue' => 'dialogue_gart_le_forgeron_rumor_2',
                ],
                'reference' => 'dialogue_gart_le_forgeron_rumor_1_choice_1',
            ],
            [
                'text' => "Je m'en occupe",
                'position' => 1,
                'type' => 'accept',
                'picture' => 'accept.png',
                'dialogue' => 'dialogue_gart_le_forgeron_rumor_2',
                'effects' => [
                    'changeDialogue' => 'dialogue_gart_le_forgeron_rumor_2_accept',
                ],
                'reference' => 'dialogue_gart_le_forgeron_rumor_2_choice_accept',
            ],
            [
                'text' => 'Laissez tomber',
                'position' => 2,
                'type' => 'decline',
                'picture' => 'decline.png',
                'dialogue' => 'dialogue_gart_le_forgeron_rumor_2',
                'effects' => [
                    'changeDialogue' => 'dialogue_gart_le_forgeron_rumor_2_decline',
                ],
                'reference' => 'dialogue_gart_le_forgeron_rumor_2_choice_decline',
            ],
        ];

        foreach($dialogueChoices as $data) {
            $dialogueChoice = new DialogueChoice();
            $dialogueChoice->setText($data['text'])
                ->setPosition($data['position'])
                ->setType($data['type'] ?? null)
                ->setPicture($data['picture'] ?? null)
                ->setDialogue($this->getReference($data['dialogue'], Dialogue::class));

            if(isset($data['conditions'])) {
                $dialogueChoiceConditions = [];
                foreach($data['conditions'] as $condition => $value) {
                    if($condition === 'hasNoLocation') {
                        $location = $this->getReference($value, Location::class);
                        $dialogueChoiceConditions['hasNoLocation'] = $location->getId();
                    }
                }
                $dialogueChoice->setConditions($dialogueChoiceConditions);
            }

            if(isset($data['effects'])) {
                $dialogueChoiceEffects = [];
                foreach($data['effects'] as $effect => $value) {
                    if($effect === 'changeDialogue') {
                        $dialogueScreen = $this->getReference($value, Dialogue::class);
                        $dialogueChoiceEffects['changeDialogue'] = $dialogueScreen->getId();
                    }
                    if($effect === 'newLocation') {
                        $location = $this->getReference($value, Location::class);
                        $dialogueChoiceEffects['newLocation'] = $location->getId();
                    }
                }
                $dialogueChoice->setEffects($dialogueChoiceEffects);
            }
            $manager->persist($dialogueChoice);
            $this->addReference($data['reference'], $dialogueChoice);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 36;
    }
}
