<?php

namespace App\DataFixtures\Riddle\RiddleTrigger\BoisDuPendu;

trait BosquetDesDruidesTrait
{
    const BOSQUET_DES_DRUIDES_RIDDLE_TRIGGERS = [
        [
            'type' => 'riddle_screen',
            'payload' => [
                'slug' => 'lepreuve-de-lesprit-du-cercle',
            ],
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'les-disparus-du-donjon',
                    'quest_step' => 7,
                    'status' => 'progress',
                ],
            ],
            'riddle' => 'riddle_bosquet_des_druides_test',
            'reference' => 'riddle_trigger_bosquet_des_druides_test',
        ],
    ];
}
