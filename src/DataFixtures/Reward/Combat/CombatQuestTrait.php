<?php

namespace App\DataFixtures\Reward\Combat;

use App\Entity\Item\Food;

trait CombatQuestTrait
{
    const COMBAT_QUEST_REWARDS = [
        // Des Rats sur les Docks
        [
            'items' => [
                [
                    'item' => 'food_meat_rat',
                    'itemClass' => Food::class,
                    'quantity' => 3,
                ],
            ],
            'crowns' => 50,
            'experience' => 50,
            'reference' => 'reward_combat_port_saint_doux_des_rats_sur_les_docks',
        ],

        // La Sirène des Docks
        [
            'experience' => 50,
            'reference' => 'reward_combat_port_saint_doux_la_sirene_des_docks',
        ],
    ];
}
