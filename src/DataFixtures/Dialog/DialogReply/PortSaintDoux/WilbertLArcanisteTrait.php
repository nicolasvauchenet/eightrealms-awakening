<?php

namespace App\DataFixtures\Dialog\DialogReply\PortSaintDoux;

trait WilbertLArcanisteTrait
{
    const WILBERT_L_ARCANISTE_DIALOG_REPLIES = [
        // Quête principale : La note mystérieuse
        [
            'text' => "Sauriez-vous traduire cette note&nbsp;?",
            'dialogStep' => 'quest_main_wilbert_larcaniste_1',
            'nextStep' => 'quest_main_wilbert_larcaniste_2',
            'reference' => 'quest_main_wilbert_larcaniste_1_1',
        ],
        [
            'text' => "Et vous pourriez la traduire, sinon&nbsp;?",
            'dialogStep' => 'quest_main_wilbert_larcaniste_2',
            'nextStep' => 'quest_main_wilbert_larcaniste_3',
            'reference' => 'quest_main_wilbert_larcaniste_2_1',
        ],
        [
            'text' => "Rendez-moi ça, sale petit voleur&nbsp;!",
            'dialogStep' => 'quest_main_wilbert_larcaniste_2',
            'nextStep' => 'quest_main_wilbert_larcaniste_4',
            'reference' => 'quest_main_wilbert_larcaniste_2_2',
        ],
        [
            'text' => "… Et donc&nbsp;? Qu'est-ce que ça raconte&nbsp;?",
            'dialogStep' => 'quest_main_wilbert_larcaniste_3',
            'nextStep' => 'quest_main_wilbert_larcaniste_5',
            'reference' => 'quest_main_wilbert_larcaniste_3_1',
        ],
        [
            'text' => "Bref. Vous ne savez pas traduire ça",
            'dialogStep' => 'quest_main_wilbert_larcaniste_3',
            'nextStep' => 'quest_main_wilbert_larcaniste_4',
            'reference' => 'quest_main_wilbert_larcaniste_3_2',
        ],

        // Quête secondaire : La Fiole Perdue
        [
            'text' => "Où se trouvent les Sables Chauds&nbsp;?",
            'dialogStep' => 'quest_secondary_wilbert_larcaniste_1',
            'nextStep' => 'quest_secondary_wilbert_larcaniste_2',
            'reference' => 'quest_secondary_wilbert_larcaniste_1_1',
        ],
        [
            'text' => "J'ai toujours rêvé d'explorer un désert&nbsp;!",
            'dialogStep' => 'quest_secondary_wilbert_larcaniste_2',
            'nextStep' => 'quest_secondary_wilbert_larcaniste_3',
            'reference' => 'quest_secondary_wilbert_larcaniste_2_1',
        ],
        [
            'text' => "Un désert&nbsp;? Très peu pour moi",
            'dialogStep' => 'quest_secondary_wilbert_larcaniste_2',
            'nextStep' => 'quest_secondary_wilbert_larcaniste_4',
            'reference' => 'quest_secondary_wilbert_larcaniste_2_2',
        ],
        [
            'text' => "J'ai trouvé ce médaillon sur le faux Djinn",
            'conditions' => [
                'has_item' => 'medaillon-des-vents',
            ],
            'dialogStep' => 'quest_secondary_wilbert_larcaniste_6',
            'nextStep' => 'quest_secondary_wilbert_larcaniste_7',
            'reference' => 'quest_secondary_wilbert_larcaniste_6_1',
        ],

    ];
}
