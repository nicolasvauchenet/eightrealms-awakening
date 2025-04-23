<?php

namespace App\DataFixtures\Dialog\Dialog\PortSaintDoux;

use App\Entity\Character\Npc;

trait GartLeForgeronTrait
{
    const GART_LE_FORGERON_DIALOGS = [
        [
            'type' => 'dialog',
            'character' => 'npc_gart_le_forgeron',
            'characterClass' => Npc::class,
            'reference' => 'dialog_gart_le_forgeron',
        ],
    ];
}
