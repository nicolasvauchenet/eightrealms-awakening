<?php

namespace App\DataFixtures\Item\NpcItem;

use App\Entity\Item\Weapon;

trait DwarfTrait
{
    const DWARF_ITEMS = [
        [
            'character' => 'npc_nain_mineur',
            'item' => 'weapon_pickaxe',
            'class' => Weapon::class,
            'equipped' => true,
            'slot' => 'righthand',
        ],
    ];
}
