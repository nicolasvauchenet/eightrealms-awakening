<?php

namespace App\DataFixtures\Quest\QuestStepTrigger\BoisDuPendu;

trait CriqueDuPenduTrait
{
    const CRIQUE_DU_PENDU_QUEST_STEP_TRIGGERS = [
        // Combat : Gérome le Pendu
        [
            'type' => 'combat_victory',
            'payload' => [
                'slug' => 'gerome-le-pendu',
            ],
            'questStep' => 'quest_main_step_27',
            'reference' => 'trigger_combat_gerome_le_pendu',
        ],
    ];
}
