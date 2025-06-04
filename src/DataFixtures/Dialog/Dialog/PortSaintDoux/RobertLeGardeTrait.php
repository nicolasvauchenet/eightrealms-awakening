<?php

namespace App\DataFixtures\Dialog\Dialog\PortSaintDoux;

use App\Entity\Character\Npc;

trait RobertLeGardeTrait
{
    const ROBERT_LE_GARDE_DIALOGS = [
        // Quête secondaire : Bagarre bizarre
        [
            'type' => 'dialog',
            'character' => 'npc_robert_le_garde',
            'characterClass' => Npc::class,
            'reference' => 'quest_secondary_robert_le_garde',
        ],

        // Dialogue normal
        [
            'type' => 'dialog',
            'character' => 'npc_robert_le_garde',
            'characterClass' => Npc::class,
            'reference' => 'dialog_robert_le_garde',
        ],

        // Ragots
        [
            'type' => 'rumor',
            'character' => 'npc_robert_le_garde',
            'characterClass' => Npc::class,
            'reference' => 'rumor_robert_le_garde',
        ],
    ];
}
