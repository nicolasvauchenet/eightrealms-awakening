<?php

namespace App\DataFixtures\Dialog\DialogReply\PortSaintDoux;

trait BiloLePassantTrait
{
    const BILO_LE_PASSANT_DIALOG_REPLIES = [
        // Quête : Des Rats sur les Docks
        [
            'text' => "Où se trouve le Vieux Port&nbsp;?",
            'dialogStep' => 'quest_step_bilo_le_passant_1',
            'nextStep' => 'quest_step_bilo_le_passant_2',
            'reference' => 'quest_reply_bilo_le_passant_1_1',
        ],
        [
            'text' => "Je m'en occupe",
            'dialogStep' => 'quest_step_bilo_le_passant_2',
            'nextStep' => 'quest_step_bilo_le_passant_3',
            'reference' => 'quest_reply_bilo_le_passant_2_1',
        ],
        [
            'text' => "Je ne suis pas un exterminateur",
            'dialogStep' => 'quest_step_bilo_le_passant_2',
            'nextStep' => 'quest_step_bilo_le_passant_4',
            'reference' => 'quest_reply_bilo_le_passant_2_2',
        ],

        // Ragots
        [
            'text' => "Où habite cet arcaniste&nbsp;?",
            'dialogStep' => 'rumor_step_bilo_le_passant_1',
            'nextStep' => 'rumor_step_bilo_le_passant_2',
            'reference' => 'rumor_reply_bilo_le_passant_1_1',
        ],
    ];
}
