<?php

namespace App\DataFixtures\Dialog\Dialog\PortSaintDoux;

use App\Entity\Character\Npc;

trait SophieLaMarchandeTrait
{
    const SOPHIE_LA_MARCHANDE_DIALOGS = [
        // Dialogue normal
        [
            'type' => 'dialog',
            'character' => 'npc_sophie_la_marchande',
            'characterClass' => Npc::class,
            'reference' => 'dialog_sophie_la_marchande',
        ],

        // Ragots : Temple de Port Saint-Doux
        [
            'type' => 'rumor',
            'character' => 'npc_sophie_la_marchande',
            'characterClass' => Npc::class,
            'reference' => 'rumor_temple_sophie_la_marchande',
        ],

        // Ragots
        [
            'type' => 'rumor',
            'character' => 'npc_sophie_la_marchande',
            'characterClass' => Npc::class,
            'reference' => 'rumor_sophie_la_marchande',
        ],
    ];
}
