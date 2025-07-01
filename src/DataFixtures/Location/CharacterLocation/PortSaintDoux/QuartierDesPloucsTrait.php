<?php

namespace App\DataFixtures\Location\CharacterLocation\PortSaintDoux;

use App\Entity\Character\Npc;

trait QuartierDesPloucsTrait
{
    const QUARTIER_DES_PLOUCS_NPCS = [
        [
            'character' => 'npc_wilbert_larcaniste',
            'characterClass' => Npc::class,
            'location' => 'location_building_arcanes_de_port_saint_doux',
            'reference' => 'location_building_arcanes_de_port_saint_doux_wilbert_larcaniste',
        ],
        [
            'character' => 'npc_pecheur_du_quartier_des_ploucs',
            'characterClass' => Npc::class,
            'location' => 'location_zone_quartier_des_ploucs',
            'conditions' => [
                'quest_not_started' => 'banquet-inaugural',
            ],
            'reference' => 'location_zone_quartier_des_ploucs_pecheur',
        ],
        [
            'character' => 'npc_pecheur_du_quartier_des_ploucs',
            'characterClass' => Npc::class,
            'location' => 'location_building_jardins_de_la_mairie',
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'banquet-inaugural',
                    'quest_step' => 1,
                    'status' => 'progress',
                ],
            ],
            'reference' => 'location_building_jardins_de_la_mairie_pecheur',
        ],
    ];
}
