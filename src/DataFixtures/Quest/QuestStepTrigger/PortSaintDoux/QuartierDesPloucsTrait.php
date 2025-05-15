<?php

namespace App\DataFixtures\Quest\QuestStepTrigger\PortSaintDoux;

trait QuartierDesPloucsTrait
{
    const QUARTIER_DES_PLOUCS_QUEST_STEP_TRIGGERS = [
        // Dialogue : Wilbert L'Arcaniste - Médaillon des Vents
        [
            'type' => 'dialog_step',
            'payload' => [
                'slug' => 'wilbert-medaillon-des-vents',
            ],
            'questStep' => 'quest_main_step_5',
            'reference' => 'trigger_dialog_step_wilbert_larcaniste_medaillon_des_vents',
        ],
    ];
}
