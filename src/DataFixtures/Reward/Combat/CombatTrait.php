<?php

namespace App\DataFixtures\Reward\Combat;

use App\Entity\Item\Food;

trait CombatTrait
{
    const COMBAT_REWARDS = [
        [
            'items' => [
                [
                    'item' => 'food_meat_rat',
                    'itemClass' => Food::class,
                    'quantity' => 3,
                ],
            ],
            'crowns' => 20,
            'experience' => 25,
            'reference' => 'reward_combat_port_saint_doux_une_bande_de_rats_sur_les_docks',
        ],
    ];
}
