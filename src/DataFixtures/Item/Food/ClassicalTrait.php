<?php

namespace App\DataFixtures\Item\Food;

trait ClassicalTrait
{
    const CLASSICAL_FOOD = [
        [
            'name' => 'Miche de pain',
            'picture' => 'food_bread.png',
            'description' => "<p>Une miche de pain dorée, incontournable pour un repas simple mais savoureux.</p>",
            'type' => 'food',
            'price' => 2,
            'category' => 'category_food',
            'target' => 'health',
            'amount' => 3,
            'reference' => 'food_bread',
        ],
        [
            'name' => 'Fromage de chèvre',
            'picture' => 'food_cheese.png',
            'description' => "<p>Un fromage de chèvre crémeux et savoureux, parfait pour compléter un repas.</p>",
            'type' => 'food',
            'price' => 3,
            'category' => 'category_food',
            'target' => 'health',
            'amount' => 3,
            'reference' => 'food_cheese',
        ],
        [
            'name' => 'Cuisse de poulet',
            'picture' => 'food_chicken.png',
            'description' => "<p>Une cuisse de poulet rôtie, croustillante à l'extérieur et juteuse à l'intérieur.</p>",
            'type' => 'food',
            'price' => 3,
            'category' => 'category_food',
            'target' => 'health',
            'amount' => 5,
            'reference' => 'food_chicken',
        ],
        [
            'name' => 'Poisson grillé',
            'picture' => 'food_fish.png',
            'description' => "<p>Ce poisson grillé est un délice pour les amateurs de saveurs marines.</p>",
            'type' => 'food',
            'price' => 4,
            'category' => 'category_food',
            'target' => 'health',
            'amount' => 7,
            'reference' => 'food_fish',
        ],
        [
            'name' => "Gigot d'agneau",
            'picture' => 'food_meat.png',
            'description' => "<p>Un gigot d'agneau tendre et savoureux, idéal pour un festin généreux.</p>",
            'type' => 'food',
            'price' => 5,
            'category' => 'category_food',
            'target' => 'health',
            'amount' => 8,
            'reference' => 'food_meat',
        ],
    ];
}
