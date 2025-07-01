<?php

namespace App\DataFixtures\Dialog\Dialog\PortSaintDoux;

use App\Entity\Character\Npc;

trait GardeDuQuartierDesChauvesTrait
{
    const GARDE_DU_QUARTIER_DES_CHAUVES_DIALOGS = [
        // Dialogue : Accès au Palais
        [
            'type' => 'dialog',
            'character' => 'npc_garde_du_quartier_des_chauves',
            'characterClass' => Npc::class,
            'reference' => 'dialog_acces_au_palais_garde_du_quartier_des_chauves',
        ],
    ];
}
