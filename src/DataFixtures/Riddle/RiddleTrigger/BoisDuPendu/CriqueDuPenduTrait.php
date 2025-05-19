<?php

namespace App\DataFixtures\Riddle\RiddleTrigger\BoisDuPendu;

trait CriqueDuPenduTrait
{
    const CRIQUE_DU_PENDU_RIDDLE_TRIGGERS = [
        [
            'type' => 'location_screen',
            'payload' => [
                'slug' => 'crique-du-pendu',
            ],
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'le-jugement-du-cercle',
                    'quest_step' => 1,
                    'status' => 'progress',
                ],
            ],
            'riddle' => 'riddle_crique_du_pendu_fouiller',
            'reference' => 'riddle_trigger_crique_du_pendu_fouiller',
        ],
    ];
}
