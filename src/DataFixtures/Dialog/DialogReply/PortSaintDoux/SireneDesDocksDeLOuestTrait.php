<?php

namespace App\DataFixtures\Dialog\DialogReply\PortSaintDoux;

trait SireneDesDocksDeLOuestTrait
{
    const SIRENE_DES_DOCKS_DE_L_OUEST_DIALOG_REPLIES = [
        // Quête : La Sirène et le Marin
        [
            'text' => "Eryl s’est moqué de toi, il t’a trahie.",
            'dialogStep' => 'quest_step_sirene_des_docks_de_louest_3',
            'nextStep' => 'quest_step_sirene_des_docks_de_louest_4',
            'effects' => [
                'edit_quest_step_status' => [
                    'quest' => 'la-sirene-et-le-marin',
                    'quest_step' => 3,
                    'status' => 'completed',
                ],
            ],
            'reference' => 'quest_reply_sirene_2_1',
        ],
        [
            'text' => "Il t’aimait. Il a gardé ton médaillon jusqu’à la fin.",
            'dialogStep' => 'quest_step_sirene_des_docks_de_louest_3',
            'nextStep' => 'quest_step_sirene_des_docks_de_louest_5',
            'effects' => [
                'edit_quest_step_status' => [
                    'quest' => 'la-sirene-et-le-marin',
                    'quest_step' => 3,
                    'status' => 'completed',
                ],
            ],
            'reference' => 'quest_reply_sirene_2_2',
        ],
    ];
}
