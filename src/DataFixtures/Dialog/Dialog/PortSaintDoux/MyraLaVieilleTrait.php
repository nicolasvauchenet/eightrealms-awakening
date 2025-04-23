<?php

namespace App\DataFixtures\Dialog\Dialog\PortSaintDoux;

use App\Entity\Character\Npc;

trait MyraLaVieilleTrait
{
    const MYRA_LA_VIEILLE_DIALOGS = [
        [
            'type' => 'dialog',
            'character' => 'npc_myra_la_vieille',
            'characterClass' => Npc::class,
            'reference' => 'dialog_myra_la_vieille',
        ],
        [
            'type' => 'rumor',
            'character' => 'npc_myra_la_vieille',
            'characterClass' => Npc::class,
            'reference' => 'quest_myra_la_vieille',
        ],
        [
            'type' => 'rumor',
            'character' => 'npc_myra_la_vieille',
            'characterClass' => Npc::class,
            'reference' => 'rumor_myra_la_vieille',
        ],
    ];
}
