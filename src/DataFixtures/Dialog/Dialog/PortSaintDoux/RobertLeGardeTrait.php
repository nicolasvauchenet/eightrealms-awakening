<?php

namespace App\DataFixtures\Dialog\Dialog\PortSaintDoux;

use App\Entity\Character\Npc;

trait RobertLeGardeTrait
{
    const ROBERT_LE_GARDE_DIALOGS = [
        [
            'type' => 'dialog',
            'character' => 'npc_robert_le_garde',
            'characterClass' => Npc::class,
            'reference' => 'dialog_robert_le_garde',
        ],
        [
            'type' => 'rumor',
            'character' => 'npc_robert_le_garde',
            'characterClass' => Npc::class,
            'reference' => 'quest_robert_le_garde',
        ],
        [
            'type' => 'rumor',
            'character' => 'npc_robert_le_garde',
            'characterClass' => Npc::class,
            'reference' => 'rumor_robert_le_garde',
        ],
    ];
}
