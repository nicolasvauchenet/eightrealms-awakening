<?php

namespace App\DataFixtures\Dialog\DialogReply\PortSaintDoux;

trait MaireDePortSaintDouxTrait
{
    const MAIRE_DE_PORT_SAINT_DOUX_DIALOG_REPLIES = [
        // Dialogue : Rencontre
        [
            'text' => "Je visite. Et j’observe.",
            'dialogStep' => 'dialog_rencontre_maire_de_port_saint_doux_1',
            'nextStep' => 'dialog_rencontre_maire_de_port_saint_doux_2',
            'reference' => 'dialog_rencontre_maire_de_port_saint_doux_1_1',
        ],
        [
            'text' => "C’est vous qui dirigez, donc&nbsp;?",
            'dialogStep' => 'dialog_rencontre_maire_de_port_saint_doux_2',
            'nextStep' => 'dialog_rencontre_maire_de_port_saint_doux_3',
            'reference' => 'dialog_rencontre_maire_de_port_saint_doux_2_1',
        ],
        [
            'text' => "Et si le Roi revenait&nbsp;?",
            'dialogStep' => 'dialog_rencontre_maire_de_port_saint_doux_3',
            'nextStep' => 'dialog_rencontre_maire_de_port_saint_doux_4',
            'reference' => 'dialog_rencontre_maire_de_port_saint_doux_3_1',
        ],

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
