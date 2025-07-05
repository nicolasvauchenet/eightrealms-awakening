<?php

namespace App\DataFixtures\Dialog\Dialog\PortSaintDoux;

use App\Entity\Character\Npc;

trait GardeDuPalaisTrait
{
    const GARDE_DU_PALAIS_DIALOGS = [
        // Dialogue : Accès aux Appartements Royaux
        [
            'type' => 'dialog',
            'character' => 'npc_garde_du_palais',
            'characterClass' => Npc::class,
            'reference' => 'dialog_acces_aux_appartements_royaux_garde_du_palais',
        ],
    ];
}
