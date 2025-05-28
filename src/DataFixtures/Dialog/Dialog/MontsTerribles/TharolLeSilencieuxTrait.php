<?php

namespace App\DataFixtures\Dialog\Dialog\MontsTerribles;

use App\Entity\Character\Npc;

trait TharolLeSilencieuxTrait
{
    const THAROL_LE_SILENCIEUX_DIALOGS = [
        // Quête : Le Gardien du Refuge
        [
            'type' => 'dialog',
            'character' => 'npc_tharol_le_silencieux',
            'characterClass' => Npc::class,
            'reference' => 'quest_tharol_le_silencieux',
        ],
    ];
}
