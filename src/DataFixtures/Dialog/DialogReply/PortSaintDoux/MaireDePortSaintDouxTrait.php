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
        [
            'text' => "C'est d'accord, merci",
            'dialogStep' => 'dialog_rencontre_maire_de_port_saint_doux_4',
            'nextStep' => 'dialog_rencontre_maire_de_port_saint_doux_5',
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'les-disparus-du-donjon',
                    'quest_step' => 10,
                    'status' => 'progress',
                ],
            ],
            'reference' => 'dialog_rencontre_maire_de_port_saint_doux_4_1',
        ],
        [
            'text' => "J'ai à faire, peut-être plus tard",
            'dialogStep' => 'dialog_rencontre_maire_de_port_saint_doux_4',
            'nextStep' => 'dialog_rencontre_maire_de_port_saint_doux_6',
            'reference' => 'dialog_rencontre_maire_de_port_saint_doux_4_2',
        ],

        // Dialogue : Banquet Inaugural
        [
            'text' => "Merci. C’est… impressionnant",
            'dialogStep' => 'dialog_banquet_inaugural_maire_de_port_saint_doux_1',
            'nextStep' => 'dialog_banquet_inaugural_maire_de_port_saint_doux_2',
            'reference' => 'dialog_banquet_inaugural_maire_de_port_saint_doux_1_1',
        ],
        [
            'text' => "Ce médaillon… Il est particulier, non&nbsp;?",
            'dialogStep' => 'dialog_banquet_inaugural_maire_de_port_saint_doux_2',
            'nextStep' => 'dialog_banquet_inaugural_maire_de_port_saint_doux_3',
            'reference' => 'dialog_banquet_inaugural_maire_de_port_saint_doux_2_1',
        ],
        [
            'text' => "Il dégage de l'énergie… Est-il magique&nbsp;?",
            'dialogStep' => 'dialog_banquet_inaugural_maire_de_port_saint_doux_3',
            'nextStep' => 'dialog_banquet_inaugural_maire_de_port_saint_doux_4',
            'reference' => 'dialog_banquet_inaugural_maire_de_port_saint_doux_3_1',
        ],
        [
            'text' => "Je dois aller au Palais",
            'dialogStep' => 'dialog_banquet_inaugural_maire_de_port_saint_doux_4',
            'nextStep' => 'dialog_banquet_inaugural_maire_de_port_saint_doux_5',
            'reference' => 'dialog_banquet_inaugural_maire_de_port_saint_doux_4_1',
        ],
        [
            'text' => "C'est Robert qui m'y envoie",
            'dialogStep' => 'dialog_banquet_inaugural_maire_de_port_saint_doux_5',
            'nextStep' => 'dialog_banquet_inaugural_maire_de_port_saint_doux_6',
            'reference' => 'dialog_banquet_inaugural_maire_de_port_saint_doux_5_1',
        ],
        [
            'text' => "Merci, Monsieur le Maire",
            'dialogStep' => 'dialog_banquet_inaugural_maire_de_port_saint_doux_6',
            'nextStep' => 'dialog_banquet_inaugural_maire_de_port_saint_doux_7',
            'reference' => 'dialog_banquet_inaugural_maire_de_port_saint_doux_6_1',
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
