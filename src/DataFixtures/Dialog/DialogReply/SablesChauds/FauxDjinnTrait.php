<?php

namespace App\DataFixtures\Dialog\DialogReply\SablesChauds;

trait FauxDjinnTrait
{
    const FAUX_DJINN_DIALOG_REPLIES = [
        // Quête secondaire : La Fiole Perdue
        [
            'text' => "C'est vous qui avez volé la fiole&nbsp;?",
            'dialogStep' => 'quest_secondary_faux_djinn_1',
            'nextStep' => 'quest_secondary_faux_djinn_2',
            'reference' => 'quest_secondary_faux_djinn_1_1',
        ],
        [
            'text' => "Rendez-moi la fiole&nbsp;!",
            'dialogStep' => 'quest_secondary_faux_djinn_2',
            'nextStep' => 'quest_secondary_faux_djinn_3',
            'reference' => 'quest_secondary_faux_djinn_2_1',
        ],
        [
            'text' => 'Heu… Tant mieux pour vous. Au revoir&nbsp;!',
            'dialogStep' => 'quest_secondary_faux_djinn_2',
            'nextStep' => 'quest_secondary_faux_djinn_4',
            'reference' => 'quest_secondary_faux_djinn_2_2',
        ],
    ];
}
