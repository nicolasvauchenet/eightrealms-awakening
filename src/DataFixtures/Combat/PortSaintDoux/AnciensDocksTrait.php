<?php

namespace App\DataFixtures\Combat\PortSaintDoux;

use App\Entity\Character\Creature;

trait AnciensDocksTrait
{
    const ANCIENS_DOCKS_COMBATS = [
        // Quêtes
        [
            'name' => 'Des Rats sur les Docks',
            'picture' => 'img/chapter1/combat/port-saint-doux-des-rats-sur-les-docks.webp',
            'thumbnail' => 'img/chapter1/combat/port-saint-doux-des-rats-sur-les-docks_thumb.png',
            'description' => "<p>Un grincement sinistre résonne entre les caisses abandonnées… Une nuée de rats surgit des ombres, les yeux brillants de rage et de faim. Le plus gros d’entre eux grogne, prêt à en découdre. Il va falloir vous battre pour nettoyer ces docks infestés&nbsp;!</p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'des-rats-sur-les-docks',
                    'quest_step' => 1,
                    'status' => 'progress',
                ],
            ],
            'reward' => 'reward_combat_port_saint_doux_des_rats_sur_les_docks',
            'victoryDescription' => "<p>Les rats gisent autour de vous, repoussés par votre détermination et vos coups bien placés. Les docks sont un peu plus sûrs grâce à vous.</p><p>Mais le repos sera de courte durée. Récupérez votre dû, soignez vos plaies… d'autres épreuves approchent.</p>",
            'defeatDescription' => "<p>Le combat vous échappe… Vos forces vous trahissent et l’ombre vous engloutit.</p><p>Mais ce n’est pas la fin. Les Dieux, dans leur mystérieuse clémence, vous offrent une seconde chance. Une résurrection au Temple de la Capitale… contre quelques Couronnes.</p><p>Relevez-vous, affûtez vos armes, et souvenez-vous&nbsp;: la mort n’est qu’un détour dans les Huit Royaumes.</p>",
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
            'description' => "<p>Des couinements stridents vous encerclent. Trois rats énormes vous barrent le chemin, les crocs luisants et l’attitude agressive. C’est une embuscade, et vous êtes la cible. Il va falloir vous battre pour leur échapper vivant&nbsp;!</p>",
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
            'victoryDescription' => "<p>Les assaillants sont vaincus. Vous reprenez votre souffle, entouré des corps poilus des rats terrassés.</p><p>Les habitants des docks pourront peut-être dormir un peu plus tranquilles ce soir…</p>",
            'defeatDescription' => "<p>Le combat vous échappe… Vos forces vous trahissent et l’ombre vous engloutit.</p><p>Mais ce n’est pas la fin. Les Dieux, dans leur mystérieuse clémence, vous offrent une seconde chance. Une résurrection au Temple de la Capitale… contre quelques Couronnes.</p><p>Relevez-vous, affûtez vos armes, et souvenez-vous&nbsp;: la mort n’est qu’un détour dans les Huit Royaumes.</p>",
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
