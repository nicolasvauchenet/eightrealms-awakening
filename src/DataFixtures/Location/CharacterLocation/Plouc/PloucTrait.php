<?php

namespace App\DataFixtures\Location\CharacterLocation\Plouc;

use App\Entity\Character\Creature;
use App\Entity\Character\Npc;

trait PloucTrait
{
    const PLOUC_NPCS = [
        // NPCs
        [
            'character' => 'npc_gerard_le_pecheur',
            'characterClass' => Npc::class,
            'location' => 'location_building_maison_de_gerard_le_pecheur',
            'conditions' => [
                'all' => [
                    [
                        'quest_step_status_not' =>
                            [
                                'quest' => 'livraison-en-cours',
                                'quest_step' => 4,
                                'status' => 'progress',
                            ],
                    ],
                    [
                        'quest_step_status_not' =>
                            [
                                'quest' => 'livraison-en-cours',
                                'quest_step' => 9,
                                'status' => 'progress',
                            ],
                    ],
                ],
            ],
            'reference' => 'location_building_maison_de_gerard_le_pecheur_gerard_le_pecheur',
        ],

        // Creatures
        [
            'character' => 'creature_chef_gobelin',
            'characterClass' => Creature::class,
            'location' => 'location_zone_campement_gobelin',
            'conditions' => [
                'quest_status' => [
                    'quest' => 'livraison-en-cours',
                    'status' => 'progress',
                ],
            ],
            'reference' => 'location_zone_campement_gobelin_chef_gobelin',
        ],
        [
            'character' => 'creature_chef_gobelin',
            'characterClass' => Creature::class,
            'location' => 'location_plouc',
            'conditions' => [
                'quest_status' => [
                    'quest' => 'livraison-en-cours',
                    'status' => 'rewarded',
                ],
            ],
            'reference' => 'location_plouc_chef_gobelin',
        ],
    ];
}
