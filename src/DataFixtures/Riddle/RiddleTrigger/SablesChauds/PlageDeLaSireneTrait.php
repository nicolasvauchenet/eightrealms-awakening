<?php

namespace App\DataFixtures\Riddle\RiddleTrigger\SablesChauds;

trait PlageDeLaSireneTrait
{
    const PLAGE_DE_LA_SIRENE_RIDDLE_TRIGGERS = [
        [
            'type' => 'location_screen',
            'payload' => [
                'slug' => 'plage-de-la-sirene',
            ],
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'la-sirene-et-le-marin',
                    'quest_step' => 3,
                    'status' => 'progress',
                ],
            ],
            'riddle' => 'riddle_plage_de_la_sirene_fouiller',
            'reference' => 'riddle_trigger_plage_de_la_sirene_fouiller',
        ],
    ];
}
