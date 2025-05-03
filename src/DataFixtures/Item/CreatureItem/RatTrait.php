<?php

namespace App\DataFixtures\Item\CreatureItem;

use App\Entity\Item\Armor;
use App\Entity\Item\Food;
use App\Entity\Item\Weapon;

trait RatTrait
{
    const RATS_ITEMS = [
        // Gros rat
        [
            'character' => 'creature_gros_rat',
            'item' => 'armor_fur',
            'equipped' => true,
            'slot' => 'armor',
            'class' => Armor::class,
        ],
        [
            'character' => 'creature_gros_rat',
            'item' => 'weapon_claws',
            'equipped' => true,
            'slot' => 'righthand',
            'class' => Weapon::class,
        ],
        [
            'character' => 'creature_gros_rat',
            'item' => 'food_meat_rat',
            'class' => Food::class,
        ],

        // Rat géant
        [
            'character' => 'creature_rat_geant',
            'item' => 'armor_leather',
            'equipped' => true,
            'slot' => 'armor',
            'class' => Armor::class,
        ],
        [
            'character' => 'creature_rat_geant',
            'item' => 'weapon_claws',
            'equipped' => true,
            'slot' => 'righthand',
            'class' => Weapon::class,
        ],
        [
            'character' => 'creature_rat_geant',
            'item' => 'weapon_teeth',
            'equipped' => true,
            'slot' => 'lefthand',
            'class' => Weapon::class,
        ],
        [
            'character' => 'creature_rat_geant',
            'item' => 'food_meat_rat',
            'class' => Food::class,
        ],
    ];
}
