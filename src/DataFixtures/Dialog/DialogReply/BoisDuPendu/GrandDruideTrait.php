<?php

namespace App\DataFixtures\Dialog\DialogReply\BoisDuPendu;

trait GrandDruideTrait
{
    const GRAND_DRUIDE_DIALOG_REPLIES = [
        // Quête principale : Les disparus du Donjon
        [
            'text' => "J'aimerais en savoir plus sur le Rituel de l'Âme",
            'dialogStep' => 'quest_main_grand_druide_1',
            'nextStep' => 'quest_main_grand_druide_2',
            'reference' => 'quest_main_grand_druide_1_1',
        ],
        [
            'text' => "Et les autres fragments? Où se trouvent-t-ils&nbsp;?",
            'dialogStep' => 'quest_main_grand_druide_3',
            'nextStep' => 'quest_main_grand_druide_4',
            'reference' => 'quest_main_grand_druide_3_1',
        ],
        [
            'text' => "Alors enseignez-moi le Rituel de l’Âme",
            'dialogStep' => 'quest_main_grand_druide_4',
            'nextStep' => 'quest_main_grand_druide_5',
            'reference' => 'quest_main_grand_druide_4_1',
        ],
        [
            'text' => "Pourtant vous l’avez enseigné à d’autres",
            'dialogStep' => 'quest_main_grand_druide_5',
            'nextStep' => 'quest_main_grand_druide_6',
            'reference' => 'quest_main_grand_druide_5_1',
        ],
    ];
}
