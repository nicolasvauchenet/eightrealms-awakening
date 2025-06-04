<?php

namespace App\DataFixtures\Dialog\Dialog\PortSaintDoux;

use App\Entity\Character\Npc;

trait BiloLePassantTrait
{
    const BILO_LE_PASSANT_DIALOGS = [
        // Quête : Des Rats sur les Docks
        [
            'type' => 'dialog',
            'character' => 'npc_bilo_le_passant',
            'characterClass' => Npc::class,
            'reference' => 'quest_secondary_bilo_le_passant',
        ],

        // Dialogue normal
        [
            'type' => 'dialog',
            'character' => 'npc_bilo_le_passant',
            'characterClass' => Npc::class,
            'reference' => 'dialog_bilo_le_passant',
        ],

        // Ragots : Arcanes de Port Saint-Doux
        [
            'type' => 'rumor',
            'character' => 'npc_bilo_le_passant',
            'characterClass' => Npc::class,
            'reference' => 'rumor_arcanes_bilo_le_passant',
        ],

        // Ragots
        [
            'type' => 'rumor',
            'character' => 'npc_bilo_le_passant',
            'characterClass' => Npc::class,
            'reference' => 'rumor_bilo_le_passant',
        ],
    ];
}
