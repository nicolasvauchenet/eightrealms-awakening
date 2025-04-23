<?php

namespace App\DataFixtures\Dialog\Dialog\PortSaintDoux;

use App\Entity\Character\Npc;

trait WilbertLArcanisteTrait
{
    const WILBERT_L_ARCANISTE_DIALOGS = [
        [
            'type' => 'dialog',
            'character' => 'npc_wilbert_larcaniste',
            'characterClass' => Npc::class,
            'reference' => 'dialog_wilbert_larcaniste',
        ],
    ];
}
