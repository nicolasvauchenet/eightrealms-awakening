<?php

namespace App\DataFixtures\Item\PreGeneratedItem;

use App\Entity\Item\Armor;
use App\Entity\Item\MagicalWeapon;
use App\Entity\Item\Potion;
use App\Entity\Item\Ring;
use App\Entity\Item\Scroll;
use App\Entity\Item\Weapon;

trait LyraTrait
{
    const LYRA_ITEMS = [
        [
            'equipped' => true,
            'slot' => 'armor',
            'character' => 'character_lyra',
            'item' => 'armor_leather',
            'class' => Armor::class,
        ],
        [
            'equipped' => true,
            'slot' => 'righthand',
            'character' => 'character_lyra',
            'item' => 'weapon_dagger',
            'class' => Weapon::class,
        ],
        [
            'equipped' => true,
            'slot' => 'scroll',
            'character' => 'character_lyra',
            'item' => 'scroll_lockpick',
            'class' => Scroll::class,
        ],
        [
            'equipped' => true,
            'slot' => 'potion',
            'character' => 'character_lyra',
            'item' => 'potion_lighthealing',
            'class' => Potion::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_lyra',
            'item' => 'potion_lighthealing',
            'class' => Potion::class,
        ],
        [
            'equipped' => true,
            'slot' => 'ring',
            'character' => 'character_lyra',
            'item' => 'ring_health',
            'class' => Ring::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_lyra',
            'item' => 'armor_iron',
            'class' => Armor::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_lyra',
            'item' => 'magical_firewand',
            'class' => MagicalWeapon::class,
        ],
    ];
}
