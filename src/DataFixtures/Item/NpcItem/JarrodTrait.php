<?php

namespace App\DataFixtures\Item\NpcItem;

use App\Entity\Item\Food;

trait JarrodTrait
{
    const JARROD_ITEMS = [
        [
            'character' => 'npc_jarrod_le_tavernier',
            'item' => 'food_beer',
            'class' => Food::class,
        ],
        [
            'character' => 'npc_jarrod_le_tavernier',
            'item' => 'food_wine',
            'class' => Food::class,
        ],
        [
            'character' => 'npc_jarrod_le_tavernier',
            'item' => 'food_bread',
            'class' => Food::class,
        ],
        [
            'character' => 'npc_jarrod_le_tavernier',
            'item' => 'food_cheese',
            'class' => Food::class,
        ],
        [
            'character' => 'npc_jarrod_le_tavernier',
            'item' => 'food_chicken',
            'class' => Food::class,
        ],
        [
            'character' => 'npc_jarrod_le_tavernier',
            'item' => 'food_meat',
            'class' => Food::class,
        ],
    ];
}
