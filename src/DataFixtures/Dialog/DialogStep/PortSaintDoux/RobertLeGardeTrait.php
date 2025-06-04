<?php

namespace App\DataFixtures\Dialog\DialogStep\PortSaintDoux;

trait RobertLeGardeTrait
{
    const ROBERT_LE_GARDE_DIALOG_STEPS = [
        // Quête secondaire : Bagarre bizarre
        [
            'name' => 'Robert - Quête',
            'text' => "<p><em>Il y a eu une &laquo;&nbsp;bagarre&nbsp;&raquo; à la taverne de la Flûte Moisie… J'enquêterais bien là-dessus, mais j'ai pas le temps. Je sais pas si vous avez entendu parler de ça. Mais si vous entendez quelque chose à ce sujet, sachez que je suis preneur.</em></p><p>Il vous jauge un instant, et continue d'un air solennel.</p><p><em>Cela dit, je vous conseille de pas trop traîner par là-bas à la nuit tombée… Cet endroit peut être dangereux. Vous feriez mieux de rester là où c'est sûr, le soir.</em></p>",
            'first' => true,
            'conditions' => [
                'quest_not_started' => 'bagarre-bizarre',
            ],
            'dialog' => 'quest_secondary_robert_le_garde',
            'reference' => 'quest_secondary_robert_le_garde_1',
        ],
        [
            'name' => "Robert - Docks de l'Ouest",
            'text' => "<p><em>Aux Docks de l'Ouest. C'est vers la mer. Ça s'appelle comme ça mais c'est au nord-est de la ville. Me demandez pas pourquoi, j'en sais rien. Chus point géographe. Chuis garde.</em></p>",
            'effects' => [
                'reveal_location' => 'docks-de-louest',
            ],
            'dialog' => 'quest_secondary_robert_le_garde',
            'reference' => 'quest_secondary_robert_le_garde_2',
        ],
        [
            'name' => 'Robert - Accepter la quête',
            'text' => "<p><em>Qu'on aille pas dire que je vous avais pas prévenu… En même temps c'est bien et ça m'arrange. Mais si vous trouvez quoi que ce soit, je veux que vous veniez m'en parler avant de faire n'importe quoi&nbsp;! On est bien d'accord&nbsp;?</em></p>",
            'effects' => [
                'start_quest' => 'bagarre-bizarre',
            ],
            'dialog' => 'quest_secondary_robert_le_garde',
            'reference' => 'quest_secondary_robert_le_garde_3',
        ],
        [
            'name' => 'Robert - Refuser la quête',
            'text' => "<p><em>C'est pas vos affaires, c'est vrai. Heureusement qu'y a encore des gardes dans c'te ville… Allez circulez&nbsp;! Et revenez me voir si vous entendez quelque chose.</em></p>",
            'dialog' => 'quest_secondary_robert_le_garde',
            'reference' => 'quest_secondary_robert_le_garde_4',
        ],
        [
            'name' => 'Robert - Quête en cours',
            'text' => "<p><em>Il vous a dit quoi le tavernier&nbsp;? Il s'est passé quoi à la taverne&nbsp;? Vous en savez plus sur cette bagarre&nbsp;? Allez, dites-moi&nbsp;! Faut quand même que je sache ce qui se passe dans ma ville…</em></p>",
            'first' => true,
            'conditions' => [
                'all' => [
                    [
                        'quest_status_not' => [
                            'quest' => 'bagarre-bizarre',
                            'status' => 'rewarded',
                        ],
                    ],
                    [
                        'none' => [
                            [
                                'quest_step_status' => [
                                    'quest' => 'bagarre-bizarre',
                                    'quest_step' => 6,
                                    'status' => 'progress',
                                ],
                            ],
                            [
                                'quest_step_status' => [
                                    'quest' => 'bagarre-bizarre',
                                    'quest_step' => 6,
                                    'status' => 'completed',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            'dialog' => 'quest_secondary_robert_le_garde',
            'reference' => 'quest_secondary_robert_le_garde_5',
        ],
        [
            'name' => 'Robert - Quête terminée',
            'text' => "<p><em>Bien joué l'ami. J'dois avouer que j'aurais pas misé un sou sur vous, l'autre fois. Mais vous avez réussi à régler cette affaire. J'vous félicite. Et j'vous remercie. J'vais pouvoir me sortir ça de la tête.</em></p>",
            'first' => true,
            'conditions' => [
                'all' => [
                    [
                        'quest_status_not' => [
                            'quest' => 'bagarre-bizarre',
                            'status' => 'rewarded',
                        ],
                    ],
                    [
                        'any' => [
                            [
                                'quest_step_status' => [
                                    'quest' => 'bagarre-bizarre',
                                    'quest_step' => 6,
                                    'status' => 'progress',
                                ],
                            ],
                            [
                                'quest_step_status' => [
                                    'quest' => 'bagarre-bizarre',
                                    'quest_step' => 6,
                                    'status' => 'completed',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            'effects' => [
                'edit_quest_step_status' => [
                    'quest' => 'bagarre-bizarre',
                    'quest_step' => 6,
                ],
                'reward_quest' => 'bagarre-bizarre',
            ],
            'dialog' => 'quest_secondary_robert_le_garde',
            'reference' => 'quest_secondary_robert_le_garde_6',
        ],

        // Dialogue normal
        [
            'name' => 'Robert - Dialogue',
            'text' => "<p><em>Attendez que je l'attrape ce sale petit voleur… Y perd rien pour attendre, et moi, chus patient&nbsp;!</em></p>",
            'first' => true,
            'conditions' => [
                'quest_status' => [
                    'quest' => 'bagarre-bizarre',
                    'status' => 'rewarded',
                ],
            ],
            'dialog' => 'dialog_robert_le_garde',
            'reference' => 'dialog_robert_le_garde_1',
        ],

        // Ragots
        [
            'name' => 'Robert - Ragots',
            'text' => "<p><em>Bon. Là en ce moment, chus occupé. Chuis en service au cas où z'auriez point remarqué. Alors salut.</em></p>",
            'first' => true,
            'dialog' => 'rumor_robert_le_garde',
            'reference' => 'rumor_robert_le_garde_1',
        ],
    ];
}
