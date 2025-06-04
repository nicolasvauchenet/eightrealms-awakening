<?php

namespace App\DataFixtures\Dialog\Dialog\PortSaintDoux;

use App\Entity\Character\Npc;

trait JarrodLeTavernierTrait
{
    const JARROD_LE_TAVERNIER_DIALOGS = [
        // Quête secondaire : Bagarre bizarre
        [
            'type' => 'dialog',
            'character' => 'npc_jarrod_le_tavernier',
            'characterClass' => Npc::class,
            'reference' => 'quest_secondary_jarrod_le_tavernier',
        ],

        // Dialogue normal
        [
            'type' => 'dialog',
            'character' => 'npc_jarrod_le_tavernier',
            'characterClass' => Npc::class,
            'reference' => 'dialog_jarrod_le_tavernier',
        ],

        // Ragots
        [
            'type' => 'rumor',
            'character' => 'npc_jarrod_le_tavernier',
            'characterClass' => Npc::class,
            'reference' => 'rumor_jarrod_le_tavernier',
        ],
    ];
}
