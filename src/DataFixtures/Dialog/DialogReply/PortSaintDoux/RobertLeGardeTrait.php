<?php

namespace App\DataFixtures\Dialog\DialogReply\PortSaintDoux;

trait RobertLeGardeTrait
{
    const ROBERT_LE_GARDE_DIALOG_REPLIES = [
        [
            'text' => "Où se trouve cette taverne&nbsp;?",
            'conditions' => [
                'location_unknown' => 'docks-de-louest',
            ],
            'dialogStep' => 'quest_step_robert_le_garde_1',
            'nextStep' => 'quest_step_robert_le_garde_2',
            'reference' => 'quest_reply_robert_le_garde_1_1',
        ],
        [
            'text' => "Je vais aller parler au tavernier",
            'dialogStep' => 'quest_step_robert_le_garde_2',
            'nextStep' => 'quest_step_robert_le_garde_3',
            'reference' => 'quest_reply_robert_le_garde_2_1',
        ],
        [
            'text' => "Ce ne sont pas mes affaires",
            'dialogStep' => 'quest_step_robert_le_garde_2',
            'nextStep' => 'quest_step_robert_le_garde_4',
            'reference' => 'quest_reply_robert_le_garde_2_2',
        ],
    ];
}
