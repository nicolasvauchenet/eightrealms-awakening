<?php

namespace App\DataFixtures\Dialog\DialogReply\PortSaintDoux;

trait GartLeForgeronTrait
{
    const GART_LE_FORGERON_DIALOG_REPLIES = [
        // Quête secondaire : Livraison en Cours
        [
            'text' => "Vous semblez contrarié&nbsp;?",
            'dialogStep' => 'quest_gart_le_forgeron_1',
            'nextStep' => 'quest_gart_le_forgeron_2',
            'reference' => 'quest_gart_le_forgeron_1_1',
        ],
        [
            'text' => "Plouc&nbsp;? Où est-ce&nbsp;?",
            'dialogStep' => 'quest_gart_le_forgeron_2',
            'nextStep' => 'quest_gart_le_forgeron_3',
            'reference' => 'quest_gart_le_forgeron_2_1',
        ],
        [
            'text' => "Je vais lui apporter le bouclier",
            'dialogStep' => 'quest_gart_le_forgeron_3',
            'nextStep' => 'quest_gart_le_forgeron_4',
            'reference' => 'quest_gart_le_forgeron_3_1',
        ],
        [
            'text' => "Non, je ne vais pas par là",
            'dialogStep' => 'quest_gart_le_forgeron_3',
            'nextStep' => 'quest_gart_le_forgeron_5',
            'reference' => 'quest_gart_le_forgeron_3_2',
        ],
    ];
}
