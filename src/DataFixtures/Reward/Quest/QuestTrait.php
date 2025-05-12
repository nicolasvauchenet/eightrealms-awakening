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

        // Quête secondaire : La Fiole Perdue
        [
            'crowns' => 200,
            'experience' => 200,
            'reference' => 'reward_quest_la_fiole_perdue',
        ],

        // Quête secondaire : Livraison en Cours
        [
            'crowns' => 200,
            'experience' => 200,
            'reference' => 'reward_quest_livraison_en_cours',
        ],
    ];
}
