<?php

namespace App\DataFixtures\Dialog\DialogReply\PortSaintDoux;

trait WilbertLArcanisteTrait
{
    const WILBERT_L_ARCANISTE_DIALOG_REPLIES = [
        // Quête : La Fiole Perdue
        [
            'text' => "Où se trouvent les Sables Chauds&nbsp;?",
            'dialogStep' => 'quest_step_wilbert_larcaniste_1',
            'nextStep' => 'quest_step_wilbert_larcaniste_2',
            'reference' => 'quest_reply_wilbert_larcaniste_1_1',
        ],
        [
            'text' => "J'ai toujours rêvé d'explorer un désert&nbsp;!",
            'dialogStep' => 'quest_step_wilbert_larcaniste_2',
            'nextStep' => 'quest_step_wilbert_larcaniste_3',
            'reference' => 'quest_reply_wilbert_larcaniste_2_1',
        ],
        [
            'text' => "Un désert&nbsp;? Très peu pour moi",
            'dialogStep' => 'quest_step_wilbert_larcaniste_2',
            'nextStep' => 'quest_step_wilbert_larcaniste_4',
            'reference' => 'quest_reply_wilbert_larcaniste_2_2',
        ],
        [
            'text' => "J'ai trouvé ce médaillon sur le faux Djinn",
            'conditions' => [
                'has_item' => 'medaillon-des-vents',
            ],
            'dialogStep' => 'quest_step_wilbert_larcaniste_6',
            'nextStep' => 'quest_step_wilbert_larcaniste_7',
            'reference' => 'quest_reply_wilbert_larcaniste_6_1',
        ],

        // Quête principale : Le Médaillon des Vents
        [
            'text' => "Parlez-moi du &laquo;Sceau du Tombeau&raquo;",
            'conditions' => [
                'any' => [
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 4,
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 4,
                            'status' => 'completed',
                        ],
                    ],
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 9,
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 9,
                            'status' => 'completed',
                        ],
                    ],
                ],
            ],
            'dialogStep' => 'dialog_step_wilbert_larcaniste_medaillon_1',
            'nextStep' => 'dialog_step_wilbert_larcaniste_medaillon_2',
            'reference' => 'quest_reply_wilbert_larcaniste_medaillon_1_1',
        ],
        [
            'text' => "Vous n'en savez pas plus sur ce médaillon&nbsp;?",
            'conditions' => [
                'all' => [
                    [
                        'quest_step_status_not' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 4,
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'quest_step_status_not' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 4,
                            'status' => 'completed',
                        ],
                    ],
                    [
                        'quest_step_status_not' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 9,
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'quest_step_status_not' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 9,
                            'status' => 'completed',
                        ],
                    ],
                ],
            ],
            'dialogStep' => 'dialog_step_wilbert_larcaniste_medaillon_1',
            'nextStep' => 'dialog_step_wilbert_larcaniste_medaillon_4',
            'reference' => 'quest_reply_wilbert_larcaniste_medaillon_1_2',
        ],
        [
            'text' => "Le Sceau ouvre un tombeau dans le Donjon de l'Âme",
            'conditions' => [
                'any' => [
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 4,
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 4,
                            'status' => 'completed',
                        ],
                    ],
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 9,
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 9,
                            'status' => 'completed',
                        ],
                    ],
                ],
            ],
            'dialogStep' => 'dialog_step_wilbert_larcaniste_medaillon_2',
            'nextStep' => 'dialog_step_wilbert_larcaniste_medaillon_3',
            'reference' => 'quest_reply_wilbert_larcaniste_medaillon_2_1',
        ],
        [
            'text' => "Je n'en sais pas plus",
            'conditions' => [
                'all' => [
                    [
                        'quest_step_status_not' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 4,
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'quest_step_status_not' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 4,
                            'status' => 'completed',
                        ],
                    ],
                    [
                        'quest_step_status_not' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 9,
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'quest_step_status_not' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 9,
                            'status' => 'completed',
                        ],
                    ],
                ],
            ],
            'dialogStep' => 'dialog_step_wilbert_larcaniste_medaillon_2',
            'nextStep' => 'dialog_step_wilbert_larcaniste_medaillon_4',
            'reference' => 'quest_reply_wilbert_larcaniste_medaillon_2_2',
        ],
        [
            'text' => "Le Prince semble le vouloir…",
            'conditions' => [
                'any' => [
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 3,
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 3,
                            'status' => 'completed',
                        ],
                    ],
                ],
            ],
            'dialogStep' => 'dialog_step_wilbert_larcaniste_medaillon_3',
            'nextStep' => 'dialog_step_wilbert_larcaniste_medaillon_5',
            'reference' => 'quest_reply_wilbert_larcaniste_medaillon_3_1',
        ],
        [
            'text' => "Oui. Je dois aller là-bas",
            'conditions' => [
                'any' => [
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 3,
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 3,
                            'status' => 'completed',
                        ],
                    ],
                ],
            ],
            'dialogStep' => 'dialog_step_wilbert_larcaniste_medaillon_3',
            'nextStep' => 'dialog_step_wilbert_larcaniste_medaillon_4',
            'reference' => 'quest_reply_wilbert_larcaniste_medaillon_3_2',
        ],
        [
            'text' => "Non, je cherche juste à comprendre",
            'conditions' => [
                'all' => [
                    [
                        'quest_step_status_not' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 3,
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'quest_step_status_not' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 3,
                            'status' => 'completed',
                        ],
                    ],
                ],
            ],
            'dialogStep' => 'dialog_step_wilbert_larcaniste_medaillon_3',
            'nextStep' => 'dialog_step_wilbert_larcaniste_medaillon_4',
            'reference' => 'quest_reply_wilbert_larcaniste_medaillon_3_3',
        ],
        [
            'text' => "Le Roi semblait être au courant",
            'conditions' => [
                'any' => [
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 6,
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 6,
                            'status' => 'completed',
                        ],
                    ],
                ],
            ],
            'dialogStep' => 'dialog_step_wilbert_larcaniste_medaillon_5',
            'nextStep' => 'dialog_step_wilbert_larcaniste_medaillon_6',
            'reference' => 'quest_reply_wilbert_larcaniste_medaillon_5_1',
        ],
        [
            'text' => "Je n'y comprends rien…",
            'conditions' => [
                'all' => [
                    [
                        'quest_step_status_not' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 6,
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'quest_step_status_not' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 6,
                            'status' => 'completed',
                        ],
                    ],
                ],
            ],
            'dialogStep' => 'dialog_step_wilbert_larcaniste_medaillon_5',
            'nextStep' => 'dialog_step_wilbert_larcaniste_medaillon_4',
            'reference' => 'quest_reply_wilbert_larcaniste_medaillon_5_2',
        ],
        [
            'text' => "Je connais déjà le rituel",
            'conditions' => [
                'any' => [
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 11,
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 11,
                            'status' => 'completed',
                        ],
                    ],
                ],
            ],
            'dialogStep' => 'dialog_step_wilbert_larcaniste_medaillon_6',
            'nextStep' => 'dialog_step_wilbert_larcaniste_medaillon_7',
            'reference' => 'quest_reply_wilbert_larcaniste_medaillon_6_1',
        ],
        [
            'text' => "Bien. Je aller voir le Grand Druide",
            'conditions' => [
                'all' => [
                    [
                        'quest_step_status_not' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 11,
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'quest_step_status_not' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 11,
                            'status' => 'completed',
                        ],
                    ],
                ],
            ],
            'dialogStep' => 'dialog_step_wilbert_larcaniste_medaillon_6',
            'nextStep' => 'dialog_step_wilbert_larcaniste_medaillon_8',
            'reference' => 'quest_reply_wilbert_larcaniste_medaillon_6_2',
        ],
    ];
}
