<?php

namespace App\DataFixtures\Dialog\Dialog\PortSaintDoux;

use App\Entity\Character\Npc;

trait PecheurDuQuartierDesPloucsTrait
{
    const PECHEUR_DU_QUARTIER_DES_PLOUCS_DIALOGS = [
        // Ragots
        [
            'type' => 'rumor',
            'character' => 'npc_pecheur',
            'characterClass' => Npc::class,
            'reference' => 'rumor_pecheur',
        ],
    ];
}
