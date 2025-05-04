<?php

namespace App\DataFixtures\Item\NpcItem;

use App\Entity\Item\MagicalWeapon;
use App\Entity\Item\Weapon;

trait DruidTrait
{
    const DRUID_ITEMS = [
        // Druide
        [
            'character' => 'npc_druide',
            'item' => 'weapon_fight_stick',
            'class' => Weapon::class,
            'equipped' => true,
            'slot' => 'righthand',
        ],

        // Grand Druide
        [
            'character' => 'npc_grand_druide',
            'item' => 'magical_stormstick',
            'class' => MagicalWeapon::class,
            'equipped' => true,
            'slot' => 'righthand',
        ],
    ];
}
