<?php

namespace App\DataFixtures\Dialog\DialogReply\PortSaintDoux;

trait MyraLaVieilleTrait
{
    const MYRA_LA_VIEILLE_DIALOG_REPLIES = [
        [
            'text' => "Chante ta chanson, vieille femme",
            'dialogStep' => 'quest_step_myra_la_vieille_1',
            'nextStep' => 'quest_step_myra_la_vieille_2',
            'reference' => 'quest_reply_myra_la_vieille_1_1',
        ],
        [
            'text' => "Tais-toi, tu vas me porter malheur&nbsp;!",
            'dialogStep' => 'quest_step_myra_la_vieille_1',
            'nextStep' => 'quest_step_myra_la_vieille_3',
            'reference' => 'quest_reply_myra_la_vieille_1_2',
        ],
    ];
}
