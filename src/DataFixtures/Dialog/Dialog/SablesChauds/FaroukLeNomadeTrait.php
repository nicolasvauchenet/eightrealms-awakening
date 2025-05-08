<?php

namespace App\DataFixtures\Dialog\Dialog\SablesChauds;

use App\Entity\Character\Npc;

trait FaroukLeNomadeTrait
{
    const FAROUK_LE_NOMADE_DIALOGS = [
        [
            'type' => 'dialog',
            'conditions' => [
                'quest_status' => [
                    'quest' => 'la-fiole-perdue',
                    'status' => 'progress',
                ],
            ],
            'character' => 'npc_farouk_le_nomade',
            'characterClass' => Npc::class,
            'reference' => 'dialog_farouk_le_nomade',
        ],
    ];
}
