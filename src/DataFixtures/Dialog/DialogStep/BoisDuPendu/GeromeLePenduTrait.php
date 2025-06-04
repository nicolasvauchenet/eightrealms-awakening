<?php

namespace App\DataFixtures\Dialog\DialogStep\BoisDuPendu;

trait GeromeLePenduTrait
{
    const GEROME_LE_PENDU_DIALOG_STEPS = [
        // Quête secondaire : Le Jugement du Cercle
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
            'dialog' => 'quest_secondary_gerome_le_pendu',
            'reference' => 'quest_secondary_gerome_le_pendu_1',
        ],
        [
            'name' => 'Gérome le Pendu - Énigme',
            'text' => "<p><em>Je m'appelais… Je m'appelle… Gérome, oui, Gérome. Jadis, j'ai été jugé. Et condamné. Pendu… Mais je ne sais plus… pourquoi. Ni qui j’étais.</em></p><p>Vous tremblez désormais de froid, mais vous tenez bon.</p><p><em>Les voix me parlent, parfois. Elles disent que j’ai trahi. D’autres disent que j’ai voulu trop apprendre. Peut-être les deux…</em></p><p>Il s'approche un peu plus de vous, et vous soutenez sa présence malgré votre envie de partir en courant.</p><p><em>Aide-moi. Dis-moi ce que j’ai fait. Dis-moi qui j’étais.</em></p>",
            'dialog' => 'quest_secondary_gerome_le_pendu',
            'reference' => 'quest_secondary_gerome_le_pendu_2',
        ],
        [
            'name' => 'Gérome le Pendu - Question 1',
            'text' => "<p><em>Le Cercle m’a banni. Mais pour quelle faute&nbsp;? Qu'ai-je voulu apprendre&nbsp;? Quel savoir ne devait jamais être partagé&nbsp;?</em></p>",
            'dialog' => 'quest_secondary_gerome_le_pendu',
            'reference' => 'quest_secondary_gerome_le_pendu_3',
        ],
        [
            'name' => 'Gérome le Pendu - Question 2',
            'text' => "<p><em>Ils m'ont jugé. Mais comment&nbsp;? Avec colère&nbsp;? Ont-ils eu pitié de moi&nbsp;? Ou étaient-ils sévères et froids&nbsp;?</em></p>",
            'dialog' => 'quest_secondary_gerome_le_pendu',
            'reference' => 'quest_secondary_gerome_le_pendu_4',
        ],
        [
            'name' => 'Gérome le Pendu - Question 3',
            'text' => "<p><em>Et que suis-je devenu, après tout ce temps, alors que la corde cédait&nbsp;?</em></p>",
            'dialog' => 'quest_secondary_gerome_le_pendu',
            'reference' => 'quest_secondary_gerome_le_pendu_5',
        ],
        [
            'name' => 'Gérome le Pendu - Question 4',
            'text' => "<p><em>Qui suis-je&nbsp;?</em></p>",
            'dialog' => 'quest_secondary_gerome_le_pendu',
            'reference' => 'quest_secondary_gerome_le_pendu_6',
        ],
        [
            'name' => 'Gérome le Pendu - Réussite',
            'text' => "<p><em>Oui… Je suis Gérome. Druide de l'Ancien Cercle. Gérôme, le Pendu. Et toi, tu sais. Tu as compris.</em></p><p>Il semble apaisé, et de moins en moins tangible.</p><p><em>Tu m'as rendu le souvenir, et je t'en remercie. Je suis libéré, grâce à tes réponses. Je peux partir… Tiens. Tu peux porter ce que j’ai porté, car tu le mérites, et je n'en aurai désormais plus besoin.</em></p><p>L'esprit de Gérome s'évanouit et l'air se réchauffe enfin. À sa place, se trouve un pendentif, posé à terre, comme s'il avait été là depuis le début…</p>",
            'effects' => [
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
                ],
                'reward_quest' => 'le-jugement-du-cercle',
                'end_quest_step' => [
                    'quest' => 'les-disparus-du-donjon',
                    'quest_step' => 27,
                    'status' => 'completed',
                ],
            ],
            'dialog' => 'quest_secondary_gerome_le_pendu',
            'reference' => 'quest_secondary_gerome_le_pendu_7',
        ],
        [
            'name' => 'Gérome le Pendu - Échec',
            'text' => "<p><em>Non&nbsp;! Ça ne peut pas être ça&nbsp;! Tu te moques de moi, tu te moques des âmes perdues, tout comme eux&nbsp;! Tu ne vaux pas mieux qu'eux&nbsp;!</em></p>",
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
            'dialog' => 'quest_secondary_gerome_le_pendu',
            'reference' => 'quest_secondary_gerome_le_pendu_8',
        ],
    ];
}
