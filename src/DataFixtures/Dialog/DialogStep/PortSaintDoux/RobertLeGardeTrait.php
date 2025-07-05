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

        // Quête principale
        [
            'name' => "Robert - Demande d'explications",
            'text' => "<p>Robert vous regarde approcher. Il se tient droit, comme à son habitude, mais son regard est moins fermé que la dernière fois.</p><p><em>Je me doutais que vous finiriez par revenir… Vous avez cette lueur dans les yeux. Celle des gens qui posent trop de questions.</em></p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'les-disparus-du-donjon',
                    'quest_step' => 9,
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_main_robert_le_garde',
            'reference' => 'quest_main_robert_le_garde_1',
        ],
        [
            'name' => "Robert - Trop de poussière",
            'text' => "<p>Vous savez qu'avec Robert il faut être direct, alors vous lui racontez tout ce que vous savez, sans détour. Il vous écoute en regardant ses bottes, reste silencieux un long moment… Puis répond.</p><p><em>Ah ouais… Vous en remuez de la poussière, pour sûr.</em></p><p>Il vous observe un instant, puis détourne les yeux comme pour se protéger d’un souvenir trop vif.</p><p><em>Wilbert aurait dû se taire, pour une fois. Mais bon. Je suppose qu’il a ses raisons. Et vous comptez faire quoi maintenant&nbsp;?</em></p>",
            'dialog' => 'quest_main_robert_le_garde',
            'reference' => 'quest_main_robert_le_garde_2',
        ],
        [
            'name' => "Robert - Pas de politique",
            'text' => "<p>Un court moment de réflexion. Il secoue la tête.</p><p><em>Non. Vous ne ferez rien d'aussi stupide, encore moins avec juste vos deux mains, et votre bonne volonté. Laissez tomber. Vous feriez plus de mal que de bien, et Port Saint-Doux n'a vraiment pas besoin de plus de problèmes.</em></p>",
            'dialog' => 'quest_main_robert_le_garde',
            'reference' => 'quest_main_robert_le_garde_3',
        ],
        [
            'name' => "Robert - Le Roi a disparu",
            'text' => "<p><em>Galdric III n’est pas mort. Il est parti chercher son fils.</em></p><p>Il soupire, semble se décider à s'ouvrir un peu.</p><p><em>Il n’a rien dit à personne. Mais c’était clair pour ceux qui ont su lire entre les lignes. Cette histoire tourne autour du Donjon de l’Âme. Un vieux mythe. Une fable, disaient certains… Moi, je ne suis plus si sûr. J'y crois moi, à cette malédiction. Mais j'en sais rien.</em></p><p><em>Avant son départ, il passait ses journées enfermé dans ses appartements. À écrire. Toujours à écrire. Des notes, des cartes, des fragments de récits… Il notait tout, comme s’il cherchait à comprendre quelque chose d’ancien. Peut-être que ces papiers sont encore là. Peut-être pas. Mais si vous cherchez des réponses, c’est un bon début.</em></p>",
            'dialog' => 'quest_main_robert_le_garde',
            'reference' => 'quest_main_robert_le_garde_4',
        ],
        [
            'name' => "Robert - Le médaillon du Maire",
            'text' => "<p>Il crache au sol, comme pour ponctuer son mépris.</p><p><em>Ce bouffon&nbsp;! Il attend qu'une chose, c'est la fin du délai de prescription, qu'on annonce la mort du Roi et du Prince, et de prendre le pouvoir. Il parade, il se vante, avec son soi-disant bijou royal. Offert par Galdric II, paraît-il. Mon œil. Galdric II aurait jamais daigné adresser la parole à ce rat, encore moins lui offrir un bijou.</em></p>",
            'dialog' => 'quest_main_robert_le_garde',
            'reference' => 'quest_main_robert_le_garde_5',
        ],
        [
            'name' => "Robert - Dernier mot",
            'text' => "<p><em>Je vous ai dit ce que je savais. Ça vous suffira. Moi, je reste à ma place. Mais s’il faut agir un jour… alors je le ferai. Pour mon roi. Pas pour ce cirque. Allez au Palais si vous voulez, dites au Maire que c'est moi qui vous autorise à entrer. Il pourra rien dire. Et débrouillez-vous pour le reste.</em></p><p>Il se détourne. Le silence revient, chargé de doutes et de non-dits.</p>",
            'effects' => [
                'edit_quest_step_status' => [
                    'quest' => 'les-disparus-du-donjon',
                    'quest_step' => 9,
                    'status' => 'completed',
                ],
            ],
            'dialog' => 'quest_main_robert_le_garde',
            'reference' => 'quest_main_robert_le_garde_6',
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
