<?php

namespace App\DataFixtures\Dialog\Dialog\BoisDuPendu;

use App\Entity\Character\Npc;

trait TheobaldGrisMurmureTrait
{
    const THEOBALD_GRIS_MURMURE_DIALOGS = [
        // Quête: Bagarre Bizarre
        [
            'type' => 'dialog',
            'conditions' => [
                'quest_status' => [
                    'quest' => 'bagarre-bizarre',
                    'status' => 'progress',
                ],
            ],
            'character' => 'npc_theobald_le_gris_murmure',
            'characterClass' => Npc::class,
            'reference' => 'quest_theobald_gris_murmure',
        ],
    ];
}
