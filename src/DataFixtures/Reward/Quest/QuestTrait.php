<?php

namespace App\DataFixtures\Reward\Quest;

trait QuestTrait
{
    const QUEST_REWARDS = [
        // Quête principale
        [
            'crowns' => 1000,
            'experience' => 1000,
            'reference' => 'reward_quest_main',
        ],

        // Quête secondaire : Des rats sur les docks
        [
            'crowns' => 100,
            'experience' => 100,
            'reference' => 'reward_quest_des_rats_sur_les_docks',
        ],
    ];
}
