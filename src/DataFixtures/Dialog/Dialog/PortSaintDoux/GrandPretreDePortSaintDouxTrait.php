<?php

namespace App\DataFixtures\Dialog\Dialog\PortSaintDoux;

use App\Entity\Character\Npc;

trait GrandPretreDePortSaintDouxTrait
{
    const GRAND_PRETRE_DE_PORT_SAINT_DOUX_DIALOGS = [
        // Ragots
        [
            'type' => 'rumor',
            'character' => 'npc_grand_pretre_de_port_saint_doux',
            'characterClass' => Npc::class,
            'reference' => 'rumor_grand_pretre_de_port_saint_doux',
        ],
    ];
}
