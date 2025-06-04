<?php

namespace App\DataFixtures\Dialog\DialogReply\PortSaintDoux;

trait MaireDePortSaintDouxTrait
{
    const MAIRE_DE_PORT_SAINT_DOUX_DIALOG_REPLIES = [
        // Ragots : Quartier de la Nouvelle Ville
        [
            'text' => "Où se trouvera ce quartier&nbsp;?",
            'dialogStep' => 'rumor_nouvelle_ville_maire_de_port_saint_doux_1',
            'nextStep' => 'rumor_nouvelle_ville_maire_de_port_saint_doux_2',
            'reference' => 'rumor_nouvelle_ville_maire_de_port_saint_doux_1_1',
        ],
        [
            'text' => "Hé bien&nbsp;! Je vais aller visiter tout ça",
            'dialogStep' => 'rumor_nouvelle_ville_maire_de_port_saint_doux_2',
            'nextStep' => 'rumor_nouvelle_ville_maire_de_port_saint_doux_3',
            'reference' => 'rumor_nouvelle_ville_maire_de_port_saint_doux_2_1',
        ],
    ];
}
