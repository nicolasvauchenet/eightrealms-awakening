<?php

namespace App\DataFixtures\Dialog\Dialog\BoisDuPendu;

use App\Entity\Character\Npc;

trait GrandDruideTrait
{
    const GRAND_DRUIDE_DIALOGS = [
        // Quête Principale
        [
            'type' => 'dialog',
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'les-disparus-du-donjon',
                    'quest_step' => 5,
                    'status' => 'progress',
                ],
            ],
            'character' => 'npc_grand_druide',
            'characterClass' => Npc::class,
            'reference' => 'quest_grand_druide',
        ],
    ];
}
