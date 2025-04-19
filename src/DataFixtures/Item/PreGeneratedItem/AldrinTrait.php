<?php

namespace App\DataFixtures\Item\PreGeneratedItem;

use App\Entity\Item\Amulet;
use App\Entity\Item\Armor;
use App\Entity\Item\Food;
use App\Entity\Item\MagicalWeapon;
use App\Entity\Item\Map;
use App\Entity\Item\Potion;
use App\Entity\Item\Ring;
use App\Entity\Item\Scroll;
use App\Entity\Item\Shield;
use App\Entity\Item\Weapon;

trait AldrinTrait
{
    const ALDRIN_ITEMS = [
        [
            'equipped' => true,
            'slot' => 'lefthand',
            'character' => 'character_aldrin',
            'item' => 'weapon_longsword',
            'class' => Weapon::class,
        ],
        [
            'equipped' => false,
            /*'slot' => 'armor',*/
            'character' => 'character_aldrin',
            'item' => 'armor_iron',
            'class' => Armor::class,
        ],
        [
            'equipped' => false,
            /*'slot' => 'shield',*/
            'character' => 'character_aldrin',
            'item' => 'shield_iron',
            'class' => Shield::class,
        ],
        [
            'equipped' => true,
            'slot' => 'potion',
            'character' => 'character_aldrin',
            'item' => 'potion_lighthealing',
            'class' => Potion::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_aldrin',
            'item' => 'potion_lighthealing',
            'class' => Potion::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_aldrin',
            'item' => 'potion_lighthealing',
            'class' => Potion::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_aldrin',
            'item' => 'food_meat',
            'class' => Food::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_aldrin',
            'item' => 'food_meat_gobelin',
            'class' => Food::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_aldrin',
            'item' => 'map_port_saint_doux',
            'class' => Map::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_aldrin',
            'item' => 'weapon_shortbow',
            'class' => Weapon::class,
        ],
        [
            'equipped' => true,
            'character' => 'character_aldrin',
            'item' => 'ring_knight',
            'slot' => 'ring',
            'class' => Ring::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_aldrin',
            'item' => 'ring_health',
            'class' => Ring::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_aldrin',
            'item' => 'ring_night_vision',
            'class' => Ring::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_aldrin',
            'item' => 'scroll_fireball',
            'class' => Scroll::class,
        ],
        [
            'equipped' => true,
            'slot' => 'scroll',
            'character' => 'character_aldrin',
            'item' => 'scroll_barrier',
            'class' => Scroll::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_aldrin',
            'item' => 'scroll_lockpick',
            'class' => Scroll::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_aldrin',
            'item' => 'potion_mana',
            'class' => Potion::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_aldrin',
            'item' => 'potion_invisibility',
            'class' => Potion::class,
        ],
        [
            'equipped' => true,
            'slot' => 'amulet',
            'character' => 'character_aldrin',
            'item' => 'amulet_protection',
            'class' => Amulet::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_aldrin',
            'item' => 'magical_firewand',
            'class' => MagicalWeapon::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_aldrin',
            'item' => 'map_royaume_de_lile_du_nord',
            'class' => Map::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_aldrin',
            'item' => 'map_royaume_de_lile_du_nord',
            'class' => Map::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_aldrin',
            'item' => 'map_royaume_de_lile_du_nord',
            'class' => Map::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_aldrin',
            'item' => 'map_plouc',
            'class' => Map::class,
        ],
        [
            'equipped' => true,
            'slot' => 'righthand',
            'character' => 'character_aldrin',
            'item' => 'weapon_longsword_storm',
            'class' => Weapon::class,
        ],
        [
            'equipped' => true,
            'slot' => 'armor',
            'character' => 'character_aldrin',
            'item' => 'armor_iron_health',
            'class' => Armor::class,
        ],
        [
            'equipped' => false,
            /*'slot' => 'shield',*/
            'character' => 'character_aldrin',
            'item' => 'shield_iron_defense',
            'class' => Shield::class,
        ],
    ];
}
