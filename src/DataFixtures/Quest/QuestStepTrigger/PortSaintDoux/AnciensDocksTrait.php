<?php

namespace App\DataFixtures\Quest\QuestStepTrigger\PortSaintDoux;

trait AnciensDocksTrait
{
    const ANCIENS_DOCKS_QUEST_STEP_TRIGGERS = [
        // Objet de quête : Note anonyme
        [
            'type' => 'add_item',
            'payload' => [
                'slug' => 'note-anonyme',
            ],
            'questStep' => 'quest_main_step_2',
            'reference' => 'trigger_add_item_note_anonyme',
        ],
    ];
}
