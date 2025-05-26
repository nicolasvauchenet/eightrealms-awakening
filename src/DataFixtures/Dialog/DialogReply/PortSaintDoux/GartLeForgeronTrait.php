<?php

namespace App\DataFixtures\Dialog\DialogReply\PortSaintDoux;

trait GartLeForgeronTrait
{
    const GART_LE_FORGERON_DIALOG_REPLIES = [
        // Quête : Livraison en Cours
        [
            'text' => "Vous semblez contrarié…",
            'dialogStep' => 'quest_step_gart_le_forgeron_1',
            'nextStep' => 'quest_step_gart_le_forgeron_2',
            'reference' => 'quest_reply_gart_le_forgeron_1_1',
        ],
        [
            'text' => "Plouc&nbsp;? Où est-ce&nbsp;?",
            'dialogStep' => 'quest_step_gart_le_forgeron_2',
            'nextStep' => 'quest_step_gart_le_forgeron_3',
            'reference' => 'quest_reply_gart_le_forgeron_2_1',
        ],
        [
            'text' => "Je vais lui apporter le bouclier",
            'dialogStep' => 'quest_step_gart_le_forgeron_3',
            'nextStep' => 'quest_step_gart_le_forgeron_4',
            'reference' => 'quest_reply_gart_le_forgeron_3_1',
        ],
        [
            'text' => "Non, je ne vais pas à Plouc",
            'dialogStep' => 'quest_step_gart_le_forgeron_3',
            'nextStep' => 'quest_step_gart_le_forgeron_5',
            'reference' => 'quest_reply_gart_le_forgeron_3_2',
        ],

        // Quête principale : Le Sceau du Tombeau
        [
            'text' => "Avez-vous reforgé le Sceau récemment&nbsp;?",
            'dialogStep' => 'dialog_step_gart_le_forgeron_sceau_1',
            'nextStep' => 'dialog_step_gart_le_forgeron_sceau_2',
            'reference' => 'quest_reply_gart_le_forgeron_sceau_1_1',
        ],
        [
            'text' => "Très drôle. Le Sceau du Tombeau…",
            'dialogStep' => 'dialog_step_gart_le_forgeron_sceau_2',
            'nextStep' => 'dialog_step_gart_le_forgeron_sceau_3',
            'reference' => 'quest_reply_gart_le_forgeron_sceau_2_1',
        ],
        [
            'text' => "Le Prince va faire une bêtise, et le Roi a essayé de l'en empêcher",
            'dialogStep' => 'dialog_step_gart_le_forgeron_sceau_3',
            'nextStep' => 'dialog_step_gart_le_forgeron_sceau_4',
            'reference' => 'quest_reply_gart_le_forgeron_sceau_3_1',
        ],
        [
            'text' => "J'ai le Médaillon des Vents",
            'dialogStep' => 'dialog_step_gart_le_forgeron_sceau_4',
            'nextStep' => 'dialog_step_gart_le_forgeron_sceau_5',
            'reference' => 'quest_reply_gart_le_forgeron_sceau_4_1',
        ],
        [
            'text' => "Je ne sais même pas ce que c'est",
            'dialogStep' => 'dialog_step_gart_le_forgeron_sceau_5',
            'nextStep' => 'dialog_step_gart_le_forgeron_sceau_6',
            'reference' => 'quest_reply_gart_le_forgeron_sceau_5_1',
        ],
    ];
}
