<?php

namespace App\DataFixtures\Dialog\Dialog\PortSaintDoux;

use App\Entity\Character\Npc;

trait GartLeForgeronTrait
{
    const GART_LE_FORGERON_DIALOGS = [
        // Quête secondaire : Livraison en cours
        [
            'type' => 'dialog',
            'character' => 'npc_gart_le_forgeron',
            'characterClass' => Npc::class,
            'reference' => 'quest_secondary_gart_le_forgeron',
        ],

        // Quête principale
        [
            'type' => 'dialog',
            'character' => 'npc_gart_le_forgeron',
            'characterClass' => Npc::class,
            'reference' => 'quest_main_gart_le_forgeron',
        ],

        // Dialogue normal
        [
            'type' => 'dialog',
            'character' => 'npc_gart_le_forgeron',
            'characterClass' => Npc::class,
            'reference' => 'dialog_gart_le_forgeron',
        ],

        // Ragots
        [
            'type' => 'rumor',
            'character' => 'npc_gart_le_forgeron',
            'characterClass' => Npc::class,
            'reference' => 'rumor_gart_le_forgeron',
        ],
    ];
}
