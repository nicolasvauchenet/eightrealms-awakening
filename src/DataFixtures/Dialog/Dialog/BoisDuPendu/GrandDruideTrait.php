<?php

namespace App\DataFixtures\Dialog\Dialog\BoisDuPendu;

use App\Entity\Character\Npc;

trait GrandDruideTrait
{
    const GRAND_DRUIDE_DIALOGS = [
        // Quête principale : Les disparus du Donjon
        [
            'type' => 'dialog',
            'character' => 'npc_grand_druide',
            'characterClass' => Npc::class,
            'reference' => 'quest_main_grand_druide',
        ],

        // Quête secondaire : Le Gardien du Refuge
        [
            'type' => 'dialog',
            'character' => 'npc_grand_druide',
            'characterClass' => Npc::class,
            'reference' => 'quest_secondary_grand_druide',
        ],
    ];
}
