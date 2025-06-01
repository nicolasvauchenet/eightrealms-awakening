<?php

namespace App\DataFixtures\Dialog\DialogReply\BoisDuPendu;

trait TheobaldGrisMurmureTrait
{
    const THEOBALD_GRIS_MURMURE_DIALOG_REPLIES = [
        [
            'text' => "C'était vous, à la taverne&nbsp;?",
            'dialogStep' => 'quest_step_theobald_gris_murmure_2',
            'nextStep' => 'quest_step_theobald_gris_murmure_4',
            'reference' => 'quest_reply_theobald_gris_murmure_2_1',
        ],
        [
            'text' => "Je ne vous remercie pas pour votre aide…",
            'dialogStep' => 'quest_step_theobald_gris_murmure_2',
            'nextStep' => 'quest_step_theobald_gris_murmure_3',
            'reference' => 'quest_reply_theobald_gris_murmure_2_2',
        ],
        [
            'text' => "Je viens en ami. Vous vivez en ermite&nbsp;?",
            'dialogStep' => 'quest_step_theobald_gris_murmure_3',
            'nextStep' => 'quest_step_theobald_gris_murmure_5',
            'reference' => 'quest_reply_theobald_gris_murmure_3_1',
        ],
        [
            'text' => "Je viens en ami. Vous vivez en ermite&nbsp;?",
            'dialogStep' => 'quest_step_theobald_gris_murmure_4',
            'nextStep' => 'quest_step_theobald_gris_murmure_5',
            'reference' => 'quest_reply_theobald_gris_murmure_4_1',
        ],
        [
            'text' => "Je vais aller voir ce Grand Druide",
            'dialogStep' => 'quest_step_theobald_gris_murmure_5',
            'nextStep' => 'quest_step_theobald_gris_murmure_6',
            'reference' => 'quest_reply_theobald_gris_murmure_5_1',
        ],
        [
            'text' => "Je ne vais pas vous déranger davantage",
            'dialogStep' => 'quest_step_theobald_gris_murmure_5',
            'nextStep' => 'quest_step_theobald_gris_murmure_8',
            'reference' => 'quest_reply_theobald_gris_murmure_5_2',
        ],
        [
            'text' => "Merci. Et bonne chance",
            'dialogStep' => 'quest_step_theobald_gris_murmure_6',
            'nextStep' => 'quest_step_theobald_gris_murmure_7',
            'reference' => 'quest_reply_theobald_gris_murmure_6_1',
        ],
    ];
}
