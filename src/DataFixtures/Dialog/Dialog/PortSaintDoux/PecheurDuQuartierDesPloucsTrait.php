<?php

namespace App\DataFixtures\Dialog\Dialog\PortSaintDoux;

use App\Entity\Character\Npc;

trait PecheurDuQuartierDesPloucsTrait
{
    const PECHEUR_DU_QUARTIER_DES_PLOUCS_DIALOGS = [
        [
            'type' => 'dialog',
            'character' => 'npc_pecheur',
            'characterClass' => Npc::class,
            'reference' => 'dialog_pecheur',
        ],
    ];
}
