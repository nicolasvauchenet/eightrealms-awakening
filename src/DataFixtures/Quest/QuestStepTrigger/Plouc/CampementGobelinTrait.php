<?php

namespace App\DataFixtures\Quest\QuestStepTrigger\Plouc;

trait CampementGobelinTrait
{
    const CAMPEMENT_GOBELIN_QUEST_STEP_TRIGGERS = [
        // Dialogue : Chef Gobelin - Le Roi Galdric
        [
            'type' => 'dialog_step',
            'payload' => [
                'slug' => 'chef-gobelin-quete-indice',
            ],
            'questStep' => 'quest_main_step_4',
            'reference' => 'trigger_dialog_step_chef_gobelin_le_roi_galdric',
        ],
    ];
}
