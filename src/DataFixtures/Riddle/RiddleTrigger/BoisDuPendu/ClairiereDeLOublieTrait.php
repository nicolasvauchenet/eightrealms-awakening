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
                'quest_status' => [
                    'quest' => 'bagarre-bizarre',
                    'status' => 'progress',
                ],
            ],
            'riddle' => 'riddle_clairiere_de_loublie_fouiller',
            'reference' => 'riddle_trigger_clairiere_de_loublie_fouiller',
        ],
    ];
}
