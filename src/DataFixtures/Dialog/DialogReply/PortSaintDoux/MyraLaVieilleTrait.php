<?php

namespace App\DataFixtures\Dialog\DialogReply\PortSaintDoux;

trait MyraLaVieilleTrait
{
    const MYRA_LA_VIEILLE_DIALOG_REPLIES = [
        // Quête secondaire : La Sirène et le Marin
        [
            'text' => "Chante ta chanson, vieille femme",
            'dialogStep' => 'quest_secondary_myra_la_vieille_1',
            'nextStep' => 'quest_secondary_myra_la_vieille_2',
            'reference' => 'quest_secondary_myra_la_vieille_1_1',
        ],
        [
            'text' => "Tais-toi, tu vas me porter malheur&nbsp;!",
            'dialogStep' => 'quest_secondary_myra_la_vieille_1',
            'nextStep' => 'quest_secondary_myra_la_vieille_3',
            'reference' => 'quest_secondary_myra_la_vieille_1_2',
        ],
    ];
}
