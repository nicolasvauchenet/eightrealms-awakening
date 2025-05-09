<?php

namespace App\DataFixtures\Dialog\Dialog\SablesChauds;

use App\Entity\Character\Npc;

trait FauxDjinnTrait
{
    const FAUX_DJINN_DIALOGS = [
        // Quête: La Fiole Perdue
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
            'reference' => 'quest_faux_djinn',
        ],
    ];
}
