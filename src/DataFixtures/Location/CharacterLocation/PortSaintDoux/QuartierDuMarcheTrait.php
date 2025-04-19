<?php

namespace App\DataFixtures\Location\CharacterLocation\PortSaintDoux;

use App\Entity\Character\Npc;

trait QuartierDuMarcheTrait
{
    const QUARTIER_DU_MARCHE_NPCS = [
        [
            'character' => 'npc_sophie_la_marchande',
            'characterClass' => Npc::class,
            'location' => 'location_zone_quartier_du_marche',
            'reference' => 'location_quartier_du_marche_sophie_la_marchande',
        ],
        [
            'character' => 'npc_robert_le_garde',
            'characterClass' => Npc::class,
            'location' => 'location_zone_quartier_du_marche',
            'reference' => 'location_quartier_du_marche_robert_le_garde',
        ],
        [
            'character' => 'npc_bilo_le_passant',
            'characterClass' => Npc::class,
            'location' => 'location_zone_quartier_du_marche',
            'reference' => 'location_quartier_du_marche_bilo_le_passant',
        ],
    ];
}
