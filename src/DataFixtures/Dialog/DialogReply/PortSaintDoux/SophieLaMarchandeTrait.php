<?php

namespace App\DataFixtures\Dialog\DialogReply\PortSaintDoux;

trait SophieLaMarchandeTrait
{
    const SOPHIE_LA_MARCHANDE_DIALOG_REPLIES = [
        // Ragots : Temple de Port Saint-Doux
        [
            'text' => "Où se trouve le temple&nbsp;?",
            'dialogStep' => 'rumor_temple_sophie_la_marchande_1',
            'nextStep' => 'rumor_temple_sophie_la_marchande_2',
            'reference' => 'rumor_temple_sophie_la_marchande_1_1',
        ],
    ];
}
