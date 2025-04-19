<?php

namespace App\DataFixtures\Item\PreGeneratedItem;

use App\Entity\Item\Armor;
use App\Entity\Item\MagicalWeapon;
use App\Entity\Item\Weapon;

trait TharashaTrait
{
    const THARASHA_ITEMS = [
        [
            'equipped' => true,
            'slot' => 'armor',
            'character' => 'character_tharasha',
            'item' => 'armor_iron',
            'class' => Armor::class,
        ],
        [
            'equipped' => true,
            'slot' => 'righthand',
            'character' => 'character_tharasha',
            'item' => 'weapon_warhammer',
            'class' => Weapon::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_tharasha',
            'item' => 'magical_firewand',
            'class' => MagicalWeapon::class,
        ],
    ];
}
