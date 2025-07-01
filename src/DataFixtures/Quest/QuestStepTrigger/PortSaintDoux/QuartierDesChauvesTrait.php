<?php

namespace App\DataFixtures\Quest\QuestStepTrigger\PortSaintDoux;

trait QuartierDesChauvesTrait
{
    const QUARTIER_DES_CHAUVES_QUEST_STEP_TRIGGERS = [
        // Dialogue : Maire de Port Saint-Doux - Banquet Inaugural
        [
            'type' => 'dialog_step',
            'payload' => [
                'slug' => 'maire-de-port-saint-doux-banquet-inaugural',
            ],
            'questStep' => 'quest_main_step_11',
            'reference' => 'trigger_dialog_step_maire_de_port_saint_doux_banquet_inaugural',
        ],
    ];
}
