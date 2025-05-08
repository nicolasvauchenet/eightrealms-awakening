<?php

namespace App\DataFixtures\Dialog\Dialog\PortSaintDoux;

use App\Entity\Character\Npc;

trait GartLeForgeronTrait
{
    const GART_LE_FORGERON_DIALOGS = [
        // Ragots
        [
            'type' => 'rumor',
            'character' => 'npc_gart_le_forgeron',
            'characterClass' => Npc::class,
            'reference' => 'rumor_gart_le_forgeron',
        ],
    ];
}
