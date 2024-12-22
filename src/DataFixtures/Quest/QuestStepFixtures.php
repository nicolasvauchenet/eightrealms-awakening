<?php

namespace App\DataFixtures\Quest;

use App\Entity\Item\Amulet;
use App\Entity\Item\Shield;
use App\Entity\Quest\Quest;
use App\Entity\Quest\QuestStep;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class QuestStepFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $steps = [
            [
                'quest' => 'quest_main',
                'name' => 'Dans le waï',
                'position' => 1,
                'description' => "<p>Je ne sais absolument pas par quoi commencer… Il va falloir trouver des indices.</p>",
                'reference' => 'step_dans_le_wai',
            ],
            [
                'quest' => 'quest_main',
                'name' => 'Le Médaillon des Vents',
                'position' => 2,
                'description' => "<p>Le Royaume de l’Île du Nord est plongé dans le doute depuis la disparition du Prince Alaric, parti explorer le mystérieux Donjon de l’Âme pour prouver sa bravoure. Lorsque le Roi Galdric III a tenté de le retrouver, il n’est jamais revenu non plus… Et depuis le Royaume est sans tête et la tension est palpable au sein du peuple de l'Île.</p>",
                'itemsReward' => [
                    [
                        'item' => 'amulet_medaillon_des_vents',
                        'class' => Amulet::class,
                        'quantity' => 1,
                    ],
                ],
                'reference' => 'step_le_medaillon_des_vents',
            ],
            [
                'quest' => 'quest_secondary_des_rats_sur_les_docks',
                'name' => 'Dératisation',
                'position' => 1,
                'description' => "<p>Il serait peut-être intéressant de se rendre aux Anciens Docks pour voir de quoi il en retourne.</p>",
                'reference' => 'step_deratisation',
            ],
            [
                'quest' => 'quest_secondary_la_fiole_perdue',
                'name' => 'Suivre le voleur',
                'position' => 1,
                'description' => "<p>Avant de m'enfoncer tête baissée dans le Bois du Pendu, je devrais peut-être m'équiper…</p>",
                'reference' => 'step_suivre_le_voleur',
            ],
            [
                'quest' => 'quest_secondary_bagarre_bizarre',
                'name' => 'Interroger les témoins',
                'position' => 1,
                'description' => "<p>Je vais me rendre à la Taverne pour en savoir plus.</p>",
                'reference' => 'step_interroger_les_temoins',
            ],
            [
                'quest' => 'quest_secondary_bagarre_bizarre',
                'name' => 'Vieil habile',
                'position' => 2,
                'description' => "<p>À la Taverne de la Flûte Moisie, le Tavernier raconte une étrange altercation survenue il y a peu : un vieil homme, solitaire mais redoutablement habile, a affronté plusieurs bandits qui tentaient de l’intimider. Avant de disparaître, il aurait murmuré quelque chose à propos de secrets enfouis dans le Donjon de l’Âme. Il serait intéressant de rechercher la trace de cet homme.</p>",
                'reference' => 'step_vieil_habile',
            ],
            [
                'quest' => 'quest_secondary_livraison_en_cours',
                'name' => 'Livrer le bouclier',
                'position' => 1,
                'description' => "<p>Je dois partir pour Plouc et retrouver le destinataire du bouclier.</p>",
                'itemsReward' => [
                    [
                        'item' => 'shield_iron',
                        'class' => Shield::class,
                        'quantity' => 1,
                    ],
                ],
                'reference' => 'step_livrer_le_bouclier',
            ],
        ];

        foreach($steps as $data) {
            $step = new QuestStep();
            $step->setQuest($this->getReference($data['quest'], Quest::class))
                ->setName($data['name'])
                ->setPosition($data['position'])
                ->setPicture($data['picture'] ?? null)
                ->setDescription($data['description'] ?? null)
                ->setCrownReward($data['crownReward'] ?? null);
            if(isset($data['itemsReward'])) {
                foreach($data['itemsReward'] as $item) {
                    for($i = 1; $i <= $item['quantity']; $i++) {
                        $step->addItemReward($this->getReference($item['item'], $item['class']));
                    }
                }
            }
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
