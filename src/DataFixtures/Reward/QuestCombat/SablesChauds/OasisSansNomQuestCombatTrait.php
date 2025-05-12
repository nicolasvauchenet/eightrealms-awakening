<?php

namespace App\DataFixtures\Reward\QuestCombat\SablesChauds;

use App\Entity\Item\Amulet;
use App\Entity\Item\Potion;

trait OasisSansNomQuestCombatTrait
{
    const OASIS_SANS_NOM_COMBAT_QUEST_REWARDS = [
        // La Fiole Perdue
        [
            'items' => [
                [
                    'item' => 'amulet_medaillon_des_vents',
                    'itemClass' => Amulet::class,
                    'quantity' => 1,
                    'questItem' => true,
                ],
                [
                    'item' => 'broken_vial',
                    'itemClass' => Potion::class,
                    'quantity' => 1,
                    'questItem' => true,
                ],
            ],
            'crowns' => 250,
            'experience' => 250,
            'reference' => 'reward_combat_oasis_sans_nom_faux_djinn',
        ],
    ];
}
