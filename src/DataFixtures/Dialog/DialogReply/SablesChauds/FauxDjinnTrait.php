<?php

namespace App\DataFixtures\Dialog\DialogReply\SablesChauds;

trait FauxDjinnTrait
{
    const FAUX_DJINN_DIALOG_REPLIES = [
        [
            'text' => "C'est vous qui avez volé la fiole&nbsp;?",
            'dialogStep' => 'dialog_step_faux_djinn_1',
            'nextStep' => 'dialog_step_faux_djinn_2',
            'reference' => 'quest_reply_faux_djinn_1_1',
        ],
        [
            'text' => "Rendez-moi la fiole",
            'dialogStep' => 'dialog_step_faux_djinn_2',
            'nextStep' => 'dialog_step_faux_djinn_3',
            'reference' => 'quest_reply_faux_djinn_2_1',
        ],
        [
            'text' => "Je n’ai rien à faire ici",
            'dialogStep' => 'dialog_step_faux_djinn_2',
            'nextStep' => 'dialog_step_faux_djinn_4',
            'reference' => 'quest_reply_faux_djinn_2_2',
        ],
    ];
}
