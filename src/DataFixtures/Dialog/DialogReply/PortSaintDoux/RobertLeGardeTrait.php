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
    ];
}
