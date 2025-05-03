<?php

namespace App\DataFixtures\Location\CharacterLocation\PortSaintDoux;

use App\Entity\Character\Creature;
use App\Entity\Character\Npc;

trait DocksDeLOuestTrait
{
    const DOCKS_DE_L_OUEST_NPCS = [
        // Npcs
        [
            'character' => 'npc_myra_la_vieille',
            'characterClass' => Npc::class,
            'location' => 'location_building_taverne_de_la_flute_moisie',
            'reference' => 'location_building_taverne_de_la_flute_moisie_myra_la_vieille',
        ],
        [
            'character' => 'npc_jarrod_le_tavernier',
            'characterClass' => Npc::class,
            'location' => 'location_building_taverne_de_la_flute_moisie',
            'reference' => 'location_building_taverne_de_la_flute_moisie_jarrod_le_tavernier',
        ],

        // Creatures
        [
            'character' => 'creature_sirene',
            'characterClass' => Creature::class,
            'location' => 'location_zone_docks_de_l_ouest',
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'la-sirene-et-le-marin',
                    'quest_step' => 1,
                    'status' => 'completed',
                ],
            ],
            'reference' => 'location_zone_docks_de_l_ouest_sirene',
        ],
    ];
}
