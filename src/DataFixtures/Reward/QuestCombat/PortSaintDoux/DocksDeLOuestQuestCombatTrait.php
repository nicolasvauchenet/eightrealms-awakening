<?php

namespace App\DataFixtures\Reward\QuestCombat\PortSaintDoux;

use App\Entity\Item\Amulet;
use App\Entity\Item\Book;

trait DocksDeLOuestQuestCombatTrait
{
    const DOCKS_DE_L_OUEST_COMBAT_QUEST_REWARDS = [
        // La Sirène et le Marin
        [
            'experience' => 50,
            'reference' => 'reward_combat_port_saint_doux_la_sirene_des_docks',
        ],
        [
            'items' => [
                [
                    'item' => 'amulet_coeur_d_ecume',
                    'itemClass' => Amulet::class,
                    'quantity' => 1,
                    'questItem' => true,
                ],
                [
                    'item' => 'journal_d_eryl',
                    'itemClass' => Book::class,
                    'quantity' => 1,
                    'questItem' => true,
                ],
            ],
            'crowns' => 250,
            'experience' => 250,
            'reference' => 'reward_combat_plage_de_la_sirene_eryl_le_traitre',
        ],
    ];
}
