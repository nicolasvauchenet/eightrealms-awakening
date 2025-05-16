<?php

namespace App\DataFixtures\Dialog\DialogReply\BoisDuPendu;

trait GrandDruideTrait
{
    const GRAND_DRUIDE_DIALOG_REPLIES = [
        [
            'text' => "J'aimerais en savoir plus sur le rituel et sur la clé",
            'dialogStep' => 'quest_step_grand_druide_1',
            'nextStep' => 'quest_step_grand_druide_2',
            'reference' => 'quest_reply_grand_druide_1_1',
        ],
        [
            'text' => "Et le second fragment du Sceau&nbsp;? Où se trouve-t-il&nbsp;?",
            'dialogStep' => 'quest_step_grand_druide_3',
            'nextStep' => 'quest_step_grand_druide_4',
            'reference' => 'quest_reply_grand_druide_3_1',
        ],
        [
            'text' => "Alors enseignez-moi le Rituel de l’Âme",
            'dialogStep' => 'quest_step_grand_druide_4',
            'nextStep' => 'quest_step_grand_druide_5',
            'reference' => 'quest_reply_grand_druide_4_1',
        ],
        [
            'text' => "Pourtant vous l’avez enseigné à d’autres",
            'dialogStep' => 'quest_step_grand_druide_5',
            'nextStep' => 'quest_step_grand_druide_6',
            'reference' => 'quest_reply_grand_druide_5_1',
        ],
        [
            'text' => "Qui est-ce&nbsp;?",
            'dialogStep' => 'quest_step_grand_druide_7',
            'nextStep' => 'quest_step_grand_druide_8',
            'reference' => 'quest_reply_grand_druide_7_1',
        ],
    ];
}
