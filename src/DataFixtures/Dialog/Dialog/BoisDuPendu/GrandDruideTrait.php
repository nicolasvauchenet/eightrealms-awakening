<?php

namespace App\DataFixtures\Dialog\Dialog\BoisDuPendu;

use App\Entity\Character\Npc;

trait GrandDruideTrait
{
    const GRAND_DRUIDE_DIALOGS = [
        // Quête : Les disparus du Donjon
        [
            'type' => 'dialog',
            'character' => 'npc_grand_druide',
            'characterClass' => Npc::class,
            'reference' => 'quest_grand_druide',
        ],

        // Quête : Le Gardien du Refuge
        [
            'type' => 'dialog',
            'character' => 'npc_grand_druide',
            'characterClass' => Npc::class,
            'reference' => 'dialog_grand_druide',
        ],
    ];
}
