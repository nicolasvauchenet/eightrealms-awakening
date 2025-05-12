<?php

namespace App\DataFixtures\Reward\Combat\PortSaintDoux;

use App\Entity\Item\Food;

trait AnciensDocksCombatTrait
{
    const ANCIENS_DOCKS_COMBAT_REWARDS = [
        // Une bande de rats sur les Docks
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
