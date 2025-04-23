<?php

namespace App\DataFixtures\Dialog\Dialog\PortSaintDoux;

use App\Entity\Character\Creature;

trait SireneDesDocksDeLOuestTrait
{
    const SIRENE_DES_DOCKS_DE_L_OUEST_DIALOGS = [
        [
            'type' => 'dialog',
            'conditions' => [
                'quest_status' => [
                    'quest' => 'la-sirene-et-le-marin',
                    'status' => 'progress',
                ],
            ],
            'character' => 'creature_sirene',
            'characterClass' => Creature::class,
            'reference' => 'dialog_sirene_des_docks_de_louest',
        ],
    ];
}
