<?php

namespace App\DataFixtures\Item\PreGeneratedItem;

use App\Entity\Item\Armor;
use App\Entity\Item\MagicalWeapon;
use App\Entity\Item\Potion;
use App\Entity\Item\Ring;

trait IsileaTrait
{
    const ISILEA_ITEMS = [
        [
            'equipped' => true,
            'slot' => 'armor',
            'character' => 'character_isilea',
            'item' => 'armor_druid',
            'class' => Armor::class,
        ],
        [
            'equipped' => true,
            'slot' => 'righthand',
            'character' => 'character_isilea',
            'item' => 'magical_healstick',
            'class' => MagicalWeapon::class,
        ],
        [
            'equipped' => true,
            'slot' => 'potion',
            'character' => 'character_isilea',
            'item' => 'potion_lighthealing',
            'class' => Potion::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_isilea',
            'item' => 'potion_lighthealing',
            'class' => Potion::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_isilea',
            'item' => 'potion_lighthealing',
            'class' => Potion::class,
        ],
        [
            'equipped' => true,
            'slot' => 'ring',
            'character' => 'character_isilea',
            'item' => 'ring_mana',
            'class' => Ring::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_isilea',
            'item' => 'armor_iron',
            'class' => Armor::class,
        ],
    ];
}
