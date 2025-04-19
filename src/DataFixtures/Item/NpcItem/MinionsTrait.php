<?php

namespace App\DataFixtures\Item\NpcItem;

use App\Entity\Item\Armor;
use App\Entity\Item\Weapon;

trait MinionsTrait
{
    const MINIONS_ITEMS = [
        [
            'character' => 'npc_sbire',
            'item' => 'armor_leather',
            'class' => Armor::class,
            'equipped' => true,
            'slot' => 'armor',
        ],
        [
            'character' => 'npc_sbire',
            'item' => 'weapon_shortsword',
            'class' => Weapon::class,
            'equipped' => true,
            'slot' => 'righthand',
        ],
    ];
}
