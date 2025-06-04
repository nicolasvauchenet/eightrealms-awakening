<?php

namespace App\DataFixtures\Dialog\DialogReply\SablesChauds;

trait FaroukLeNomadeTrait
{
    const FAROUK_LE_NOMADE_DIALOG_REPLIES = [
        // Quête : La Fiole Perdue
        [
            'text' => "Avez-vous vu passer un homme étrange&nbsp;?",
            'dialogStep' => 'quest_secondary_farouk_le_nomade_1',
            'nextStep' => 'quest_secondary_farouk_le_nomade_2',
            'reference' => 'quest_reply_farouk_le_nomade_1_1',
        ],
        [
            'text' => "Où se trouve cette oasis&nbsp;?",
            'dialogStep' => 'quest_secondary_farouk_le_nomade_2',
            'nextStep' => 'quest_secondary_farouk_le_nomade_3',
            'reference' => 'quest_reply_farouk_le_nomade_2_1',
        ],
        [
            'text' => "Je vais m’y rendre",
            'dialogStep' => 'quest_secondary_farouk_le_nomade_3',
            'nextStep' => 'quest_secondary_farouk_le_nomade_4',
            'reference' => 'quest_reply_farouk_le_nomade_3_1',
        ],
        [
            'text' => "Je vais plutôt passer mon chemin",
            'dialogStep' => 'quest_secondary_farouk_le_nomade_3',
            'nextStep' => 'quest_secondary_farouk_le_nomade_5',
            'reference' => 'quest_reply_farouk_le_nomade_3_2',
        ],

        // Ragots : Crique du Pendu
        [
            'text' => "Je ne comprends pas…",
            'dialogStep' => 'rumor_crique_du_pendu_farouk_le_nomade_1',
            'nextStep' => 'rumor_crique_du_pendu_farouk_le_nomade_2',
            'reference' => 'rumor_crique_du_pendu_farouk_le_nomade_1_1',
        ],
    ];
}
