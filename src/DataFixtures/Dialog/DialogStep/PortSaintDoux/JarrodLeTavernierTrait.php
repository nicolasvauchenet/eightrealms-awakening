<?php

namespace App\DataFixtures\Dialog\DialogStep\PortSaintDoux;

trait JarrodLeTavernierTrait
{
    const JARROD_LE_TAVERNIER_DIALOG_STEPS = [
        // Quête secondaire : Bagarre bizarre
        [
            'name' => 'Jarrod - Quête',
            'text' => "<p><em>Ah oui, je m’en souviens de ce vieux… silencieux, poli, pas le genre à faire des vagues. Jusqu’à ce que trois idiots essayent de lui voler sa bourse. Il les a envoyés au sol en moins de temps qu’il m’en faut pour servir une pinte. Puis il s’est tourné vers moi, et il m’a regardé avec des yeux… bizarres. Il a dit&nbsp;:&nbsp;&laquo;&nbsp;Je dois retourner là où les pendus rêvent encore.&nbsp;&raquo; Et il est parti, comme ça. Moi j’crois qu’il parlait du Bois du Pendu. Un coin à éviter, si vous voulez mon avis…</em></p>",
            'first' => true,
            'conditions' => [
                'all' => [
                    [
                        'quest_started' => 'bagarre-bizarre',
                    ],
                    [
                        'quest_step_not_started' => [
                            'quest' => 'bagarre-bizarre',
                            'quest_step' => 2,
                        ],
                    ],
                ],
            ],
            'dialog' => 'quest_jarrod_le_tavernier',
            'reference' => 'quest_jarrod_le_tavernier_1',
        ],
        [
            'name' => 'Jarrod - Bois du Pendu',
            'text' => "<p><em>Le Bois du Pendu, oui. Un endroit maudit. On dit qu’on y entend les branches craquer même quand il n’y a pas de vent. Et que certains arbres saignent quand on les touche… Mais bon, j’dis ça, j’y ai jamais mis les pieds. Si vous y allez, faites gaffe à vous. Et évitez de répondre si quelqu’un vous appelle par votre nom.</em></p>",
            'effects' => [
                'reveal_location' => 'bois-du-pendu',
            ],
            'dialog' => 'quest_jarrod_le_tavernier',
            'reference' => 'quest_jarrod_le_tavernier_2',
        ],
        [
            'name' => 'Jarrod - Accepter la quête',
            'text' => "<p><em>Vous êtes courageux, ou alors inconscient… mais j’aime ça. Si vous trouvez ce vieux fou, peut-être qu’il vous dira pourquoi il s’est battu comme un diable l'autre soir. Et si vous ne le trouvez pas… eh bien, j’aurai toujours une bière pour vous à votre retour.</em></p>",
            'effects' => [
                'edit_quest_step_status' => [
                    'quest' => 'bagarre-bizarre',
                    'quest_step' => 1,
                    'status' => 'completed',
                ],
                'start_quest_step' => [
                    'quest' => 'bagarre-bizarre',
                    'quest_step' => 2,
                ],
                // Increase reputation with Jarrod
            ],
            'dialog' => 'quest_jarrod_le_tavernier',
            'reference' => 'quest_jarrod_le_tavernier_3',
        ],
        [
            'name' => 'Jarrod - Refuser la quête',
            'text' => "<p><em>Vous savez quoi&nbsp;? Vous avez bien raison. Trop de gens curieux finissent par nourrir les racines de ce bois. Et moi, je préfère servir des vivants que leur rendre hommage.</em></p>",
            'dialog' => 'quest_jarrod_le_tavernier',
            'reference' => 'quest_jarrod_le_tavernier_4',
        ],
        [
            'name' => 'Jarrod - Quête en cours',
            'text' => "<p><em>J'ai pas revu le vieux passer. Il a dû s'perdre dans l'bois… Une bière&nbsp;?</em></p>",
            'first' => true,
            'conditions' => [
                'all' => [
                    [
                        'quest_status' => [
                            'quest' => 'bagarre-bizarre',
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'quest_step_status' => [
                            'quest' => 'bagarre-bizarre',
                            'quest_step' => 2,
                            'status' => 'progress',
                        ],
                    ],
                ],
            ],
            'dialog' => 'quest_jarrod_le_tavernier',
            'reference' => 'quest_jarrod_le_tavernier_5',
        ],
        [
            'name' => 'Jarrod - Quête terminée',
            'text' => "<p><em>Tiens donc, vous voilà… Alors, vous l’avez retrouvé, votre vieux, dans le Bois du Pendu&nbsp;? Pas trop de branches qui grincent dans vos cauchemars, j’espère&nbsp;? Ha&nbsp;! Allez, prenez une bière, c’est moi qui régale. Vous l’avez méritée.</em></p>",
            'first' => true,
            'conditions' => [
                'all' => [
                    [
                        'quest_status' => [
                            'quest' => 'bagarre-bizarre',
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'quest_step_status' => [
                            'quest' => 'bagarre-bizarre',
                            'quest_step' => 2,
                            'status' => 'completed',
                        ],
                    ],
                ],
            ],
            'effects' => [
                'add_items' => [
                    [
                        'item' => 'food_beer',
                        'questItem' => false,
                    ],
                ],
            ],
            'dialog' => 'quest_jarrod_le_tavernier',
            'reference' => 'quest_jarrod_le_tavernier_6',
        ],

        // Dialogue normal
        [
            'name' => 'Jarrod - Dialogue',
            'text' => "<p><em>Vous saviez qu’un gars du Vieux Port a essayé de dresser un crabe pour en faire un messager&nbsp;? Il lui accrochait des petits parchemins sur la carapace et le laissait courir. Résultat&nbsp;:&nbsp;le crabe a livré une déclaration d’amour à un tonneau de hareng. C’est beau, la magie… quand on sait pas s’en servir.</em></p>",
            'first' => true,
            'conditions' => [
                'any' => [
                    [
                        'quest_not_started' => 'bagarre-bizarre',
                    ],
                    [
                        'quest_status' =>
                            [
                                'quest' => 'bagarre-bizarre',
                                'status' => 'rewarded',
                            ],
                    ],
                ],
            ],
            'dialog' => 'dialog_jarrod_le_tavernier',
            'reference' => 'dialog_jarrod_le_tavernier_1',
        ],

        // Ragots
        [
            'name' => 'Jarrod - Ragots',
            'text' => "<p><em>Vous savez qui me fait le plus peur ici&nbsp;? Pas le Donjon. Pas les brigands. Non. C’est la vieille Myra, là, qui tricote dans le coin. J’vous jure, une fois elle m’a prédit que j’allais renverser ma bière. Trois jours plus tard… paf. Bref. Ici, on parle, on écoute, on oublie. C’est ça, le quartier des Docks&nbsp;!</em></p>",
            'first' => true,
            'dialog' => 'rumor_jarrod_le_tavernier',
            'reference' => 'rumor_jarrod_le_tavernier_1',
        ],
    ];
}
