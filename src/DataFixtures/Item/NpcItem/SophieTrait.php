<?php

namespace App\DataFixtures\Item\NpcItem;

use App\Entity\Item\Food;
use App\Entity\Item\Gift;
use App\Entity\Item\Map;

trait SophieTrait
{
    const SOPHIE_ITEMS = [
        [
            'character' => 'npc_sophie_la_marchande',
            'item' => 'food_fish',
            'class' => Food::class,
        ],
        [
            'character' => 'npc_sophie_la_marchande',
            'item' => 'gift_flowers',
            'class' => Gift::class,
        ],
        [
            'character' => 'npc_sophie_la_marchande',
            'item' => 'ring_copper',
            'class' => Gift::class,
        ],
        [
            'character' => 'npc_sophie_la_marchande',
            'item' => 'map_port_saint_doux',
            'class' => Map::class,
        ],
    ];
}
