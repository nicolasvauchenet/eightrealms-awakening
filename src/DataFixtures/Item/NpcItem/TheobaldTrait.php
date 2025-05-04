<?php

namespace App\DataFixtures\Item\NpcItem;

use App\Entity\Item\Amulet;
use App\Entity\Item\Weapon;

trait TheobaldTrait
{
    const THEOBALD_ITEMS = [
        [
            'character' => 'npc_theobald_le_gris_murmure',
            'item' => 'weapon_fight_stick',
            'class' => Weapon::class,
            'equipped' => true,
            'slot' => 'righthand',
        ],
        [
            'character' => 'npc_theobald_le_gris_murmure',
            'item' => 'amulet_amulette_du_cercle',
            'class' => Amulet::class,
            'questItem' => true,
        ],
    ];
}
