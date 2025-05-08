<?php

namespace App\DataFixtures\Dialog\DialogReply\PortSaintDoux;

trait SophieLaMarchandeTrait
{
    const SOPHIE_LA_MARCHANDE_DIALOG_REPLIES = [
        [
            'text' => "Où se trouve le temple&nbsp;?",
            'conditions' => [
                'location_unknown' => 'vieille-ville',
            ],
            'dialogStep' => 'dialog_step_sophie_la_marchande_1',
            'nextStep' => 'dialog_step_sophie_la_marchande_2',
            'reference' => 'dialog_reply_sophie_la_marchande_1_1',
        ],
    ];
}
