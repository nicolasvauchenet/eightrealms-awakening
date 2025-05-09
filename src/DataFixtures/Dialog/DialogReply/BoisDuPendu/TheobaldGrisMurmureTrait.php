<?php

namespace App\DataFixtures\Dialog\DialogReply\BoisDuPendu;

trait TheobaldGrisMurmureTrait
{
    const THEOBALD_GRIS_MURMURE_DIALOG_REPLIES = [
        [
            'text' => "Je viens en ami. Vous vivez en ermite&nbsp;?",
            'dialogStep' => 'quest_step_theobald_gris_murmure_2',
            'nextStep' => 'quest_step_theobald_gris_murmure_3',
            'reference' => 'quest_reply_theobald_gris_murmure_2_1',
        ],
        [
            'text' => "Je vais aller voir ce Grand Druide",
            'dialogStep' => 'quest_step_theobald_gris_murmure_3',
            'nextStep' => 'quest_step_theobald_gris_murmure_4',
            'reference' => 'quest_reply_theobald_gris_murmure_3_1',
        ],
        [
            'text' => "Je ne vais pas vous déranger davantage",
            'dialogStep' => 'quest_step_theobald_gris_murmure_3',
            'nextStep' => 'quest_step_theobald_gris_murmure_6',
            'reference' => 'quest_reply_theobald_gris_murmure_3_2',
        ],
        [
            'text' => "Merci. Et bonne chance",
            'dialogStep' => 'quest_step_theobald_gris_murmure_4',
            'nextStep' => 'quest_step_theobald_gris_murmure_5',
            'reference' => 'quest_reply_theobald_gris_murmure_4_1',
        ],
    ];
}
