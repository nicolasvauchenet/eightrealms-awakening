<?php

namespace App\DataFixtures\Quest\QuestStepTrigger\PortSaintDoux;

trait AnciensDocksTrait
{
    const ANCIENS_DOCKS_QUEST_STEP_TRIGGERS = [
        // Objet de quête : Lettre d'Alaric
        [
            'type' => 'add_item',
            'payload' => [
                'slug' => 'note-dalaric',
            ],
            'questStep' => 'quest_main_step_2',
            'reference' => 'trigger_add_item_lettre_d_alaric',
        ],
    ];
}
