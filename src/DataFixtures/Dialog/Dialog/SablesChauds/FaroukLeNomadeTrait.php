<?php

namespace App\DataFixtures\Dialog\Dialog\SablesChauds;

use App\Entity\Character\Npc;

trait FaroukLeNomadeTrait
{
    const FAROUK_LE_NOMADE_DIALOGS = [
        // Quête secondaire : La Fiole Perdue
        [
            'type' => 'dialog',
            'character' => 'npc_farouk_le_nomade',
            'characterClass' => Npc::class,
            'reference' => 'quest_secondary_farouk_le_nomade',
        ],

        // Ragots : Crique du Pendu
        [
            'type' => 'rumor',
            'character' => 'npc_farouk_le_nomade',
            'characterClass' => Npc::class,
            'reference' => 'rumor_crique_du_pendu_farouk_le_nomade',
        ],

        // Ragots
        [
            'type' => 'rumor',
            'character' => 'npc_farouk_le_nomade',
            'characterClass' => Npc::class,
            'reference' => 'rumor_farouk_le_nomade',
        ],
    ];
}
