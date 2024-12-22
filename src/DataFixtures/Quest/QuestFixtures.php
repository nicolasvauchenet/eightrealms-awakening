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
            [
                'name' => 'Les Disparus du Donjon',
                'type' => 'Principale',
                'description' => "<p>Le Royaume de l’Île du Nord est plongé dans le doute depuis la disparition du Prince Alaric, parti explorer le mystérieux Donjon de l’Âme pour prouver sa bravoure. Lorsque le Roi Galdric III a tenté de le retrouver, il n’est jamais revenu non plus… Et depuis le Royaume est sans tête et la tension est palpable au sein du peuple de l'Île.</p>",
                'xpReward' => 1000,
                'crownReward' => 500,
                'reference' => 'quest_main',
            ],
            [
                'name' => 'Des rats sur les Docks',
                'type' => 'Secondaire',
                'description' => "<p>Un passant rencontré sur la place du Marché a parlé de rats qui auraient envahi les Anciens Docks de la ville. Il semblerait que ces rats soient plus gros et plus agressifs que la normale.</p>",
                'xpReward' => 100,
                'crownReward' => 50,
                'reference' => 'quest_secondary_des_rats_sur_les_docks',
            ],
            [
                'name' => 'La Fiole perdue',
                'type' => 'Secondaire',
                'description' => "<p>L’Alchimiste des Anciens Docks est hors de lui : une fiole précieuse, contenant une concoction instable et rare, a été dérobée lors d’un cambriolage nocturne. Selon ses observations, le voleur a fui vers les Bois du Pendu, un endroit dangereux peuplé de Druides reclus et de bandits opportunistes.</p>",
                'xpReward' => 200,
                'crownReward' => 100,
                'reference' => 'quest_secondary_la_fiole_perdue',
            ],
            [
                'name' => 'Bagarre bizarre',
                'type' => 'Secondaire',
                'description' => "<p>Robert, un garde de Port Saint-Doux que j'ai rencontré dans le Quartier du Marché, m'a parlé d'une rixe étrange qui se serait déroulée à la Taverne de la Flûte Moisie, dans le Quartier des Docks de l'Ouest.</p>",
                'xpReward' => 200,
                'crownReward' => 100,
                'reference' => 'quest_secondary_bagarre_bizarre',
            ],
            [
                'name' => 'Livraison en cours',
                'type' => 'Secondaire',
                'description' => "<p>Le Forgeron de la Vieille Ville s’inquiète : une commande spéciale, forgée avec soin pour un client du village de Plouc, n’a jamais été récupérée. Craignant que quelque chose ne soit arrivé au destinataire, il vous demande d’assurer la livraison.</p>",
                'xpReward' => 200,
                'crownReward' => 100,
                'reference' => 'quest_secondary_livraison_en_cours',
            ],
        ];

        foreach($quests as $data) {
            $quest = new Quest();
            $quest->setName($data['name'])
                ->setType($data['type'])
                ->setPicture($data['picture'] ?? null)
                ->setDescription($data['description'] ?? null)
                ->setXpReward($data['xpReward'] ?? null)
                ->setCrownReward($data['crownReward'] ?? null);
            if(isset($data['itemsReward'])) {
                foreach($data['itemsReward'] as $item) {
                    for($i = 1; $i <= $item['quantity']; $i++) {
                        $quest->addItemReward($this->getReference($item['item'], $item['class']));
                    }
                }
            }
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
