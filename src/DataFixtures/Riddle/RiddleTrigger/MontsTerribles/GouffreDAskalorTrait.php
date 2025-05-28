<?php

namespace App\DataFixtures\Riddle\RiddleTrigger\MontsTerribles;

trait GouffreDAskalorTrait
{
    const GOUFFRE_D_ASKALOR_RIDDLE_TRIGGERS = [
        [
            'type' => 'location_screen',
            'payload' => [
                'slug' => 'gouffre-daskalor',
            ],
            'conditions' => [
                'has_not_item' => 'journal-de-tharol',
            ],
            'riddle' => 'riddle_gouffre_daskalor_fouiller',
            'reference' => 'riddle_trigger_gouffre_daskalor_fouiller',
        ],
    ];
}
