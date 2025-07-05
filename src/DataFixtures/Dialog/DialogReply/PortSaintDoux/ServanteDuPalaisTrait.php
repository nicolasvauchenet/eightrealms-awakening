<?php

namespace App\DataFixtures\Dialog\DialogReply\PortSaintDoux;

trait ServanteDuPalaisTrait
{
    const SERVANTE_DU_PALAIS_DIALOG_REPLIES = [
        // Quête secondaire : Un Cadeau pour la Servante
        [
            'text' => "Bonjour. Désolé de vous déranger mais…",
            'dialogStep' => 'quest_secondary_servante_du_palais_1',
            'nextStep' => 'quest_secondary_servante_du_palais_2',
            'reference' => 'quest_secondary_servante_du_palais_1_1',
        ],
        [
            'text' => "Pourrais-je vous demander un service&nbsp;?",
            'dialogStep' => 'quest_secondary_servante_du_palais_2',
            'nextStep' => 'quest_secondary_servante_du_palais_3',
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'les-disparus-du-donjon',
                    'quest_step' => 11,
                    'status' => 'progress',
                ],
            ],
            'reference' => 'quest_secondary_servante_du_palais_2_1',
        ],
        [
            'text' => "Pardon. Je vous laisse",
            'dialogStep' => 'quest_secondary_servante_du_palais_2',
            'nextStep' => 'quest_secondary_servante_du_palais_4',
            'reference' => 'quest_secondary_servante_du_palais_2_2',
        ],
        [
            'text' => "Pourriez-vous détourner l’attention des gardes pour moi&nbsp;?",
            'dialogStep' => 'quest_secondary_servante_du_palais_3',
            'nextStep' => 'quest_secondary_servante_du_palais_5',
            'reference' => 'quest_secondary_servante_du_palais_3_1',
        ],
        [
            'text' => "Qu’est-ce qui ne va pas&nbsp;?",
            'dialogStep' => 'quest_secondary_servante_du_palais_5',
            'nextStep' => 'quest_secondary_servante_du_palais_6',
            'reference' => 'quest_secondary_servante_du_palais_5_1',
        ],
        [
            'text' => "Je suis désolé pour vous",
            'dialogStep' => 'quest_secondary_servante_du_palais_6',
            'nextStep' => 'quest_secondary_servante_du_palais_7',
            'reference' => 'quest_secondary_servante_du_palais_6_1',
        ],
    ];
}
