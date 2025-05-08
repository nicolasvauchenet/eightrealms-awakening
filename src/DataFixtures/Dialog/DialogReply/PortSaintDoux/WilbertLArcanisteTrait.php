<?php

namespace App\DataFixtures\Dialog\DialogReply\PortSaintDoux;

trait WilbertLArcanisteTrait
{
    const WILBERT_L_ARCANISTE_DIALOG_REPLIES = [
        [
            'text' => "Où se trouvent les Sables Chauds&nbsp;?",
            'conditions' => [
                'location_unknown' => 'sables-chauds',
            ],
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
                'has_item' => 'item_medaillon_des_vents',
                'quest_status' => [
                    'quest' => 'la-fiole-perdue',
                    'status' => 'completed',
                ],
            ],
            'dialogStep' => 'quest_step_wilbert_larcaniste_6',
            'nextStep' => 'quest_step_wilbert_larcaniste_7',
            'reference' => 'quest_reply_wilbert_larcaniste_6_1',
        ],
    ];
}
