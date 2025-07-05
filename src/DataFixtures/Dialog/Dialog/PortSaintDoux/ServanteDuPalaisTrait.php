<?php

namespace App\DataFixtures\Dialog\Dialog\PortSaintDoux;

use App\Entity\Character\Npc;

trait ServanteDuPalaisTrait
{
    const SERVANTE_DU_PALAIS_DIALOGS = [
        // Quête secondaire : Un Cadeau pour la Servante
        [
            'type' => 'dialog',
            'character' => 'npc_servante_du_palais',
            'characterClass' => Npc::class,
            'reference' => 'quest_secondary_servante_du_palais',
        ],
    ];
}
