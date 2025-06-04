<?php

namespace App\DataFixtures\Dialog\DialogReply\PortSaintDoux;

trait JarrodLeTavernierTrait
{
    const JARROD_LE_TAVERNIER_DIALOG_REPLIES = [
        // Quête secondaire : Bagarre bizarre
        [
            'text' => "Le Bois du Pendu&nbsp;?",
            'dialogStep' => 'quest_secondary_jarrod_le_tavernier_1',
            'nextStep' => 'quest_secondary_jarrod_le_tavernier_2',
            'reference' => 'quest_secondary_jarrod_le_tavernier_1_1',
        ],
        [
            'text' => "Je vais aller faire un tour là-bas",
            'dialogStep' => 'quest_secondary_jarrod_le_tavernier_2',
            'nextStep' => 'quest_secondary_jarrod_le_tavernier_3',
            'reference' => 'quest_secondary_jarrod_le_tavernier_2_1',
        ],
        [
            'text' => "Ah non&nbsp;! Je n'aime pas la forêt",
            'dialogStep' => 'quest_secondary_jarrod_le_tavernier_2',
            'nextStep' => 'quest_secondary_jarrod_le_tavernier_4',
            'reference' => 'quest_secondary_jarrod_le_tavernier_2_2',
        ],
    ];
}
