<?php

namespace App\DataFixtures\Reward\Misc;

use App\Entity\Item\Food;
use App\Entity\Item\Gift;

trait MiscTrait
{
    const MISC_REWARDS = [
        [
            'picture' => 'gift.png',
            'items' => [
                ['item' => 'food_bread', 'itemClass' => Food::class],
                ['item' => 'food_beer', 'itemClass' => Food::class],
                ['item' => 'gift_flowers', 'itemClass' => Gift::class],
            ],
            'reference' => 'reward_introduction',
        ],
    ];
}
