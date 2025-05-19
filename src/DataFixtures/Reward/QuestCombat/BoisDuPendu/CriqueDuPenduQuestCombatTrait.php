<?php

namespace App\DataFixtures\Reward\QuestCombat\BoisDuPendu;

use App\Entity\Item\Amulet;

trait CriqueDuPenduQuestCombatTrait
{
    const CRIQUE_DU_PENDU_COMBAT_QUEST_REWARDS = [
        // Le Jugement du Cercle
        [
            'items' => [
                [
                    'item' => 'amulet_amulette_du_cercle',
                    'itemClass' => Amulet::class,
                    'quantity' => 1,
                    'questItem' => true,
                ],
            ],
            'crowns' => 100,
            'experience' => 150,
            'reference' => 'reward_combat_bois_du_pendu_gerome',
        ],
    ];
}
