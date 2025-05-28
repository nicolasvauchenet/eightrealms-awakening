<?php

namespace App\DataFixtures\Dialog\DialogReply\MontsTerribles;

trait TharolLeSilencieuxTrait
{
    const THAROL_LE_SILENCIEUX_DIALOG_REPLIES = [
        [
            'text' => "Vous êtes Tharôl, n’est-ce pas&nbsp;?",
            'dialogStep' => 'quest_tharol_step_1',
            'nextStep' => 'quest_tharol_step_2',
            'reference' => 'quest_reply_tharol_1_1',
        ],
        [
            'text' => "Je viens d'être attaqué par un gros bouquetin",
            'dialogStep' => 'quest_tharol_step_2',
            'nextStep' => 'quest_tharol_step_3',
            'reference' => 'quest_reply_tharol_2_1',
        ],
        [
            'text' => "Le bouquetin est revenu, il était pourtant mort hier",
            'dialogStep' => 'quest_tharol_step_4',
            'nextStep' => 'quest_tharol_step_5',
            'reference' => 'quest_reply_tharol_4_1',
        ],
        [
            'text' => "Vous êtes complice avec cette bête&nbsp;!",
            'dialogStep' => 'quest_tharol_step_5',
            'nextStep' => 'quest_tharol_step_6',
            'reference' => 'quest_reply_tharol_5_1',
        ],
        [
            'text' => "Vous êtes lié à cette bête, n'est-ce pas&nbsp;?",
            'dialogStep' => 'quest_tharol_step_5',
            'nextStep' => 'quest_tharol_step_7',
            'reference' => 'quest_reply_tharol_5_2',
        ],
        [
            'text' => "J'ai lu votre journal. L'Épine vous a possédé",
            'dialogStep' => 'quest_tharol_step_5',
            'nextStep' => 'quest_tharol_step_8',
            'conditions' => [
                'has_item' => 'journal-de-tharol',
            ],
            'reference' => 'quest_reply_tharol_5_3',
        ],
        [
            'text' => "De quoi vous souvenez-vous encore&nbsp;?",
            'dialogStep' => 'quest_tharol_step_8',
            'nextStep' => 'quest_tharol_step_9',
            'reference' => 'quest_reply_tharol_8_1',
        ],
        [
            'text' => "Je trouverai un moyen de vous aider",
            'dialogStep' => 'quest_tharol_step_9',
            'nextStep' => 'quest_tharol_step_10',
            'reference' => 'quest_reply_tharol_9_1',
        ],
    ];
}
