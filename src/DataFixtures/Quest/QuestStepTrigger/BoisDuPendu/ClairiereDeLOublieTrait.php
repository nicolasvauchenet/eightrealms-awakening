<?php

namespace App\DataFixtures\Quest\QuestStepTrigger\BoisDuPendu;

trait ClairiereDeLOublieTrait
{
    const CLAIRIERE_DE_L_OUBLIE_QUEST_STEP_TRIGGERS = [
        // Dialogue : Théobald Gris-Murmure
        [
            'type' => 'dialog_step',
            'payload' => [
                'slug' => 'theobald-alaric',
            ],
            'questStep' => 'quest_main_step_5',
            'reference' => 'trigger_dialog_step_theobald_gris_murmure_alaric',
        ],
    ];
}
