<?php

namespace App\DataFixtures\Dialog\DialogReply\PortSaintDoux;

trait JarrodLeTavernierTrait
{
    const JARROD_LE_TAVERNIER_DIALOG_REPLIES = [
        [
            'text' => "Le Bois du Pendu&nbsp;?",
            'dialogStep' => 'quest_step_jarrod_le_tavernier_1',
            'nextStep' => 'quest_step_jarrod_le_tavernier_2',
            'reference' => 'quest_reply_jarrod_le_tavernier_1_1',
        ],
        [
            'text' => "Je vais aller faire un tour là-bas",
            'dialogStep' => 'quest_step_jarrod_le_tavernier_2',
            'nextStep' => 'quest_step_jarrod_le_tavernier_3',
            'reference' => 'quest_reply_jarrod_le_tavernier_2_1',
        ],
        [
            'text' => "Ah non&nbsp;! Je n'aime pas la forêt",
            'dialogStep' => 'quest_step_jarrod_le_tavernier_2',
            'nextStep' => 'quest_step_jarrod_le_tavernier_4',
            'reference' => 'quest_reply_jarrod_le_tavernier_2_2',
        ],
    ];
}
