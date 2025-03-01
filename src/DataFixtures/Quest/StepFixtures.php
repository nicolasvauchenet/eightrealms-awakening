<?php

namespace App\DataFixtures\Quest;

use App\Entity\Quest\Quest;
use App\Entity\Quest\Step;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class StepFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $steps = [
            // Principale
            [
                'position' => 1,
                'description' => "<p>Le Royaume de l’Île du Nord est plongé dans le doute depuis la disparition du Prince Alaric, parti explorer le mystérieux Donjon de l’Âme pour prouver sa bravoure. Lorsque le Roi Galdric III a tenté de le retrouver, il n’est jamais revenu non plus… Et depuis le Royaume est sans tête et la tension est palpable au sein du peuple de l'Île.</p><p>Je ne sais absolument pas par quoi commencer… Il va falloir trouver des indices.</p>",
                'quest' => 'quest_main',
                'reference' => 'quest_main_step_1',
            ],
            [
                'position' => 2,
                'description' => "<p>J'ai retrouvé un médaillon en or, orné de motifs étranges et de pierres précieuses. Il semble avoir une certaine importance, mais je ne sais pas encore laquelle.</p>",
                'reward' => [
                    'items' => [
                        [
                            'item' => 'amulet_medaillon_des_vents',
                            'quantity' => 1,
                        ],
                    ],
                ],
                'quest' => 'quest_main',
                'reference' => 'quest_main_step_2',
            ],

            // Secondaires
            [
                'position' => 1,
                'description' => "<p>Un passant rencontré sur la place du Marché a parlé de rats qui auraient envahi les Anciens Docks de la ville. Il semblerait que ces rats soient plus gros et plus agressifs que la normale.</p><p>Il serait peut-être intéressant de se rendre aux Anciens Docks pour voir de quoi il en retourne.</p>",
                'quest' => 'quest_secondary_des_rats_sur_les_docks',
                'reference' => 'quest_secondary_des_rats_sur_les_docks_step_1',
            ],

            [
                'position' => 1,
                'description' => "<p>L’Alchimiste des Anciens Docks est hors de lui : une fiole précieuse, contenant une concoction instable et rare, a été dérobée lors d’un cambriolage nocturne. Selon ses observations, le voleur a fui vers les Bois du Pendu, un endroit dangereux peuplé de Druides reclus et de bandits opportunistes.</p><p>Avant de m'enfoncer tête baissée dans le Bois du Pendu, je devrais peut-être m'équiper…</p>",
                'quest' => 'quest_secondary_la_fiole_perdue',
                'reference' => 'quest_secondary_la_fiole_perdue_step_1',
            ],
            [
                'position' => 1,
                'description' => "<p>Robert, un garde de Port Saint-Doux que j'ai rencontré dans le Quartier du Marché, m'a parlé d'une rixe étrange qui se serait déroulée à la Taverne de la Flûte Moisie, dans le Quartier des Docks de l'Ouest.</p><p>Je vais me rendre à la Taverne pour en savoir plus.</p>",
                'quest' => 'quest_secondary_bagarre_bizarre',
                'reference' => 'quest_secondary_bagarre_bizarre_step_1',
            ],
            [
                'position' => 2,
                'description' => "<p>À la Taverne de la Flûte Moisie, le Tavernier raconte une étrange altercation survenue il y a peu : un vieil homme, solitaire mais redoutablement habile, a affronté plusieurs bandits qui tentaient de l’intimider. Avant de disparaître, il aurait murmuré quelque chose à propos de secrets enfouis dans le Donjon de l’Âme. Il serait intéressant de rechercher la trace de cet homme.</p>",
                'quest' => 'quest_secondary_bagarre_bizarre',
                'reference' => 'quest_secondary_bagarre_bizarre_step_2',
            ],

            [
                'position' => 1,
                'description' => "<p>Gart le Forgeron m'a demandé de livrer un bouclier dans le village de Plouc. Il s'agit d'une commande spéciale pour un client qui n'a pas pu se déplacer pour venir le chercher.</p><p>Le client est un jeune pêcheur qui s'appelle Gérard et il habite dans la première maison à droite en entrant dans le village.</p>",
                'quest' => 'quest_secondary_livraison_en_cours',
                'reference' => 'quest_secondary_livraison_en_cours_step_1',
            ],
        ];

        foreach($steps as $data) {
            $step = new Step();
            $step->setQuest($this->getReference($data['quest'], Quest::class))
                ->setPosition($data['position'])
                ->setDescription($data['description'])
                ->setReward($data['reward'] ?? null);
            $manager->persist($step);
            $this->addReference($data['reference'], $step);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 31;
    }
}
