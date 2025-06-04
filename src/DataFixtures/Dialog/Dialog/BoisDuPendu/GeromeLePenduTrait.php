<?php

namespace App\DataFixtures\Dialog\Dialog\BoisDuPendu;

use App\Entity\Character\Creature;

trait GeromeLePenduTrait
{
    const GEROME_LE_PENDU_DIALOGS = [
        // Quête secondaire : Le Jugement du Cercle
        [
            'type' => 'dialog',
            'character' => 'creature_gerome_le_pendu',
            'characterClass' => Creature::class,
            'reference' => 'quest_secondary_gerome_le_pendu',
        ],
    ];
}
