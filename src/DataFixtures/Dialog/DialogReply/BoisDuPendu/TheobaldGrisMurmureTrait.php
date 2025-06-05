<?php

namespace App\DataFixtures\Dialog\DialogReply\BoisDuPendu;

trait TheobaldGrisMurmureTrait
{
    const THEOBALD_GRIS_MURMURE_DIALOG_REPLIES = [
        // Quête secondaire : Bagarre Bizarre
        [
            'text' => "C'était vous, à la taverne&nbsp;?",
            'dialogStep' => 'quest_secondary_theobald_gris_murmure_2',
            'nextStep' => 'quest_secondary_theobald_gris_murmure_4',
            'reference' => 'quest_reply_theobald_gris_murmure_2_1',
        ],
        [
            'text' => "Je ne vous remercie pas pour votre aide…",
            'dialogStep' => 'quest_secondary_theobald_gris_murmure_2',
            'nextStep' => 'quest_secondary_theobald_gris_murmure_3',
            'reference' => 'quest_reply_theobald_gris_murmure_2_2',
        ],
        [
            'text' => "Je viens en ami. Vous vivez en ermite&nbsp;?",
            'dialogStep' => 'quest_secondary_theobald_gris_murmure_3',
            'nextStep' => 'quest_secondary_theobald_gris_murmure_5',
            'reference' => 'quest_reply_theobald_gris_murmure_3_1',
        ],
        [
            'text' => "Je viens en ami. Vous vivez en ermite&nbsp;?",
            'dialogStep' => 'quest_secondary_theobald_gris_murmure_4',
            'nextStep' => 'quest_secondary_theobald_gris_murmure_5',
            'reference' => 'quest_reply_theobald_gris_murmure_4_1',
        ],
        [
            'text' => "Je dois aller voir le Grand Druide",
            'dialogStep' => 'quest_secondary_theobald_gris_murmure_5',
            'nextStep' => 'quest_secondary_theobald_gris_murmure_6',
            'reference' => 'quest_reply_theobald_gris_murmure_5_1',
        ],
    ];
}
