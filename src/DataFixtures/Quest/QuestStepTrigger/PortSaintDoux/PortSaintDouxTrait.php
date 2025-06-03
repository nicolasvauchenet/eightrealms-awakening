<?php

namespace App\DataFixtures\Quest\QuestStepTrigger\PortSaintDoux;

trait PortSaintDouxTrait
{
    const PORT_SAINT_DOUX_QUEST_STEP_TRIGGERS = [
        // Arrivée à Port Saint-Doux
        [
            'type' => 'enter_location',
            'payload' => [
                'slug' => 'port-saint-doux',
            ],
            'conditions' => [
                'quest_not_started' => 'les-disparus-du-donjon',
            ],
            'questStep' => 'quest_main_step_1',
            'reference' => 'trigger_enter_location_port_saint_doux',
        ],
    ];
}
