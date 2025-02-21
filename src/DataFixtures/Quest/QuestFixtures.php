<?php

namespace App\DataFixtures\Quest;

use App\Entity\Quest\Quest;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class QuestFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $quests = [
            // Principale
            [
                'name' => 'Les Disparus du Donjon',
                'type' => 'Principale',
                'reward' => [
                    'xp' => 1000,
                    'crown' => 500,
                ],
                'reference' => 'quest_main',
            ],

            // Secondaires
            [
                'name' => 'Des rats sur les Docks',
                'type' => 'Secondaire',
                'reward' => [
                    'xp' => 100,
                    'crown' => 50,
                ],
                'reference' => 'quest_secondary_des_rats_sur_les_docks',
            ],
            [
                'name' => 'La Fiole perdue',
                'type' => 'Secondaire',
                'reward' => [
                    'xp' => 200,
                    'crown' => 100,
                ],
                'reference' => 'quest_secondary_la_fiole_perdue',
            ],
            [
                'name' => 'Bagarre bizarre',
                'type' => 'Secondaire',
                'reward' => [
                    'xp' => 200,
                    'crown' => 100,
                ],
                'reference' => 'quest_secondary_bagarre_bizarre',
            ],
            [
                'name' => 'Livraison en cours',
                'type' => 'Secondaire',
                'reward' => [
                    'xp' => 200,
                    'crown' => 100,
                ],
                'reference' => 'quest_secondary_livraison_en_cours',
            ],
        ];

        foreach($quests as $data) {
            $quest = new Quest();
            $quest->setName($data['name'])
                ->setType($data['type'])
                ->setPicture($data['picture'] ?? null)
                ->setReward($data['reward']);
            $manager->persist($quest);
            $this->addReference($data['reference'], $quest);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 30;
    }
}
