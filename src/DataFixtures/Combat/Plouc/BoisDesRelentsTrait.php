<?php

namespace App\DataFixtures\Combat\Plouc;

use App\Entity\Character\Creature;

trait BoisDesRelentsTrait
{
    const BOIS_DES_RELENTS_COMBATS = [
        // Quêtes
        [
            'name' => 'Livraison en Cours',
            'picture' => 'img/chapter1/combat/plouc-campement-gobelin.webp',
            'thumbnail' => 'img/chapter1/combat/plouc-campement-gobelin_thumb.png',
            'description' => "<p>Alertes et vifs comme l'éclair, les guerriers gobelins brandissent leurs armes, un sourire féroce aux lèvres. Leur chef, encore plus massif et mieux équipé, pousse un cri guttural qui rassemble ses troupes autour de lui. Leurs yeux brillent d’une haine vive et d’une soif de sang&nbsp;:&nbsp;ils ne cherchent plus à parlementer. Ils veulent se battre. Et ils comptent bien cogner dur, jusqu’au dernier souffle.</p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'livraison-en-cours',
                    'quest_step' => 5,
                    'status' => 'progress',
                ],
            ],
            'reward' => 'reward_combat_campement_gobelin_livraison_en_cours',
            'victoryDescription' => "<p>Le combat s’achève dans un chaos de grognements et de poussière. Le Chef Gobelin gît au sol, inerte, entouré des cadavres de ses guerriers. Le village est désormais en sécurité. Mission accomplie.</p>",
            'defeatDescription' => "<p>Les gobelins étaient trop forts, trop rapides, ou simplement trop déterminés. Le Chef Gobelin sourit en posant un pied crasseux sur votre corps. Vous vous effondrez, et la mission est échouée. Le campement reste aux mains de ses hôtes peu diplomates, et le village restera la cible de ces pilleurs sans vergogne.</p><p>À moins que vous ne vous releviez. Ressaisissez-vous, payez le Grand-Prêtre, et préparez-vous mieux que ça&nbsp;! Plouc a besoin de vous&nbsp;!</p>",
            'location' => 'location_zone_campement_gobelin',
            'questStep' => 'quest_secondary_livraison_en_cours_step_5',
            'enemies' => [
                [
                    'enemy' => 'creature_guerrier_gobelin',
                    'enemyClass' => Creature::class,
                ],
                [
                    'enemy' => 'creature_chef_gobelin',
                    'enemyClass' => Creature::class,
                ],
                [
                    'enemy' => 'creature_guerrier_gobelin',
                    'enemyClass' => Creature::class,
                ],
            ],
            'reference' => 'combat_campement_gobelin_livraison_en_cours',
        ],

        // Rencontres
        [
            'name' => 'Éclaireurs Gobelins',
            'picture' => 'img/chapter1/combat/plouc-eclaireurs-gobelins.webp',
            'thumbnail' => 'img/chapter1/combat/plouc-eclaireurs-gobelins_thumb.png',
            'description' => "<p>Une escouade d’éclaireurs gobelins s’est postée non loin des sentiers fréquentés. Leur comportement trahit une intention claire&nbsp;:&nbsp;intercepter tout intrus, et frapper sans sommation. Une confrontation semble inévitable.</p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'livraison-en-cours',
                    'quest_step' => 3,
                    'status' => 'progress',
                ],
                'any' => [
                    [
                        'combat_not_started' => 'eclaireurs-gobelins',
                    ],
                    ['combat_status_not' =>
                        [
                            'combat' => 'eclaireurs-gobelins',
                            'status' => 'progress',
                        ],
                    ],
                ],
            ],
            'reward' => 'reward_combat_plouc_eclaireurs_gobelins',
            'victoryDescription' => "<p>Les éclaireurs sont neutralisés. Le silence revient sur la zone, laissant supposer que cette patrouille ne signalera rien à personne. Un répit bienvenu dans cette forêt toujours en alerte.</p><p>Prenez votre récompense et continuez votre chemin vers le campement…</p>",
            'defeatDescription' => "<p>Les gobelins ont parfaitement rempli leur mission&nbsp;:&nbsp;repousser les intrus. Leur attaque coordonnée vous a mise à terre, malgré vos efforts et votre ténacité. Ce sentier restera leur territoire… pour le moment.</p>",
            'location' => 'location_zone_oree_du_bois',
            'questStep' => 'quest_secondary_livraison_en_cours_step_3',
            'enemies' => [
                [
                    'enemy' => 'creature_eclaireur_gobelin',
                    'enemyClass' => Creature::class,
                ],
                [
                    'enemy' => 'creature_eclaireur_gobelin',
                    'enemyClass' => Creature::class,
                ],
                [
                    'enemy' => 'creature_eclaireur_gobelin',
                    'enemyClass' => Creature::class,
                ],
            ],
            'reference' => 'combat_plouc_eclaireurs_gobelins',
        ],
    ];
}
