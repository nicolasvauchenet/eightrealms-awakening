<?php

namespace App\DataFixtures\Dialog\DialogReply\PortSaintDoux;

trait SireneDesDocksDeLOuestTrait
{
    const SIRENE_DES_DOCKS_DE_L_OUEST_DIALOG_REPLIES = [
        // Quête secondaire : La Sirène et le Marin
        [
            'text' => "Eryl s’est moqué de toi. Il t’a trahie.",
            'dialogStep' => 'quest_secondary_sirene_des_docks_de_louest_3',
            'nextStep' => 'quest_secondary_sirene_des_docks_de_louest_4',
            'reference' => 'quest_secondary_sirene_des_docks_de_louest_3_1',
        ],
        [
            'text' => "Il t’aimait. Il a gardé ton médaillon jusqu’à la fin.",
            'dialogStep' => 'quest_secondary_sirene_des_docks_de_louest_3',
            'nextStep' => 'quest_secondary_sirene_des_docks_de_louest_5',
            'reference' => 'quest_secondary_sirene_des_docks_de_louest_3_2',
        ],
    ];
}
