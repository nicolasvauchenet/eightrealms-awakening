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
            'conditions' => [
                'quest_not_started' => 'banquet-inaugural',
            ],
            'reference' => 'location_quartier_du_marche_bilo_le_passant',
        ],
        [
            'character' => 'npc_bilo_le_passant',
            'characterClass' => Npc::class,
            'location' => 'location_building_jardins_de_la_mairie',
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'banquet-inaugural',
                    'quest_step' => 1,
                    'status' => 'progress',
                ],
            ],
            'reference' => 'location_building_jardins_de_la_mairie_bilo',
        ],
    ];
}
