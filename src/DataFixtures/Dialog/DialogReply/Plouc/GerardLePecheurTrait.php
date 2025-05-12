<?php

namespace App\DataFixtures\Dialog\DialogReply\Plouc;

trait GerardLePecheurTrait
{
    const GERARD_LE_PECHEUR_DIALOG_REPLIES = [
        // Quête
        [
            'text' => "Je vous apporte votre bouclier",
            'dialogStep' => 'quest_step_gerard_le_pecheur_1',
            'nextStep' => 'quest_step_gerard_le_pecheur_2',
            'reference' => 'quest_reply_gerard_le_pecheur_1_1',
        ],
        [
            'text' => "Vous partez en guerre&nbsp;?",
            'dialogStep' => 'quest_step_gerard_le_pecheur_2',
            'nextStep' => 'quest_step_gerard_le_pecheur_3',
            'reference' => 'quest_reply_gerard_le_pecheur_2_1',
        ],
        [
            'text' => "Je peux vous aider si vous voulez",
            'dialogStep' => 'quest_step_gerard_le_pecheur_3',
            'nextStep' => 'quest_step_gerard_le_pecheur_4',
            'reference' => 'quest_reply_gerard_le_pecheur_3_1',
        ],
        [
            'text' => "Hé bien bonne chance&nbsp;!",
            'dialogStep' => 'quest_step_gerard_le_pecheur_3',
            'nextStep' => 'quest_step_gerard_le_pecheur_5',
            'reference' => 'quest_reply_gerard_le_pecheur_3_2',
        ],
        [
            'text' => "Les gobelins voudraient négocier",
            'dialogStep' => 'quest_step_gerard_le_pecheur_7',
            'nextStep' => 'quest_step_gerard_le_pecheur_8',
            'reference' => 'quest_reply_gerard_le_pecheur_7_1',
        ],
        [
            'text' => "Ils ont faim. Ils veulent juste survivre",
            'dialogStep' => 'quest_step_gerard_le_pecheur_8',
            'nextStep' => 'quest_step_gerard_le_pecheur_9',
            'reference' => 'quest_reply_gerard_le_pecheur_8_1',
        ],
        [
            'text' => "Ils sont des dizaines. Le village brûlera, vous tous avec",
            'dialogStep' => 'quest_step_gerard_le_pecheur_9',
            'nextStep' => 'quest_step_gerard_le_pecheur_10',
            'reference' => 'quest_reply_gerard_le_pecheur_9_1',
        ],
        [
            'text' => "Tant pis. Je laisse tomber",
            'dialogStep' => 'quest_step_gerard_le_pecheur_9',
            'nextStep' => 'quest_step_gerard_le_pecheur_11',
            'reference' => 'quest_reply_gerard_le_pecheur_9_2',
        ],
    ];
}
