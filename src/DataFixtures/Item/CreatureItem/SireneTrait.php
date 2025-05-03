<?php

namespace App\DataFixtures\Item\CreatureItem;

use App\Entity\Item\Armor;
use App\Entity\Item\Weapon;

trait SireneTrait
{
    const SIRENES_ITEMS = [
        // Sirène
        [
            'character' => 'creature_sirene',
            'item' => 'armor_scales',
            'equipped' => true,
            'slot' => 'armor',
            'class' => Armor::class,
        ],
        [
            'character' => 'creature_sirene',
            'item' => 'weapon_claws',
            'equipped' => true,
            'slot' => 'righthand',
            'class' => Weapon::class,
        ],
        [
            'character' => 'creature_sirene',
            'item' => 'weapon_lame_aquatique',
            'equipped' => true,
            'slot' => 'lefthand',
            'class' => Weapon::class,
        ],
    ];
}
