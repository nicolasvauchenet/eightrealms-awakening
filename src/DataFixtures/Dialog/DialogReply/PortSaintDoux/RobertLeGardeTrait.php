<?php

namespace App\DataFixtures\Dialog\DialogReply\PortSaintDoux;

trait RobertLeGardeTrait
{
    const ROBERT_LE_GARDE_DIALOG_REPLIES = [
        // Quête secondaire : Bagarre bizarre
        [
            'text' => "Où se trouve cette taverne&nbsp;?",
            'dialogStep' => 'quest_secondary_robert_le_garde_1',
            'nextStep' => 'quest_secondary_robert_le_garde_2',
            'reference' => 'quest_secondary_robert_le_garde_1_1',
        ],
        [
            'text' => "Je vais aller parler au tavernier",
            'dialogStep' => 'quest_secondary_robert_le_garde_2',
            'nextStep' => 'quest_secondary_robert_le_garde_3',
            'reference' => 'quest_secondary_robert_le_garde_2_1',
        ],
        [
            'text' => "Ce ne sont pas mes affaires",
            'dialogStep' => 'quest_secondary_robert_le_garde_2',
            'nextStep' => 'quest_secondary_robert_le_garde_4',
            'reference' => 'quest_secondary_robert_le_garde_2_2',
        ],

        // Quête principale : Explication
        [
            'text' => "J'ai parlé à Wilbert et à Gart",
            'dialogStep' => 'quest_main_robert_le_garde_1',
            'nextStep' => 'quest_main_robert_le_garde_2',
            'reference' => 'quest_main_robert_le_garde_1_1',
        ],
        [
            'text' => "Retrouver le Roi et le Prince. Aidez-moi",
            'dialogStep' => 'quest_main_robert_le_garde_2',
            'nextStep' => 'quest_main_robert_le_garde_3',
            'reference' => 'quest_main_robert_le_garde_2_1',
        ],
        [
            'text' => "Et s'ils étaient morts&nbsp;?",
            'dialogStep' => 'quest_main_robert_le_garde_3',
            'nextStep' => 'quest_main_robert_le_garde_4',
            'reference' => 'quest_main_robert_le_garde_3_1',
        ],
        [
            'text' => "Le Maire interdit l'accès au Palais",
            'dialogStep' => 'quest_main_robert_le_garde_4',
            'nextStep' => 'quest_main_robert_le_garde_5',
            'reference' => 'quest_main_robert_le_garde_4_1',
        ],
        [
            'text' => "Vous ne croyez pas le Maire, donc",
            'dialogStep' => 'quest_main_robert_le_garde_5',
            'nextStep' => 'quest_main_robert_le_garde_6',
            'reference' => 'quest_main_robert_le_garde_5_1',
        ],
    ];
}
