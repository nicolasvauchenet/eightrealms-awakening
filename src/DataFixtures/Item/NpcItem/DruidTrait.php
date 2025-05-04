<?php

namespace App\DataFixtures\Item\NpcItem;

use App\Entity\Item\MagicalWeapon;

trait DruidTrait
{
    const DRUID_ITEMS = [
        [
            'character' => 'npc_druide',
            'item' => 'magical_stormstick',
            'class' => MagicalWeapon::class,
            'equipped' => true,
            'slot' => 'righthand',
        ],
    ];
}
