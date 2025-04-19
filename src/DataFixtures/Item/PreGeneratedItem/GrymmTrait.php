<?php

namespace App\DataFixtures\Item\PreGeneratedItem;

use App\Entity\Item\Armor;
use App\Entity\Item\MagicalWeapon;
use App\Entity\Item\Potion;
use App\Entity\Item\Ring;
use App\Entity\Item\Weapon;

trait GrymmTrait
{
    const GRYMM_ITEMS = [
        [
            'equipped' => true,
            'slot' => 'armor',
            'character' => 'character_grymm',
            'item' => 'armor_leather',
            'class' => Armor::class,
        ],
        [
            'equipped' => true,
            'slot' => 'righthand',
            'character' => 'character_grymm',
            'item' => 'weapon_gunstorm',
            'class' => Weapon::class,
        ],
        [
            'equipped' => true,
            'slot' => 'potion',
            'character' => 'character_grymm',
            'item' => 'potion_lighthealing',
            'class' => Potion::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_grymm',
            'item' => 'potion_lighthealing',
            'class' => Potion::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_grymm',
            'item' => 'potion_lighthealing',
            'class' => Potion::class,
        ],
        [
            'equipped' => true,
            'slot' => 'ring',
            'character' => 'character_grymm',
            'item' => 'ring_night_vision',
            'class' => Ring::class,
        ],
        [
            'equipped' => true,
            'slot' => 'lefthand',
            'character' => 'character_grymm',
            'item' => 'magical_firewand',
            'class' => MagicalWeapon::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_grymm',
            'item' => 'armor_iron',
            'class' => Armor::class,
        ],
    ];
}
