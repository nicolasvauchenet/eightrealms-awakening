<?php

namespace App\DataFixtures\Item\CreatureItem;

use App\Entity\Item\Armor;
use App\Entity\Item\Food;
use App\Entity\Item\Shield;
use App\Entity\Item\Weapon;

trait GobelinsTrait
{
    const GOBELINS_ITEMS = [
        // Éclaireur gobelin
        [
            'character' => 'creature_eclaireur_gobelin',
            'item' => 'armor_skin',
            'equipped' => true,
            'slot' => 'armor',
            'class' => Armor::class,
        ],
        [
            'character' => 'creature_eclaireur_gobelin',
            'item' => 'weapon_dagger',
            'equipped' => true,
            'slot' => 'righthand',
            'class' => Weapon::class,
        ],
        [
            'character' => 'creature_eclaireur_gobelin',
            'item' => 'food_meat_gobelin',
            'class' => Food::class,
        ],

        // Guerrier gobelin
        [
            'character' => 'creature_guerrier_gobelin',
            'item' => 'armor_iron',
            'equipped' => true,
            'slot' => 'armor',
            'class' => Armor::class,
        ],
        [
            'equipped' => true,
            'slot' => 'shield',
            'character' => 'creature_guerrier_gobelin',
            'item' => 'shield_iron',
            'class' => Shield::class,
        ],
        [
            'character' => 'creature_guerrier_gobelin',
            'item' => 'weapon_longsword',
            'equipped' => true,
            'slot' => 'righthand',
            'class' => Weapon::class,
        ],
        [
            'character' => 'creature_guerrier_gobelin',
            'item' => 'food_meat_gobelin',
            'class' => Food::class,
        ],

        // Chef gobelin
        [
            'character' => 'creature_chef_gobelin',
            'item' => 'armor_steel',
            'equipped' => true,
            'slot' => 'armor',
            'class' => Armor::class,
        ],
        [
            'character' => 'creature_chef_gobelin',
            'item' => 'weapon_warax',
            'equipped' => true,
            'slot' => 'righthand',
            'class' => Weapon::class,
        ],
        [
            'character' => 'creature_chef_gobelin',
            'item' => 'food_meat_gobelin',
            'class' => Food::class,
        ],
    ];
}
