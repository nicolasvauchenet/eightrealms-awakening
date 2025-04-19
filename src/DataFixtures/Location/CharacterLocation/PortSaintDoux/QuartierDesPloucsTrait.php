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
            'character' => 'npc_pecheur',
            'characterClass' => Npc::class,
            'location' => 'location_zone_quartier_des_ploucs',
            'reference' => 'location_zone_quartier_des_ploucs_pecheur',
        ],
    ];
}
