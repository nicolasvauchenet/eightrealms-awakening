<?php

namespace App\DataFixtures\Dialog\DialogStep\PortSaintDoux;

trait SireneDesDocksDeLOuestTrait
{
    const SIRENE_DES_DOCKS_DE_L_OUEST_DIALOG_STEPS = [
        // Quête : La Sirène et le Marin
        [
            'name' => "Sirene des Docks de l'Ouest - Rencontre",
            'text' => "<p>Elle se met à chanter. Une mélodie douce au début, presque hypnotique. Puis le chant s'intensifie, et devient plus puissant, plus sombre. La mer s’agite autour d’elle, et des vagues de lumière dansent à la surface.</p><p>Elle vous fixe, son regard perçant comme une lame. Son visage a changé. Vous sentez un frisson parcourir votre échine.</p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'la-sirene-et-le-marin',
                    'quest_step' => 1,
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'edit_quest_step_status' => [
                    [
                        'quest' => 'la-sirene-et-le-marin',
                        'quest_step' => 1,
                        'status' => 'completed',
                    ],
                ],
            ],
            'redirectToCombat' => 'la-sirene-des-docks',
            'dialog' => 'quest_sirene_des_docks_de_louest',
            'reference' => 'quest_step_sirene_des_docks_de_louest_1',
        ],
        [
            'name' => "Sirene des Docks de l'Ouest - Quête",
            'text' => "<p>La Sirène, blessée, vous observe sans colère. Sa voix, lorsqu’elle s’élève, semble flotter au bord du silence.</p><p><em>Le serment fut brisé sous une lune sans reflet. Il a laissé derrière lui un éclat… un souvenir oublié sur une plage où le vent chante encore son nom.</em></p><p>Ses yeux se voilent un instant.</p><p><em>Va vers les dunes dorées. Là où les sables brûlent les pieds et les promesses. Cherche la plage des murmures. L’objet y attend… ou bien l’âme qui saura l’entendre.</em></p><p>Elle plonge alors sans un bruit, ne laissant derrière elle qu’un frisson sur les vagues.</p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'la-sirene-et-le-marin',
                    'quest_step' => 3,
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'reveal_location' => 'sables-chauds',
            ],
            'dialog' => 'quest_sirene_des_docks_de_louest',
            'reference' => 'quest_step_sirene_des_docks_de_louest_2',
        ],
        [
            'name' => "Sirene des Docks de l'Ouest - Combat terminé",
            'text' => "<p>La Sirène vous fixe longuement. Elle semble percevoir le poids de ce que vous avez découvert.</p><p><em>Alors&nbsp;? Dis-moi… qu’as-tu vu dans les sables&nbsp;? La vérité, ou un souvenir trop doux pour être vrai&nbsp;?</em></p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'la-sirene-et-le-marin',
                    'quest_step' => 4,
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_sirene_des_docks_de_louest',
            'reference' => 'quest_step_sirene_des_docks_de_louest_3',
        ],
        [
            'name' => "Sirene des Docks de l'Ouest - Quête terminée - Vérité",
            'text' => "<p>La Sirène observe le journal avec une intensité presque douloureuse. Chaque mot semble l’atteindre comme une lame. Lorsqu’elle lève les yeux vers vous, ses traits sont figés dans une tristesse muette.</p><p><em>Je l’aimais. Et il riait… Il s'est servi de mon précieux cadeau pour… pour décimer mon peuple.</em></p><p>Un long silence.</p><p><em>Merci. D’avoir chanté la vérité. Apporte mes regrets à Myra. Dis-lui qu’elle avait raison. J'en ai terminé avec les tiens.</em></p><p>Elle vous tend le médaillon sans un mot de plus, puis plonge lentement, disparaissant dans les profondeurs, l'air apaisé pour la première fois depuis longtemps.</p>",
            'effects' => [
                'remove_items' => [
                    'journal-deryl',
                    'coeur-decume',
                ],
                'add_items' => [
                    [
                        'item' => 'coeur-decume',
                        'questItem' => false,
                    ],
                ],
                'edit_quest_step_status' => [
                    [
                        'quest' => 'la-sirene-et-le-marin',
                        'quest_step' => 3,
                        'status' => 'completed',
                    ],
                    [
                        'quest' => 'la-sirene-et-le-marin',
                        'quest_step' => 4,
                        'status' => 'completed',
                    ],
                    [
                        'quest' => 'la-sirene-et-le-marin',
                        'quest_step' => 6,
                        'status' => 'skipped',
                    ],
                    [
                        'quest' => 'la-sirene-et-le-marin',
                        'quest_step' => 8,
                        'status' => 'skipped',
                    ],
                ],
            ],
            'dialog' => 'quest_sirene_des_docks_de_louest',
            'reference' => 'quest_step_sirene_des_docks_de_louest_4',
        ],
        [
            'name' => "Sirene des Docks de l'Ouest - Quête terminée - Mensonge",
            'text' => "<p>La Sirène fixe le médaillon que vous tendez. Sa main l’effleure, hésitante, puis elle le prend doucement contre elle.</p><p><em>Alors… il m’aimait encore…</em></p><p>Elle ferme les yeux, un sourire presque imperceptible aux lèvres.</p><p><em>C’est suffisant.</em></p><p>Elle vous tourne le dos, et disparaît dans les flots, ne laissant derrière elle qu’une brise salée.</p>",
            'effects' => [
                'remove_items' => [
                    'journal-deryl',
                    'coeur-decume',
                ],
                'edit_quest_step_status' => [
                    [
                        'quest' => 'la-sirene-et-le-marin',
                        'quest_step' => 3,
                        'status' => 'completed',
                    ],
                    [
                        'quest' => 'la-sirene-et-le-marin',
                        'quest_step' => 4,
                        'status' => 'completed',
                    ],
                    [
                        'quest' => 'la-sirene-et-le-marin',
                        'quest_step' => 5,
                        'status' => 'skipped',
                    ],
                    [
                        'quest' => 'la-sirene-et-le-marin',
                        'quest_step' => 7,
                        'status' => 'skipped',
                    ],
                ],
                'start_quest_step' => [
                    [
                        'quest' => 'la-sirene-et-le-marin',
                        'quest_step' => 6,
                        'status' => 'progress',
                    ],
                ],
            ],
            'dialog' => 'quest_sirene_des_docks_de_louest',
            'reference' => 'quest_step_sirene_des_docks_de_louest_5',
        ],
    ];
}
