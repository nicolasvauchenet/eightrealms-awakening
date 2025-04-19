<?php

namespace App\DataFixtures\Item\PreGeneratedItem;

use App\Entity\Item\Armor;
use App\Entity\Item\MagicalWeapon;
use App\Entity\Item\Weapon;

trait ThorinTrait
{
    const THORIN_ITEMS = [
        [
            'equipped' => true,
            'slot' => 'armor',
            'character' => 'character_thorin',
            'item' => 'armor_plates',
            'class' => Armor::class,
        ],
        [
            'equipped' => true,
            'slot' => 'righthand',
            'character' => 'character_thorin',
            'item' => 'weapon_warax',
            'class' => Weapon::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_thorin',
            'item' => 'magical_firewand',
            'class' => MagicalWeapon::class,
        ],
    ];
}
