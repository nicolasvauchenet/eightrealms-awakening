<?php

namespace App\DataFixtures\Dialog\Dialog\PortSaintDoux;

use App\Entity\Character\Creature;

trait SireneDesDocksDeLOuestTrait
{
    const SIRENE_DES_DOCKS_DE_L_OUEST_DIALOGS = [
        // Quête secondaire : La Sirène et le Marin
        [
            'type' => 'dialog',
            'character' => 'creature_sirene_melancolique',
            'characterClass' => Creature::class,
            'reference' => 'quest_secondary_sirene_des_docks_de_louest',
        ],
    ];
}
