<?php

namespace App\DataFixtures\Dialog\DialogStep\PortSaintDoux;

trait RobertLeGardeTrait
{
    const ROBERT_LE_GARDE_DIALOG_STEPS = [
        [
            'text' => "<p><em>Bon. Là en ce moment, chus occupé. Chuis en service au cas où z'auriez point remarqué. Alors salut.</em></p>",
            'first' => true,
            'dialog' => 'dialog_robert_le_garde',
            'reference' => 'dialog_step_robert_le_garde_1',
        ],
        [
            'text' => "<p><em>Il y a eu une \"bagarre\" à la taverne de la Flûte Moisie… Je sais pas si vous avez entendu parler de ça… Mais je vous conseille de pas trop traîner par là-bas à la nuit tombée… Cet endroit peut être dangereux. Vous feriez mieux de rester là où c'est sûr.</em></p>",
            'first' => true,
            'conditions' => [
                'quest_not_started' => 'bagarre-bizarre',
            ],
            'dialog' => 'quest_robert_le_garde',
            'reference' => 'quest_step_robert_le_garde_1',
        ],
        [
            'text' => "<p><em>Aux Docks de l'Ouest. C'est vers la mer. Ça s'appelle comme ça mais c'est au nord-est de la ville. Me demandez pas pourquoi, j'en sais rien. Chus point géographiste. Chuis garde.</em></p>",
            'conditions' => [
                'quest_not_started' => 'bagarre-bizarre',
            ],
            'effects' => [
                'reveal_location' => 'docks-de-louest',
            ],
            'dialog' => 'quest_robert_le_garde',
            'reference' => 'quest_step_robert_le_garde_2',
        ],
        [
            'text' => "<p><em>Qu'on aille pas dire que je vous avais pas prévenu… En même temps c'est bien et ça m'arrange. Mais si vous trouvez quoi que ce soit, je veux que vous veniez m'en parler avant de faire n'importe quoi&nbsp;! On est bien d'accord&nbsp;?</em></p>",
            'conditions' => [
                'quest_not_started' => 'bagarre-bizarre',
            ],
            'effects' => [
                'start_quest' => 'bagarre-bizarre',
            ],
            'dialog' => 'quest_robert_le_garde',
            'reference' => 'quest_step_robert_le_garde_3',
        ],
        [
            'text' => "<p><em>Hé ben, c'est point vos affaires, c'est vrai. Heureusement qu'y a encore des gardes dans c'te ville… Allez circulez&nbsp;!</em></p>",
            'conditions' => [
                'quest_not_started' => 'bagarre-bizarre',
            ],
            'dialog' => 'quest_robert_le_garde',
            'reference' => 'quest_step_robert_le_garde_4',
        ],
        [
            'text' => "<p><em>Il vous a dit quoi le tavernier&nbsp;? Allez, dites-moi&nbsp;! Faut quand même que je sache ce qui se passe dans ma ville…</em></p>",
            'first' => true,
            'conditions' => [
                'quest_status' => [
                    'quest' => 'bagarre-bizarre',
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_robert_le_garde',
            'reference' => 'quest_step_robert_le_garde_5',
        ],
        [
            'text' => "<p><em>Bien joué. J'dois avouer que j'aurais pas misé un sou sur vous. Mais vous avez réussi. J'vous félicite. Et j'vous remercie. J'vais pouvoir me sortir ça de la tête.</em></p>",
            'first' => true,
            'conditions' => [
                'quest_status' => [
                    'quest' => 'bagarre-bizarre',
                    'status' => 'completed',
                ],
            ],
            'dialog' => 'quest_robert_le_garde',
            'reference' => 'quest_step_robert_le_garde_6',
        ],
        [
            'text' => "<p><em>Attendez que je l'attrape ce sale petit voleur… Y perd rien pour attendre, et moi, chus patient&nbsp;!</em></p>",
            'first' => true,
            'conditions' => [
                'quest_status' => [
                    'quest' => 'bagarre-bizarre',
                    'status' => 'rewarded',
                ],
            ],
            'dialog' => 'rumor_robert_le_garde',
            'reference' => 'rumor_step_robert_le_garde_1',
        ],
    ];
}
