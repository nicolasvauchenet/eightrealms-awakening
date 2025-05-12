<?php

namespace App\DataFixtures\Reward\QuestCombat\Plouc;

use App\Entity\Item\Ring;

trait CampementGobelinQuestCombatTrait
{
    const CAMPEMENT_GOBELIN_COMBAT_QUEST_REWARDS = [
        // Livraison en Cours
        [
            'items' => [
                [
                    'item' => 'ring_invisibility',
                    'itemClass' => Ring::class,
                    'quantity' => 1,
                ],
            ],
            'crowns' => 20,
            'experience' => 150,
            'reference' => 'reward_combat_campement_gobelin_livraison_en_cours',
        ],
    ];
}
