<?php

namespace App\DataFixtures\Dialog\Dialog\SablesChauds;

use App\Entity\Character\Npc;

trait FauxDjinnTrait
{
    const FAUX_DJINN_DIALOGS = [
        // Quête secondaire : La Fiole Perdue
        [
            'type' => 'dialog',
            'character' => 'npc_faux_djinn',
            'characterClass' => Npc::class,
            'reference' => 'quest_secondary_faux_djinn',
        ],
    ];
}
