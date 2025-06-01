<?php

namespace App\DataFixtures\Dialog\DialogStep\MontsTerribles;

trait TharolLeSilencieuxTrait
{
    const THAROL_LE_SILENCIEUX_DIALOG_STEPS = [
        // Quête : Le Gardien du Refuge
        [
            'name' => 'Tharôl - Apparition silencieuse',
            'text' => "<p><em>J’espérais… ne plus jamais avoir à parler.</em></p><p>Il est là, assis près du feu. Immobile. Il vous regarde, mais ne dit rien d’autre. L’instant est figé.</p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'le-gardien-du-refuge',
                    'quest_step' => 4,
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_tharol_le_silencieux',
            'reference' => 'quest_tharol_step_1',
        ],
        [
            'name' => 'Tharôl - Il ne parle pas',
            'text' => "<p>Il détourne le regard. Ses doigts sont crispés sur une tasse vide. Il ne vous répond pas. Il ne vous chasse pas non plus.</p><p><em>Vous n’êtes pas d’ici. Et vous ne devriez pas rester.</em></p>",
            'dialog' => 'quest_tharol_le_silencieux',
            'reference' => 'quest_tharol_step_2',
        ],
        [
            'name' => 'Tharôl - Mention du bouquetin - refus',
            'text' => "<p><em>Le froid fait voir des choses. Le silence aussi.</em></p><p>Ses yeux semblent perdus dans le vague, mais ses paroles sont plus que directes.</p><p><em>Si vous voulez vivre, ne cherchez pas à comprendre ce qui se passe ici.</em></p><p>Il s'enveloppe dans son vieux manteau, et sort.</p>",
            'effects' => [
                'edit_quest_step_status' => [
                    'quest' => 'le-gardien-du-refuge',
                    'quest_step' => 4,
                    'status' => 'completed',
                ],
            ],
            'dialog' => 'quest_tharol_le_silencieux',
            'reference' => 'quest_tharol_step_3',
        ],
        [
            'name' => 'Tharôl - De retour',
            'text' => "<p>Il vous regarde sans parler. Il semble simplement accepter votre présence, même si vous le dérangez visiblement.</p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'le-gardien-du-refuge',
                    'quest_step' => 7,
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_tharol_le_silencieux',
            'reference' => 'quest_tharol_step_4',
        ],
        [
            'name' => 'Tharôl - Vague explication',
            'text' => "<p>Il se met debout, dos au feu. Il parle comme s’il répondait à quelqu’un d’autre.</p><p><em>La montagne a ses lois. Ici, on vit seul, ou on meurt vite. La créature que vous avez vue… elle rôde parfois. Moi aussi. Mais nous ne nous gênons pas.</em></p>",
            'dialog' => 'quest_tharol_le_silencieux',
            'reference' => 'quest_tharol_step_5',
        ],
        [
            'name' => 'Tharôl - Le mur',
            'text' => "<p>Il vous interrompt brusquement.</p><p><em>Assez. Ce que vous croyez avoir vu ne vous regarde pas.</em></p><p>Sa voix s’est durcie. Il n’a pas crié, mais il n’écoute plus.</p>",
            'dialog' => 'quest_tharol_le_silencieux',
            'reference' => 'quest_tharol_step_6',
        ],
        [
            'name' => 'Tharôl - Fin de non-recevoir',
            'text' => "<p>Il referme sa cape sur ses épaules, tourne le dos à la pièce.</p><p><em>Allez-vous-en. Ou restez. Mais ne cherchez pas à comprendre ce qui ne vous concerne pas.</em></p><p>Le ton est calme. Mais l’échange est clos.</p>",
            'dialog' => 'quest_tharol_le_silencieux',
            'reference' => 'quest_tharol_step_7',
        ],
        [
            'name' => 'Tharôl - Le silence se brise',
            'text' => "<p>Il s’assoit lentement. Il semble chercher ses mots. Ou les fuir.</p><p><em>Ce n’est pas une malédiction. Enfin, je ne crois pas. Peut-être, en fin de compte. Je suis lié à elle, et j'ai choisi mon sort. J’ai cessé de chercher à comprendre. Je vis. Seul, depuis très longtemps. Je la porte, elle creuse en moi, et je la sens. Plus je la sens, et plus… je change. Plus je m'éloigne. Plus j'oublie.</em></p><p>Il relève enfin les yeux vers vous.</p><p><em>Vous pensez peut-être pouvoir m’aider. Vous feriez mieux d’oublier que je suis là.</em></p>",
            'dialog' => 'quest_tharol_le_silencieux',
            'reference' => 'quest_tharol_step_8',
        ],
        [
            'name' => 'Tharôl - Il parle du passé',
            'text' => "<p><em>J’ai fait un serment. À un roi. À un ami. Je les ai oubliés, tous les deux. Mais le serment tient toujours. C’est lui qui me retient ici, je crois.</em></p><p>Il passe une main sur son front, confus.</p><p><em>Je devais disparaître. Être oublié. Et c'est de que j'ai fait. Mais cela fait si longtemps, j'ai tout oublié. J'ai tout perdu. Je ne suis plus l'un d'eux…</em></p>",
            'dialog' => 'quest_tharol_le_silencieux',
            'reference' => 'quest_tharol_step_9',
        ],
        [
            'name' => 'Tharôl - Fin du dialogue',
            'text' => "<p>Il soupire, le regard perdu dans les flammes.</p><p><em>Allez. Reprenez votre chemin. Le refuge est encore à l’abri. Moi non plus, je ne resterai pas longtemps. Mon temps arrive à son terme.</em></p><p>Il resserre sa cape autour de ses épaules, et sort lentement.</p>",
            'effects' => [
                'edit_quest_step_status' => [
                    'quest' => 'le-gardien-du-refuge',
                    'quest_step' => 7,
                    'status' => 'completed',
                ],
            ],
            'dialog' => 'quest_tharol_le_silencieux',
            'reference' => 'quest_tharol_step_10',
        ],
        // Break
        [
            'name' => 'Tharôl - Il vous regarde revenir',
            'text' => "<p>Il vous regarde passer la porte. Cette fois, il vous attendait.</p><p><em>Je vous ai entendu. Même d’ici. Vos pas dans la neige. Ils reviennent… avec autre chose.</em></p><p>Son ton est calme. Mais ses doigts tremblent.</p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'le-gardien-du-refuge',
                    'quest_step' => 7,
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'edit_quest_step_status' => [
                    'quest' => 'le-gardien-du-refuge',
                    'quest_step' => 7,
                    'status' => 'completed',
                ],
            ],
            'dialog' => 'quest_tharol_le_silencieux',
            'reference' => 'quest_tharol_step_11',
        ],
        [
            'name' => 'Tharôl - Le rituel',
            'text' => "<p><em>Un rituel…&nbsp;? Pour quoi faire&nbsp;? Briser ce que je suis devenu&nbsp;?</em></p><p>Il se lève lentement, presque furieux… puis retombe sur le banc.</p><p><em>Vous croyez vraiment qu’on revient en arrière&nbsp;? Vous croyez que j’en ai envie&nbsp;?</em></p>",
            'dialog' => 'quest_tharol_le_silencieux',
            'reference' => 'quest_tharol_step_12',
        ],
        [
            'name' => 'Tharôl - Résignation',
            'text' => "<p>Il ferme les yeux. Longtemps.</p><p><em>Très bien. Faites ce que vous avez à faire. Mais ne me demandez pas d’y croire.</em></p>",
            'dialog' => 'quest_tharol_le_silencieux',
            'reference' => 'quest_tharol_step_13',
        ],
        [
            'name' => 'Tharôl - Après le rituel',
            'text' => "<p>Il est toujours là. Assis. Silencieux. Mais quelque chose a changé. Il tient l’Épine dans sa paume, comme un objet dont il ne comprend plus le sens.</p><p><em>C’est terminé, n’est-ce pas&nbsp;?… Je ne l’entends plus. Je ne me sens plus tiré.</em></p>",
            'effects' => [
                'edit_quest_step_status' => [
                    'quest' => 'le-gardien-du-refuge',
                    'quest_step' => 8,
                    'status' => 'completed',
                ],
            ],
            'dialog' => 'quest_tharol_le_silencieux',
            'reference' => 'quest_tharol_step_14',
        ],
        [
            'name' => 'Tharôl - Réaction à la demande',
            'text' => "<p><em>L’Épine&nbsp;? Elle n’est plus à moi. Mais je ne peux pas vous la donner. Je ne peux pas la céder. Pas comme ça. Pas à vous. Je suis à elle∞</em></p>",
            'dialog' => 'quest_tharol_le_silencieux',
            'reference' => 'quest_tharol_step_15',
        ],
        [
            'name' => 'Tharôl - S’il cède',
            'text' => "<p>Il vous regarde longuement. Quelque chose passe dans ses yeux. Comme un souvenir qui revient brièvement.</p><p><em>Je ne sais plus pourquoi je l’ai gardée. Mais je crois… que je peux la laisser à présent. Tenez. Je vous la confie. Méfiez-vous d'elle.</em></p><p>Il tend l’Épine. Sa main ne tremble plus.</p>",
            'effects' => [
                'edit_quest_step_status' => [
                    'quest' => 'le-gardien-du-refuge',
                    'quest_step' => 8,
                    'status' => 'completed',
                ],
            ],
            'dialog' => 'quest_tharol_le_silencieux',
            'reference' => 'quest_tharol_step_16',
        ],
        [
            'name' => 'Tharôl - Si le joueur propose de prendre la malédiction',
            'text' => "<p>Il se redresse brusquement. Comme pris d’un vertige.</p><p><em>Vous… voulez la prendre&nbsp;?</em></p><p>Il hésite. Puis ferme les yeux.</p><p><em>Alors… qu’elle vous prenne. Moi, je n'ai plus rien à lui donner. Je suis vieux, et fatigué, et elle le sait.</em></p>",
            'effects' => [
                'edit_quest_step_status' => [
                    'quest' => 'le-gardien-du-refuge',
                    'quest_step' => 8,
                    'status' => 'completed',
                ],
            ],
            'dialog' => 'quest_tharol_le_silencieux',
            'reference' => 'quest_tharol_step_17',
        ],
        [
            'name' => 'Tharôl - Si le joueur menace ou attaque',
            'text' => "<p>Il serre l’Épine contre lui, sans bouger. Pas de peur. Juste un refus muet.</p><p><em>Faites ce que vous avez à faire. Mais ce n’est pas ainsi que cela devait se terminer.</em></p>",
            'effects' => [
                'edit_quest_step_status' => [
                    'quest' => 'le-gardien-du-refuge',
                    'quest_step' => 11,
                    'status' => 'completed',
                ],
            ],
            'dialog' => 'quest_tharol_le_silencieux',
            'reference' => 'quest_tharol_step_18',
        ],
        [
            'name' => 'Tharôl - Quelque chose va mal',
            'text' => "<p>À peine les derniers mots du rituel prononcés, Tharôl titube. Il porte les mains à sa poitrine, suffoquant.</p><p><em>Non… Non, ce n’est pas ça…</em></p><p>Ses yeux s’écarquillent. Son souffle devient rauque. Quelque chose s’arrache en lui. Quelque chose hurle.</p>",
            'dialog' => 'quest_tharol_le_silencieux',
            'reference' => 'quest_tharol_step_19',
        ],

        [
            'name' => 'Tharôl - Dernier éclat de conscience',
            'text' => "<p>Il vous regarde, un instant. Une lueur humaine traverse ses traits déformés.</p><p><em>Je suis… désolé. Dites à Galdric que j’ai tenu. Aussi longtemps que j’ai pu. Je n'ai pas rompu le serment.</em></p><p>Sa voix devient un cri. Un rugissement. Le corps de l’homme n’est plus. Le Bouquetin Féroce se dresse devant vous.</p>",
            'effects' => [
                'edit_quest_step_status' => [
                    'quest' => 'le-gardien-du-refuge',
                    'quest_step' => 9,
                    'status' => 'completed',
                ],
            ],
            'dialog' => 'quest_tharol_le_silencieux',
            'reference' => 'quest_tharol_step_20',
        ],
    ];
}
