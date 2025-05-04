<?php

namespace App\DataFixtures\Location\CharacterLocation\BoisDuPendu;

use App\Entity\Character\Npc;

trait ClairiereDeLOublieTrait
{
    const CLAIRIERE_DE_L_OUBLIE_NPCS = [
        // Npcs
        [
            'character' => 'npc_theobald_le_gris_murmure',
            'characterClass' => Npc::class,
            'location' => 'location_zone_clairiere_de_loublie',
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'bagarre-bizarre',
                    'quest_step' => 2,
                    'status' => 'completed',
                ],
            ],
            'reference' => 'location_zone_clairiere_de_loublie_theobald_le_gris_murmure',
        ],
    ];
}
