<?php

namespace App\DataFixtures\Reward\Combat;

use App\Entity\Item\Amulet;
use App\Entity\Item\Book;
use App\Entity\Item\Food;
use App\Entity\Item\Potion;

trait CombatQuestTrait
{
    const COMBAT_QUEST_REWARDS = [
        // Des Rats sur les Docks
        [
            'items' => [
                [
                    'item' => 'food_meat_rat',
                    'itemClass' => Food::class,
                    'quantity' => 3,
                ],
            ],
            'crowns' => 50,
            'experience' => 50,
            'reference' => 'reward_combat_port_saint_doux_des_rats_sur_les_docks',
        ],

        // La Sirène des Docks
        [
            'experience' => 50,
            'reference' => 'reward_combat_port_saint_doux_la_sirene_des_docks',
        ],

        // Les Druides du Bois du Pendu
        [
            'crowns' => 100,
            'experience' => 150,
            'reference' => 'reward_combat_bois_du_pendu_druides_de_la_clairiere',
        ],

        // Le Faux Djinn
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

        // Eryl le Traître
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
