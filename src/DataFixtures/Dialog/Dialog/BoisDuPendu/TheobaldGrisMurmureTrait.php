<?php

namespace App\DataFixtures\Dialog\Dialog\BoisDuPendu;

use App\Entity\Character\Npc;

trait TheobaldGrisMurmureTrait
{
    const THEOBALD_GRIS_MURMURE_DIALOGS = [
        // Quête secondaire : Bagarre Bizarre
        [
            'type' => 'dialog',
            'character' => 'npc_theobald_le_gris_murmure',
            'characterClass' => Npc::class,
            'reference' => 'quest_secondary_theobald_gris_murmure',
        ],
    ];
}
