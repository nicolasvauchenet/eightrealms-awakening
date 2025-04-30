<?php

namespace App\DataFixtures\Combat\Location;

use App\Entity\Character\Creature;

trait PortSaintDouxTrait
{
    const PORT_SAINT_DOUX_COMBATS = [
        // Quêtes
        [
            'name' => 'Des Rats sur les Docks',
            'picture' => 'img/chapter1/combat/port-saint-doux-des-rats-sur-les-docks.webp',
            'thumbnail' => 'img/chapter1/combat/port-saint-doux-des-rats-sur-les-docks_thumb.png',
            'description' => "<p>Un groupe de gros rats vous a repéré et vous attaque&nbsp;! Vous êtes encerclé. Vous devez vous battre pour vous en sortir.</p>",
            'conditions' => [
                'quest_status' => [
                    'quest' => 'des-rats-sur-les-docks',
                    'status' => 'progress',
                ],
            ],
            'reward' => 'reward_combat_port_saint_doux_des_rats_sur_les_docks',
            'victoryDescription' => "<p>Vous sortez vainqueur de ce combat acharné et glorieux.</p><p>Profitez de votre récompense et remettez-vous vite, car d'autres défis vous attendent&nbsp;!</p>",
            'defeatDescription' => "<p>Vous avez été vaincu.</p><p>Mais rassurez-vous&nbsp;:&nbsp;Vous n'en avez pas encore terminé avec les Huit Royaumes&nbsp;! Dans leur grande magnaminité, les Dieux vous offrent une autre chance de sauver le Monde.</p><p>Vous serez ressuscité dans le Temple de la Capitale. Mais cela vous coûtera un peu de Couronnes… Il faut bien que le Grand Prêtre gagne sa vie.</p><p>Maintenant, relevez-vous et entraînez-vous pour être plus fort cette fois-ci&nbsp;!</p>",
            'location' => 'location_zone_anciens_docks',
            'questStep' => 'quest_secondary_des_rats_sur_les_docks_step_1',
            'enemies' => [
                [
                    'enemy' => 'creature_gros_rat',
                    'enemyClass' => Creature::class,
                ],
                [
                    'enemy' => 'creature_rat_geant',
                    'enemyClass' => Creature::class,
                ],
                [
                    'enemy' => 'creature_gros_rat',
                    'enemyClass' => Creature::class,
                ],
            ],
            'reference' => 'combat_port_saint_doux_des_rats_sur_les_docks',
        ],

        // Rencontres
        [
            'name' => 'Une bande de Rats sur les Docks',
            'picture' => 'img/chapter1/combat/port-saint-doux-une-bande-de-rats-sur-les-docks.webp',
            'thumbnail' => 'img/chapter1/combat/port-saint-doux-une-bande-de-rats-sur-les-docks_thumb.png',
            'description' => "<p>Un groupe de gros rats vous a repéré et vous attaque&nbsp;! Vous êtes encerclé. Vous devez vous battre pour vous en sortir.</p>",
            'conditions' => [
                'any' => [
                    'combat_not_started' => 'une-bande-de-rats-sur-les-docks',
                    'combat_status_not' => [
                        'combat' => 'une-bande-de-rats-sur-les-docks',
                        'status' => 'completed',
                    ],
                ],
            ],
            'reward' => 'reward_combat_port_saint_doux_une_bande_de_rats_sur_les_docks',
            'victoryDescription' => "<p>Vous sortez vainqueur de ce combat acharné et glorieux.</p><p>Profitez de votre récompense et remettez-vous vite, car d'autres défis vous attendent&nbsp;!</p>",
            'defeatDescription' => "<p>Vous avez été vaincu.</p><p>Mais rassurez-vous&nbsp;:&nbsp;Vous n'en avez pas encore terminé avec les Huit Royaumes&nbsp;! Dans leur grande magnaminité, les Dieux vous offrent une autre chance de sauver le Monde.</p><p>Vous serez ressuscité dans le Temple de la Capitale. Mais cela vous coûtera un peu de Couronnes… Il faut bien que le Grand Prêtre gagne sa vie.</p><p>Maintenant, relevez-vous et entraînez-vous pour être plus fort cette fois-ci&nbsp;!</p>",
            'location' => 'location_zone_anciens_docks',
            'enemies' => [
                [
                    'enemy' => 'creature_gros_rat',
                    'enemyClass' => Creature::class,
                ],
                [
                    'enemy' => 'creature_gros_rat',
                    'enemyClass' => Creature::class,
                ],
                [
                    'enemy' => 'creature_gros_rat',
                    'enemyClass' => Creature::class,
                ],
            ],
            'reference' => 'combat_port_saint_doux_une_bande_de_rats_sur_les_docks',
        ],
    ];
}
