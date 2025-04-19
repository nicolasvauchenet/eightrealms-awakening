<?php

namespace App\DataFixtures\Item\NpcItem;

use App\Entity\Item\Armor;
use App\Entity\Item\Weapon;

trait ThugsTrait
{
    const THUGS_ITEMS = [
        [
            'character' => 'npc_malfrat',
            'item' => 'armor_leather',
            'class' => Armor::class,
            'equipped' => true,
            'slot' => 'armor',
        ],
        [
            'character' => 'npc_malfrat',
            'item' => 'weapon_longsword',
            'class' => Weapon::class,
            'equipped' => true,
            'slot' => 'righthand',
        ],
    ];
}
