<?php

namespace App\DataFixtures\Item\PreGeneratedItem;

use App\Entity\Item\Amulet;
use App\Entity\Item\Armor;
use App\Entity\Item\MagicalWeapon;
use App\Entity\Item\Potion;
use App\Entity\Item\Scroll;
use App\Entity\Item\Weapon;

trait ElandraTrait
{
    const ELANDRA_ITEMS = [
        [
            'equipped' => true,
            'slot' => 'righthand',
            'character' => 'character_elandra',
            'item' => 'magical_firestick',
            'class' => MagicalWeapon::class,
        ],
        [
            'equipped' => true,
            'slot' => 'armor',
            'character' => 'character_elandra',
            'item' => 'armor_mage_apprentice',
            'class' => Armor::class,
        ],
        [
            'equipped' => true,
            'slot' => 'potion',
            'character' => 'character_elandra',
            'item' => 'potion_lightmana',
            'class' => Potion::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_elandra',
            'item' => 'potion_lightmana',
            'class' => Potion::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_elandra',
            'item' => 'potion_lightmana',
            'class' => Potion::class,
        ],
        [
            'equipped' => true,
            'slot' => 'amulet',
            'character' => 'character_elandra',
            'item' => 'amulet_mana',
            'class' => Amulet::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_elandra',
            'item' => 'armor_iron',
            'class' => Armor::class,
        ],
        [
            'equipped' => true,
            'slot' => 'lefthand',
            'character' => 'character_elandra',
            'item' => 'weapon_dagger',
            'class' => Weapon::class,
        ],
        [
            'equipped' => true,
            'slot' => 'scroll',
            'character' => 'character_elandra',
            'item' => 'scroll_heal',
            'class' => Scroll::class,
        ],
    ];
}
