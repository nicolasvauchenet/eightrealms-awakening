<?php

namespace App\DataFixtures\Reward\Combat\Plouc;

use App\Entity\Item\Food;

trait OreeDuBoisCombatTrait
{
    const OREE_DU_BOIS_COMBAT_REWARDS = [
        // Éclaireurs Gobelins
        [
            'items' => [
                [
                    'item' => 'food_meat_gobelin',
                    'itemClass' => Food::class,
                    'quantity' => 3,
                ],
            ],
            'crowns' => 0,
            'experience' => 30,
            'reference' => 'reward_combat_plouc_eclaireurs_gobelins',
        ],
    ];
}
