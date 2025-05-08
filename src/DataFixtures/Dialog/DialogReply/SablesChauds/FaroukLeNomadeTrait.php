<?php

namespace App\DataFixtures\Dialog\DialogReply\SablesChauds;

trait FaroukLeNomadeTrait
{
    const FAROUK_LE_NOMADE_DIALOG_REPLIES = [
        [
            'text' => "Vous avez vu passer un homme étrange&nbsp;?",
            'dialogStep' => 'dialog_step_farouk_le_nomade_1',
            'nextStep' => 'dialog_step_farouk_le_nomade_2',
            'reference' => 'quest_reply_farouk_le_nomade_1_1',
        ],
        [
            'text' => "Où se trouve cette oasis&nbsp;?",
            'dialogStep' => 'dialog_step_farouk_le_nomade_2',
            'nextStep' => 'dialog_step_farouk_le_nomade_3',
            'reference' => 'quest_reply_farouk_le_nomade_2_1',
        ],
        [
            'text' => "Je vais m’y rendre",
            'dialogStep' => 'dialog_step_farouk_le_nomade_3',
            'nextStep' => 'dialog_step_farouk_le_nomade_4',
            'reference' => 'quest_reply_farouk_le_nomade_3_1',
        ],
        [
            'text' => "Je vais plutôt passer mon chemin",
            'dialogStep' => 'dialog_step_farouk_le_nomade_3',
            'nextStep' => 'dialog_step_farouk_le_nomade_5',
            'reference' => 'quest_reply_farouk_le_nomade_3_2',
        ],
    ];
}
