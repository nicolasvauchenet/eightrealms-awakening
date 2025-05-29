<?php

namespace App\DataFixtures\Dialog\DialogReply\BoisDuPendu;

trait GrandDruideTrait
{
    const GRAND_DRUIDE_DIALOG_REPLIES = [
        // Quête : Les disparus du Donjon
        [
            'text' => "J'aimerais en savoir plus sur le rituel et sur la clé",
            'dialogStep' => 'quest_step_grand_druide_1',
            'nextStep' => 'quest_step_grand_druide_2',
            'reference' => 'quest_reply_grand_druide_1_1',
        ],
        [
            'text' => "Et les autres fragments? Où se trouvent-t-ils&nbsp;?",
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
            'text' => "Celui qui est enfermé&nbsp;? Qui est-ce&nbsp;?",
            'dialogStep' => 'quest_step_grand_druide_7',
            'nextStep' => 'quest_step_grand_druide_8',
            'reference' => 'quest_reply_grand_druide_7_1',
        ],

        // Quête : Le Gardien du Refuge
        [
            'text' => "Connaissez-vous un rituel de dépossession&nbsp;?",
            'dialogStep' => 'dialog_step_grand_druide_1',
            'nextStep' => 'dialog_step_grand_druide_2',
            'reference' => 'dialog_reply_grand_druide_1_1',
        ],
        [
            'text' => "(Raconter l'histoire de Tharôl)",
            'dialogStep' => 'dialog_step_grand_druide_2',
            'nextStep' => 'dialog_step_grand_druide_3',
            'reference' => 'dialog_reply_grand_druide_2_1',
        ],
        [
            'text' => "Où puis-je en apprendre plus&nbsp;?",
            'dialogStep' => 'dialog_step_grand_druide_3',
            'nextStep' => 'dialog_step_grand_druide_4',
            'reference' => 'dialog_reply_grand_druide_3_1',
        ],
        [
            'text' => "Tout ça ne m'aide pas vraiment…",
            'dialogStep' => 'dialog_step_grand_druide_3',
            'nextStep' => 'dialog_step_grand_druide_5',
            'reference' => 'dialog_reply_grand_druide_3_2',
        ],
    ];
}
