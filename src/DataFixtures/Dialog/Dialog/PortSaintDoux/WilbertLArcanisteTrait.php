<?php

namespace App\DataFixtures\Dialog\Dialog\PortSaintDoux;

use App\Entity\Character\Npc;

trait WilbertLArcanisteTrait
{
    const WILBERT_L_ARCANISTE_DIALOGS = [
        // Quête : La Fiole Perdue
        [
            'type' => 'dialog',
            'character' => 'npc_wilbert_larcaniste',
            'characterClass' => Npc::class,
            'reference' => 'quest_wilbert_larcaniste',
        ],

        // Dialogue normal
        [
            'type' => 'dialog',
            'character' => 'npc_wilbert_larcaniste',
            'characterClass' => Npc::class,
            'reference' => 'dialog_wilbert_larcaniste',
        ],

        // Ragots
        [
            'type' => 'rumor',
            'character' => 'npc_wilbert_larcaniste',
            'characterClass' => Npc::class,
            'reference' => 'rumor_wilbert_larcaniste',
        ],
    ];
}
