<?php

namespace App\DataFixtures\Combat\MontsTerribles;

use App\Entity\Character\Creature;

trait RefugeDuBoucBoiteuxTrait
{
    const REFUGE_DU_BOUC_BOITEUX_COMBATS = [
        // Quêtes
        [
            'name' => 'Le Gardien du Refuge',
            'picture' => 'img/chapter1/combat/refuge-du-bouc-boiteux-le-gardien-du-refuge.webp',
            'thumbnail' => 'img/chapter1/combat/refuge-du-bouc-boiteux-le-gardien-du-refuge_thumb.png',
            'description' => "<p>Alors que vous sortez du Refuge du Bouc Boiteux, un grondement sourd résonne entre les montagnes. Une silhouette massive bondit hors de l’ombre&nbsp;:&nbsp;un gigantesque bouquetin aux yeux rouges, cornes basses et sabots prêts à frapper. Le gardien du lieu ne tolère aucun intrus…</p>",
            'conditions' => [
                'any' => [
                    [
                        'quest_step_status' => [
                            'quest' => 'le-gardien-du-refuge',
                            'quest_step' => 3,
                            'status' => 'progress',
                        ],
                    ],
                ],
            ],
            'reward' => 'reward_combat_refuge_du_bouc_boiteux_le_gardien_du_refuge',
            'victoryDescription' => "<p>Dans un dernier élan, la bête chancelle et s’effondre lourdement dans la neige. Le silence retombe, et la morsure du froid se fait de nouveau sentir.</p>",
            'defeatDescription' => "<p>Les sabots du bouquetin frappent avec une violence inouïe, et vous êtes projeté dans la neige, meurtri. Le gardien du Refuge se dresse au-dessus de vous, impassible, ses yeux luisant d’un éclat ancien. Le froid n’est pas la seule chose qui mord ici…</p>",
            'location' => 'location_zone_refuge_du_bouc_boiteux',
            'questStep' => 'quest_secondary_le_gardien_du_refuge_step_3',
            'enemies' => [
                [
                    'enemy' => 'creature_bouquetin_feroce',
                    'enemyClass' => Creature::class,
                ],
            ],
            'reference' => 'combat_refuge_du_bouc_boiteux_le_gardien_du_refuge',
        ],
        [
            'name' => 'Le Gardien du Refuge',
            'picture' => 'img/chapter1/combat/refuge-du-bouc-boiteux-le-gardien-du-refuge.webp',
            'thumbnail' => 'img/chapter1/combat/refuge-du-bouc-boiteux-le-gardien-du-refuge_thumb.png',
            'description' => "<p>Alors que vous sortez du Refuge du Bouc Boiteux, vous ouvrez de grands yeux incrédules&nbsp;:&nbsp;le bouquetin est revenu, indemne&nbsp;! C'est le même, aucun doute. La même taille, les mêmes yeux jaunes… Il va falloir vous battre à nouveau.</p>",
            'conditions' => [
                'any' => [
                    [
                        'quest_step_status' => [
                            'quest' => 'le-gardien-du-refuge',
                            'quest_step' => 6,
                            'status' => 'progress',
                        ],
                    ],
                ],
            ],
            'reward' => 'reward_combat_refuge_du_bouc_boiteux_le_gardien_du_refuge',
            'victoryDescription' => "<p>Dans un dernier râle rauque, le bouquetin s'effondre sur la neige. Le Gardien du Refuge n'est plus… Mais le mystère reste entier.</p>",
            'defeatDescription' => "<p>Les sabots du bouquetin frappent avec une violence inouïe, et vous êtes projeté dans la neige, meurtri. Le gardien du Refuge se dresse au-dessus de vous, impassible, ses yeux luisant d’un éclat ancien. Le froid n’est pas la seule chose qui mord ici…</p>",
            'location' => 'location_zone_refuge_du_bouc_boiteux',
            'questStep' => 'quest_secondary_le_gardien_du_refuge_step_6',
            'enemies' => [
                [
                    'enemy' => 'creature_bouquetin_feroce',
                    'enemyClass' => Creature::class,
                ],
            ],
            'reference' => 'combat_refuge_du_bouc_boiteux_le_gardien_du_refuge_retour',
        ],
    ];
}
