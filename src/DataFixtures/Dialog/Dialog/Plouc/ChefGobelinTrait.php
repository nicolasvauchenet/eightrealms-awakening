<?php

namespace App\DataFixtures\Dialog\Dialog\Plouc;

use App\Entity\Character\Creature;

trait ChefGobelinTrait
{
    const CHEF_GOBELIN_DIALOGS = [
        // Quête secondaire : Livraison en cours
        [
            'type' => 'dialog',
            'character' => 'creature_chef_gobelin',
            'characterClass' => Creature::class,
            'reference' => 'quest_secondary_chef_gobelin',
        ],

        // Dialogue normal
        [
            'type' => 'dialog',
            'character' => 'creature_chef_gobelin',
            'characterClass' => Creature::class,
            'reference' => 'dialog_chef_gobelin',
        ],
    ];
}
