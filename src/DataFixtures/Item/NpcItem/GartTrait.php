<?php

namespace App\DataFixtures\Item\NpcItem;

use App\Entity\Item\Armor;
use App\Entity\Item\Gift;
use App\Entity\Item\Map;
use App\Entity\Item\Shield;
use App\Entity\Item\Weapon;

trait GartTrait
{
    const GART_ITEMS = [
        [
            'character' => 'npc_gart_le_forgeron',
            'item' => 'armor_leather',
            'class' => Armor::class,
        ],
        [
            'character' => 'npc_gart_le_forgeron',
            'item' => 'armor_iron',
            'class' => Armor::class,
        ],
        [
            'character' => 'npc_gart_le_forgeron',
            'item' => 'armor_steel',
            'class' => Armor::class,
        ],
        [
            'character' => 'npc_gart_le_forgeron',
            'item' => 'shield_wooden',
            'class' => Shield::class,
        ],
        [
            'character' => 'npc_gart_le_forgeron',
            'item' => 'shield_iron',
            'class' => Shield::class,
        ],
        [
            'character' => 'npc_gart_le_forgeron',
            'item' => 'shield_steel',
            'class' => Shield::class,
        ],
        [
            'character' => 'npc_gart_le_forgeron',
            'item' => 'weapon_dagger',
            'class' => Weapon::class,
        ],
        [
            'character' => 'npc_gart_le_forgeron',
            'item' => 'weapon_shortsword',
            'class' => Weapon::class,
        ],
        [
            'character' => 'npc_gart_le_forgeron',
            'item' => 'weapon_longsword',
            'class' => Weapon::class,
        ],
        [
            'character' => 'npc_gart_le_forgeron',
            'item' => 'weapon_warax',
            'class' => Weapon::class,
        ],
        [
            'character' => 'npc_gart_le_forgeron',
            'item' => 'weapon_warhammer',
            'class' => Weapon::class,
        ],
        [
            'character' => 'npc_gart_le_forgeron',
            'item' => 'weapon_shortbow',
            'class' => Weapon::class,
        ],
        [
            'character' => 'npc_gart_le_forgeron',
            'item' => 'weapon_longbow',
            'class' => Weapon::class,
        ],
        [
            'character' => 'npc_gart_le_forgeron',
            'item' => 'ring_copper',
            'class' => Gift::class,
        ],
        [
            'character' => 'npc_gart_le_forgeron',
            'item' => 'ring_silver',
            'class' => Gift::class,
        ],
        [
            'character' => 'npc_gart_le_forgeron',
            'item' => 'ring_gold',
            'class' => Gift::class,
        ],
        [
            'character' => 'npc_gart_le_forgeron',
            'item' => 'map_plouc',
            'class' => Map::class,
        ],
    ];
}
