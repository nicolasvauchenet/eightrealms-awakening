<?php

namespace App\DataFixtures\Dialog\Dialog\PortSaintDoux;

use App\Entity\Character\Npc;

trait MaireDePortSaintDouxTrait
{
    const MAIRE_DE_PORT_SAINT_DOUX_DIALOGS = [
        // Ragots : Quartier de la Nouvelle Ville
        [
            'type' => 'dialog',
            'character' => 'npc_maire_de_port_saint_doux',
            'characterClass' => Npc::class,
            'reference' => 'rumor_nouvelle_ville_maire_de_port_saint_doux',
        ],

        // Ragots
        [
            'type' => 'rumor',
            'character' => 'npc_maire_de_port_saint_doux',
            'characterClass' => Npc::class,
            'reference' => 'rumor_maire_de_port_saint_doux',
        ],
    ];
}
