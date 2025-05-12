<?php

namespace App\DataFixtures\Reward\Quest;

trait SideQuestTrait
{
    const SIDE_QUEST_REWARDS = [
        // Des rats sur les docks
        [
            'crowns' => 10,
            'experience' => 50,
            'reference' => 'reward_quest_des_rats_sur_les_docks',
        ],

        // La Fiole Perdue
        [
            'crowns' => 200,
            'experience' => 100,
            'reference' => 'reward_quest_la_fiole_perdue',
        ],

        // Bagarre Bizarre
        [
            'crowns' => 0,
            'experience' => 100,
            'reference' => 'reward_quest_bagarre_bizarre',
        ],

        // Livraison en Cours
        [
            'crowns' => 400,
            'experience' => 200,
            'reference' => 'reward_quest_livraison_en_cours',
        ],

        // La Sirène et le Marin
        [
            'crowns' => 0,
            'experience' => 100,
            'reference' => 'reward_quest_la_sirene_et_le_marin',
        ],
    ];
}
