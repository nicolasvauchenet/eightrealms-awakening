<?php

namespace App\DataFixtures\Screen\PlaceScreen;

trait QuartierDuMarcheTrait
{
    const QUARTIER_DU_MARCHE = [
        'name' => 'Place du Marché',
        'place' => 'place_quartier_du_marche',
        'npcs' => [
            'npc_sophie_la_marchande',
            'npc_robert_le_garde',
            'npc_bilo_le_passant',
        ],
        'reference' => 'screen_place_quartier_du_marche',
    ];
}
