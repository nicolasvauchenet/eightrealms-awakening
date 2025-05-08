<?php

namespace App\DataFixtures\Dialog\Dialog\SablesChauds;

use App\Entity\Character\Npc;

trait FauxDjinnTrait
{
    const FAUX_DJINN_DIALOGS = [
        [
            'type' => 'dialog',
            'conditions' => [
                'quest_status' => [
                    'quest' => 'la-fiole-perdue',
                    'status' => 'progress',
                ],
            ],
            'character' => 'npc_faux_djinn',
            'characterClass' => Npc::class,
            'reference' => 'dialog_faux_djinn',
        ],
    ];
}
