<?php

namespace App\DataFixtures\Item\Food;

trait CreatureTrait
{
    const CREATURE_FOOD = [
        [
            'name' => 'Viande de rat',
            'picture' => 'food_meat.png',
            'description' => "<p>De la viande de rat fraîche, à cuire pour un repas simple mais nourrissant.</p>",
            'type' => 'food',
            'price' => 1,
            'category' => 'category_food',
            'target' => 'health',
            'amount' => 5,
            'reference' => 'food_meat_rat',
        ],
        [
            'name' => 'Viande de gobelin',
            'picture' => 'food_meat.png',
            'description' => "<p>De la viande de gobelin qui ne devrait pas inspirer confiance, mais qui reste comestible, si on a le ventre solide.</p>",
            'type' => 'food',
            'price' => 0,
            'category' => 'category_food',
            'target' => 'health',
            'effect' => 'maladie',
            'amount' => 5,
            'reference' => 'food_meat_gobelin',
        ],
    ];
}
