<?php

namespace App\DataFixtures\Location\CharacterLocation\MontsTerribles;

use App\Entity\Character\Npc;

trait RefugeDuBoucBoiteuxTrait
{
    const REFUGE_DU_BOUC_BOITEUX_NPCS = [
        [
            'character' => 'npc_tharol_le_silencieux',
            'characterClass' => Npc::class,
            'location' => 'location_building_le_refuge',
            'conditions' => [
                'quest_step_status' => [
                    'quest_step_status' => [
                        'quest' => 'le-gardien-du-refuge',
                        'quest_step' => 14,
                        'status' => 'progress',
                    ],
                ],
            ],
            'reference' => 'location_zone_refuge_du_bouc_boiteux_tharol_le_silencieux',
        ],
    ];
}
