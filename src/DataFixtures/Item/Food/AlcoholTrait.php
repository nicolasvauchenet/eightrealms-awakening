<?php

namespace App\DataFixtures\Item\Food;

trait AlcoholTrait
{
    const ALCOHOL_FOOD = [
        [
            'name' => 'Bouteille de vin',
            'picture' => 'food_wine.png',
            'description' => "<p>Une bouteille de vin rouge, parfaite pour accompagner un repas ou trinquer entre amis.</p>",
            'type' => 'food',
            'price' => 5,
            'category' => 'category_food',
            'target' => 'health',
            'effect' => 'ivresse',
            'amount' => 1,
            'duration' => 5,
            'reference' => 'food_wine',
        ],
        [
            'name' => 'Chope de bière',
            'picture' => 'food_beer.png',
            'description' => "<p>Une chope débordante de bière fraîche, idéale pour étancher la soif après une longue journée.</p>",
            'type' => 'food',
            'price' => 2,
            'category' => 'category_food',
            'target' => 'health',
            'effect' => 'ivresse',
            'amount' => 1,
            'duration' => 2,
            'reference' => 'food_beer',
        ],
    ];
}
