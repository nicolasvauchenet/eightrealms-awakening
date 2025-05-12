<?php

namespace App\DataFixtures\Reward\QuestCombat\PortSaintDoux;

use App\Entity\Item\Book;
use App\Entity\Item\Food;

trait AnciensDocksQuestCombatTrait
{
    const ANCIENS_DOCKS_COMBAT_QUEST_REWARDS = [
        // Des Rats sur les Docks
        [
            'picture' => 'royal_box.png',
            'items' => [
                [
                    'item' => 'food_meat_rat',
                    'itemClass' => Food::class,
                    'quantity' => 3,
                ],
                [
                    'item' => 'note_d_alaric',
                    'itemClass' => Book::class,
                    'quantity' => 1,
                    'questItem' => true,
                ],
            ],
            'crowns' => 50,
            'experience' => 50,
            'reference' => 'reward_combat_port_saint_doux_des_rats_sur_les_docks',
        ],
    ];
}
