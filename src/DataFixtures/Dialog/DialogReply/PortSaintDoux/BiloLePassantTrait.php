<?php

namespace App\DataFixtures\Dialog\DialogReply\PortSaintDoux;

trait BiloLePassantTrait
{
    const BILO_LE_PASSANT_DIALOG_REPLIES = [
        // Quête : Des Rats sur les Docks
        [
            'text' => "Où se trouve le Vieux Port&nbsp;?",
            'dialogStep' => 'quest_secondary_bilo_le_passant_1',
            'nextStep' => 'quest_secondary_bilo_le_passant_2',
            'reference' => 'quest_secondary_bilo_le_passant_1_1',
        ],
        [
            'text' => "Je m'en occupe",
            'dialogStep' => 'quest_secondary_bilo_le_passant_2',
            'nextStep' => 'quest_secondary_bilo_le_passant_3',
            'reference' => 'quest_secondary_bilo_le_passant_2_1',
        ],
        [
            'text' => "Je ne suis pas un exterminateur",
            'dialogStep' => 'quest_secondary_bilo_le_passant_2',
            'nextStep' => 'quest_secondary_bilo_le_passant_4',
            'reference' => 'quest_secondary_bilo_le_passant_2_2',
        ],

        // Ragots : Arcanes de Port Saint-Doux
        [
            'text' => "Où habite cet arcaniste&nbsp;?",
            'dialogStep' => 'rumor_arcanes_bilo_le_passant_1',
            'nextStep' => 'rumor_arcanes_bilo_le_passant_2',
            'reference' => 'rumor_arcanes_bilo_le_passant_1_1',
        ],
    ];
}
