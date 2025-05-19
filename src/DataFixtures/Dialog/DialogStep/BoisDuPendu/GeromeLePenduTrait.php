<?php

namespace App\DataFixtures\Dialog\DialogStep\BoisDuPendu;

trait GeromeLePenduTrait
{
    const GEROME_LE_PENDU_DIALOG_STEPS = [
        [
            'name' => 'Gérome le Pendu - Rencontre',
            'text' => "<p><em>Une âme vivante… Voilà bien longtemps que je n'avais vu personne en ce lieu maudit…</em></p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'le-jugement-du-cercle',
                    'quest_step' => 1,
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'edit_quest_step_status' => [
                    [
                        'quest' => 'le-jugement-du-cercle',
                        'quest_step' => 1,
                        'status' => 'completed',
                    ],
                ],
            ],
            'dialog' => 'quest_gerome_le_pendu',
            'reference' => 'quest_step_gerome_le_pendu_1',
        ],
        [
            'name' => 'Gérome le Pendu - Énigme',
            'text' => "<p><em>Je m'appelle… Je m'appelais… Gérome, oui, Gérome. Jadis, j'ai été jugé. Mais je ne sais plus pourquoi. Ni qui j’étais.</em></p><p>Vous tremblez désormais de froid, mais vous tenez bon.</p><p><em>Les voix me parlent, parfois. Elles disent que j’ai trahi. D’autres disent que j’ai voulu trop apprendre. Peut-être les deux…</em></p><p>Il s'approche un peu plus de vous, et vous soutenez sa présence malgré votre envie de partir en courant.</p><p><em>Aide-moi. Dis-moi ce que j’ai fait. Dis-moi qui j’étais.</em></p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'le-jugement-du-cercle',
                    'quest_step' => 2,
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_gerome_le_pendu',
            'reference' => 'quest_step_gerome_le_pendu_2',
        ],
        [
            'name' => 'Gérome le Pendu - Question 1',
            'text' => "<p><em>Le Cercle m’a banni, mais pour quelle faute&nbsp;? Quel savoir ne devait jamais être partagé&nbsp;?</em></p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'le-jugement-du-cercle',
                    'quest_step' => 2,
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_gerome_le_pendu',
            'reference' => 'quest_step_gerome_le_pendu_3',
        ],
        [
            'name' => 'Gérome le Pendu - Question 2',
            'text' => "<p><em>Ont-ils jugé avec colère&nbsp;? Ou avec froideur&nbsp;?</em></p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'le-jugement-du-cercle',
                    'quest_step' => 2,
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_gerome_le_pendu',
            'reference' => 'quest_step_gerome_le_pendu_4',
        ],
        [
            'name' => 'Gérome le Pendu - Question 3',
            'text' => "<p><em>Et que suis-je devenu, alors que la corde cédait&nbsp;?</em></p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'le-jugement-du-cercle',
                    'quest_step' => 2,
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_gerome_le_pendu',
            'reference' => 'quest_step_gerome_le_pendu_5',
        ],
        [
            'name' => 'Gérome le Pendu - Question 4',
            'text' => "<p><em>Qui suis-je&nbsp;?</em></p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'le-jugement-du-cercle',
                    'quest_step' => 2,
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_gerome_le_pendu',
            'reference' => 'quest_step_gerome_le_pendu_6',
        ],
        [
            'name' => 'Gérome le Pendu - Réussite',
            'text' => "<p><em>Oui… Je suis Gérome. Le dernier. Le Pendu. Et toi, tu sais. Tu peux porter ce que j’ai porté.</em></p><p>L'esprit de Gérome s'évanouit et l'air se réchauffe enfin. À sa place, se trouve un pendentif, posé à terre, comme s'il avait été là depuis le début…</p>",
            'conditions' => [
                'quest_step_status' => [
                    [
                        'quest' => 'le-jugement-du-cercle',
                        'quest_step' => 2,
                        'status' => 'progress',
                    ],
                ],
            ],
            'effects' => [
                'add_items' => [
                    [
                        'item' => 'amulette-du-cercle',
                        'questItem' => true,
                    ],
                ],
                'edit_quest_step_status' => [
                    [
                        'quest' => 'le-jugement-du-cercle',
                        'quest_step' => 2,
                        'status' => 'completed',
                    ],
                    [
                        'quest' => 'le-jugement-du-cercle',
                        'quest_step' => 4,
                        'status' => 'skipped',
                    ],
                    [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 9,
                        'status' => 'completed',
                    ],
                ],
                'reward_quest' => 'le-jugement-du-cercle',
            ],
            'dialog' => 'quest_gerome_le_pendu',
            'reference' => 'quest_step_gerome_le_pendu_7',
        ],
        [
            'name' => 'Gérome le Pendu - Échec',
            'text' => "<p><em>Non&nbsp;! Ça ne peut pas être ça&nbsp;! Tu te moques de moi, tu te moques des âmes perdues, tout comme eux&nbsp;! Tu ne vaux pas mieux qu'eux&nbsp;!</em></p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'le-jugement-du-cercle',
                    'quest_step' => 2,
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'edit_quest_step_status' => [
                    [
                        'quest' => 'le-jugement-du-cercle',
                        'quest_step' => 2,
                        'status' => 'completed',
                    ],
                    [
                        'quest' => 'le-jugement-du-cercle',
                        'quest_step' => 3,
                        'status' => 'skipped',
                    ],
                ],
                'start_quest_step' => [
                    'quest' => 'le-jugement-du-cercle',
                    'quest_step' => 4,
                ],
            ],
            'dialog' => 'quest_gerome_le_pendu',
            'reference' => 'quest_step_gerome_le_pendu_8',
        ],
    ];
}
