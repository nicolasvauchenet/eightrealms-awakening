<?php

namespace App\DataFixtures\Dialog\Dialog\PortSaintDoux;

use App\Entity\Character\Npc;

trait BiloLePassantTrait
{
    const BILO_LE_PASSANT_DIALOGS = [
        [
            'type' => 'dialog',
            'character' => 'npc_bilo_le_passant',
            'characterClass' => Npc::class,
            'reference' => 'dialog_bilo_le_passant',
        ],
        [
            'type' => 'rumor',
            'character' => 'npc_bilo_le_passant',
            'characterClass' => Npc::class,
            'reference' => 'quest_bilo_le_passant',
        ],
        [
            'type' => 'rumor',
            'character' => 'npc_bilo_le_passant',
            'characterClass' => Npc::class,
            'reference' => 'rumor_bilo_le_passant',
        ],
    ];
}
