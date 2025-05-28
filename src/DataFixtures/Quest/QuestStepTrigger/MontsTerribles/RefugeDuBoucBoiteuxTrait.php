<?php

namespace App\DataFixtures\Quest\QuestStepTrigger\MontsTerribles;

trait RefugeDuBoucBoiteuxTrait
{
    const REFUGE_DU_BOUC_BOITEUX_QUEST_STEP_TRIGGERS = [
        // Quête : Le Gardien du Refuge
        [
            'type' => 'enter_location',
            'payload' => [
                'slug' => 'le-refuge',
            ],
            'conditions' => [
                'quest_not_started' => 'le-gardien-du-refuge',
            ],
            'questStep' => 'quest_secondary_le_gardien_du_refuge_step_1',
            'reference' => 'trigger_enter_location_refuge_du_bouc_boiteux_le_refuge',
        ],
    ];
}
