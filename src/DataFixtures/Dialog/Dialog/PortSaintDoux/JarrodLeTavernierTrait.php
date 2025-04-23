<?php

namespace App\DataFixtures\Dialog\Dialog\PortSaintDoux;

use App\Entity\Character\Npc;

trait JarrodLeTavernierTrait
{
    const JARROD_LE_TAVERNIER_DIALOGS = [
        [
            'type' => 'dialog',
            'character' => 'npc_jarrod_le_tavernier',
            'characterClass' => Npc::class,
            'reference' => 'dialog_jarrod_le_tavernier',
        ],
        [
            'type' => 'rumor',
            'conditions' => [
                'quest_status' => [
                    'quest' => 'bagarre-bizarre',
                    'status' => 'progress',
                ],
            ],
            'character' => 'npc_jarrod_le_tavernier',
            'characterClass' => Npc::class,
            'reference' => 'quest_jarrod_le_tavernier',
        ],
        [
            'type' => 'rumor',
            'character' => 'npc_jarrod_le_tavernier',
            'characterClass' => Npc::class,
            'reference' => 'rumor_jarrod_le_tavernier',
        ],
    ];
}
