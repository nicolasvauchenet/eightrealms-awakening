<?php

namespace App\DataFixtures\Item\PreGeneratedItem;

use App\Entity\Item\Amulet;
use App\Entity\Item\Armor;
use App\Entity\Item\MagicalWeapon;
use App\Entity\Item\Potion;
use App\Entity\Item\Weapon;

trait EryndorTrait
{
    const ERYNDOR_ITEMS = [
        [
            'equipped' => true,
            'slot' => 'armor',
            'character' => 'character_eryndor',
            'item' => 'armor_leather',
            'class' => Armor::class,
        ],
        [
            'equipped' => true,
            'slot' => 'bow',
            'character' => 'character_eryndor',
            'item' => 'weapon_longbow_storm',
            'class' => Weapon::class,
        ],
        [
            'equipped' => true,
            'slot' => 'potion',
            'character' => 'character_eryndor',
            'item' => 'potion_lighthealing',
            'class' => Potion::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_eryndor',
            'item' => 'potion_lighthealing',
            'class' => Potion::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_eryndor',
            'item' => 'potion_lighthealing',
            'class' => Potion::class,
        ],
        [
            'equipped' => true,
            'slot' => 'amulet',
            'character' => 'character_eryndor',
            'item' => 'amulet_health',
            'class' => Amulet::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_eryndor',
            'item' => 'armor_iron',
            'class' => Armor::class,
        ],
        [
            'equipped' => false,
            'character' => 'character_eryndor',
            'item' => 'magical_firewand',
            'class' => MagicalWeapon::class,
        ],
    ];
}
