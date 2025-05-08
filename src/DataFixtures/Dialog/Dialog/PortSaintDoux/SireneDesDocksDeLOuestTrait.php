<?php

namespace App\DataFixtures\Dialog\Dialog\PortSaintDoux;

use App\Entity\Character\Creature;

trait SireneDesDocksDeLOuestTrait
{
    const SIRENE_DES_DOCKS_DE_L_OUEST_DIALOGS = [
        // Quête : La Sirène et le Marin
        [
            'type' => 'dialog',
            'character' => 'creature_sirene',
            'characterClass' => Creature::class,
            'reference' => 'quest_sirene_des_docks_de_louest',
        ],
    ];
}
