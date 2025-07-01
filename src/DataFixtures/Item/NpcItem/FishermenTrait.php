<?php

namespace App\DataFixtures\Item\NpcItem;

use App\Entity\Item\Food;

trait FishermenTrait
{
    const FISHERMEN_ITEMS = [
        [
            'character' => 'npc_pecheur_du_quartier_des_ploucs',
            'item' => 'food_fish',
            'class' => Food::class,
        ],
        [
            'character' => 'npc_gerard_le_pecheur',
            'item' => 'food_fish',
            'class' => Food::class,
        ],
    ];
}
