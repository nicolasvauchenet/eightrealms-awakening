<?php

namespace App\DataFixtures\Riddle\RiddleTrigger\PortSaintDoux;

trait DocksDeLOuestTrait
{
    const DOCKS_DE_L_OUEST_RIDDLE_TRIGGERS = [
        [
            'type' => 'location_screen',
            'payload' => [
                'slug' => 'docks-de-louest',
            ],
            'conditions' => [
                'all' => [
                    [
                        'quest_status' =>
                            [
                                'quest' => 'la-sirene-et-le-marin',
                                'status' => 'progress',
                            ],
                    ],
                    [
                        'quest_step_status_not' =>
                            [
                                'quest' => 'la-sirene-et-le-marin',
                                'quest_step' => 3,
                                'status' => 'progress',
                            ],
                    ],
                    [
                        'quest_step_status_not' =>
                            [
                                'quest' => 'la-sirene-et-le-marin',
                                'quest_step' => 5,
                                'status' => 'progress',
                            ],
                    ],
                    [
                        'quest_step_status_not' =>
                            [
                                'quest' => 'la-sirene-et-le-marin',
                                'quest_step' => 6,
                                'status' => 'progress',
                            ],
                    ],
                ],
            ],
            'riddle' => 'riddle_docks_de_louest_chanter',
            'reference' => 'riddle_trigger_docks_de_louest_chanter',
        ],
    ];
}
