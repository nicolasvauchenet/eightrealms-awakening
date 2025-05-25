<?php

namespace App\DataFixtures\Dialog\DialogReply\BoisDuPendu;

trait GeromeLePenduTrait
{
    const GEROME_LE_PENDU_DIALOG_REPLIES = [
        [
            'text' => "Qui êtes-vous&nbsp;?",
            'dialogStep' => 'quest_step_gerome_le_pendu_1',
            'nextStep' => 'quest_step_gerome_le_pendu_2',
            'reference' => 'quest_reply_gerome_le_pendu_1_1',
        ],
        [
            'text' => "Posez vos questions, je vous répondrai",
            'dialogStep' => 'quest_step_gerome_le_pendu_2',
            'nextStep' => 'quest_step_gerome_le_pendu_3',
            'reference' => 'quest_reply_gerome_le_pendu_2_1',
        ],
        [
            'text' => "Le secret du Tombeau",
            'dialogStep' => 'quest_step_gerome_le_pendu_3',
            'nextStep' => 'quest_step_gerome_le_pendu_8',
            'reference' => 'quest_reply_gerome_le_pendu_3_1',
        ],
        [
            'text' => "Le Rituel de l’Âme",
            'dialogStep' => 'quest_step_gerome_le_pendu_3',
            'nextStep' => 'quest_step_gerome_le_pendu_4',
            'reference' => 'quest_reply_gerome_le_pendu_3_2',
        ],
        [
            'text' => "L’emplacement du Donjon de l’Âme",
            'dialogStep' => 'quest_step_gerome_le_pendu_3',
            'nextStep' => 'quest_step_gerome_le_pendu_8',
            'reference' => 'quest_reply_gerome_le_pendu_3_3',
        ],
        [
            'text' => "Avec colère. Comme on juge les traîtres",
            'dialogStep' => 'quest_step_gerome_le_pendu_4',
            'nextStep' => 'quest_step_gerome_le_pendu_8',
            'reference' => 'quest_reply_gerome_le_pendu_4_1',
        ],
        [
            'text' => "Avec pitié. Comme un juste châtiment",
            'dialogStep' => 'quest_step_gerome_le_pendu_4',
            'nextStep' => 'quest_step_gerome_le_pendu_8',
            'reference' => 'quest_reply_gerome_le_pendu_4_2',
        ],
        [
            'text' => "Avec froideur. Comme une mécanique sacrée",
            'dialogStep' => 'quest_step_gerome_le_pendu_4',
            'nextStep' => 'quest_step_gerome_le_pendu_5',
            'reference' => 'quest_reply_gerome_le_pendu_4_3',
        ],
        [
            'text' => "Un souvenir, sans tombe. Une âme sans fin",
            'dialogStep' => 'quest_step_gerome_le_pendu_5',
            'nextStep' => 'quest_step_gerome_le_pendu_6',
            'reference' => 'quest_reply_gerome_le_pendu_5_1',
        ],
        [
            'text' => "Un spectre vengeur, empli de haine",
            'dialogStep' => 'quest_step_gerome_le_pendu_5',
            'nextStep' => 'quest_step_gerome_le_pendu_8',
            'reference' => 'quest_reply_gerome_le_pendu_5_2',
        ],
        [
            'text' => "Un avertissement pour les suivants",
            'dialogStep' => 'quest_step_gerome_le_pendu_5',
            'nextStep' => 'quest_step_gerome_le_pendu_8',
            'reference' => 'quest_reply_gerome_le_pendu_5_3',
        ],
        [
            'text' => "Vous êtes Gérome, l’Esprit de la Crique",
            'dialogStep' => 'quest_step_gerome_le_pendu_6',
            'nextStep' => 'quest_step_gerome_le_pendu_8',
            'reference' => 'quest_reply_gerome_le_pendu_6_1',
        ],
        [
            'text' => "Vous êtes Gérome, druide de l’Ancien Cercle",
            'dialogStep' => 'quest_step_gerome_le_pendu_6',
            'nextStep' => 'quest_step_gerome_le_pendu_7',
            'reference' => 'quest_reply_gerome_le_pendu_6_2',
        ],
        [
            'text' => "Vous êtes Gérome, le gardien oublié",
            'dialogStep' => 'quest_step_gerome_le_pendu_6',
            'nextStep' => 'quest_step_gerome_le_pendu_8',
            'reference' => 'quest_reply_gerome_le_pendu_6_3',
        ],
    ];
}
