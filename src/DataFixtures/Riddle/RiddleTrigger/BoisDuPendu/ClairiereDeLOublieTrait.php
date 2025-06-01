<?php

namespace App\DataFixtures\Riddle\RiddleTrigger\BoisDuPendu;

trait ClairiereDeLOublieTrait
{
    const CLAIRIERE_DE_L_OUBLIE_RIDDLE_TRIGGERS = [
        [
            'type' => 'location_screen',
            'payload' => [
                'slug' => 'clairiere-de-loublie',
            ],
            'conditions' => [
                'any' => [
                    [
                        'quest_step_status' => [
                            'quest' => 'bagarre-bizarre',
                            'quest_step' => 2,
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'quest_step_status' => [
                            'quest' => 'bagarre-bizarre',
                            'quest_step' => 3,
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'quest_step_status' => [
                            'quest' => 'bagarre-bizarre',
                            'quest_step' => 4,
                            'status' => 'progress',
                        ],
                    ],
                ],
            ],
            'riddle' => 'riddle_clairiere_de_loublie_fouiller',
            'reference' => 'riddle_trigger_clairiere_de_loublie_fouiller',
        ],
    ];
}
