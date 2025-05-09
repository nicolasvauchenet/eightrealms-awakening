<?php

namespace App\DataFixtures\Dialog\DialogStep\PortSaintDoux;

trait JarrodLeTavernierTrait
{
    const JARROD_LE_TAVERNIER_DIALOG_STEPS = [
        // Quête : Bagarre bizarre
        [
            'text' => "<p><em>Ah oui, je m’en souviens de ce vieux… silencieux, poli, pas le genre à faire des vagues. Jusqu’à ce que trois idiots essayent de lui voler sa bourse. Il les a envoyés au sol en moins de temps qu’il m’en faut pour servir une pinte. Puis il s’est tourné vers moi, et il m’a regardé avec des yeux… bizarres. Il a dit&nbsp;:&nbsp;&laquo;Je dois retourner là où les pendus rêvent encore.&raquo; Et il est parti, comme ça. Moi j’crois qu’il parlait du Bois du Pendu. Un coin à éviter, si vous voulez mon avis…</em></p>",
            'first' => true,
            'conditions' => [
                'quest_status' => [
                    'quest' => 'bagarre-bizarre',
                    'status' => 'progress',
                ],
                'quest_step_not_started' => [
                    'quest' => 'bagarre-bizarre',
                    'quest_step' => 2,
                ],
            ],
            'dialog' => 'quest_jarrod_le_tavernier',
            'reference' => 'quest_step_jarrod_le_tavernier_1',
        ],
        [
            'text' => "<p><em>Oui, le Bois du Pendu. Un endroit maudit. On dit qu’on y entend les branches craquer même quand il n’y a pas de vent. Et que certains arbres saignent quand on les touche… Mais bon, j’dis ça, j’y mets jamais les pieds. Si vous y allez, faites gaffe à vous. Et évitez de répondre si quelqu’un vous appelle par votre nom.</em></p>",
            'conditions' => [
                'quest_status' => [
                    'quest' => 'bagarre-bizarre',
                    'status' => 'progress',
                ],
                'quest_step_not_started' => [
                    'quest' => 'bagarre-bizarre',
                    'quest_step' => 2,
                ],
            ],
            'effects' => [
                'reveal_location' => 'bois-du-pendu',
            ],
            'dialog' => 'quest_jarrod_le_tavernier',
            'reference' => 'quest_step_jarrod_le_tavernier_2',
        ],
        [
            'text' => "<p><em>Vous êtes courageux, ou alors inconscient… mais j’aime ça. Si vous trouvez ce vieux fou, peut-être qu’il vous dira pourquoi il s’est battu comme un diable ce soir-là. Et s’il trouve que vous chantez faux… eh bien, j’aurai toujours une bière pour vous à votre retour.</em></p>",
            'conditions' => [
                'quest_status' => [
                    'quest' => 'bagarre-bizarre',
                    'status' => 'progress',
                ],
                'quest_step_not_started' => [
                    'quest' => 'bagarre-bizarre',
                    'quest_step' => 2,
                ],
            ],
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
            ],
            'dialog' => 'quest_jarrod_le_tavernier',
            'reference' => 'quest_step_jarrod_le_tavernier_3',
        ],
        [
            'text' => "<p><em>Vous savez quoi ? Vous avez bien raison. Trop de gens curieux finissent par nourrir les racines de ce bois. Et moi, je préfère servir des vivants que leur rendre hommage. Revenez quand vous serez prêt… ou pas.</em></p>",
            'conditions' => [
                'quest_status' => [
                    'quest' => 'bagarre-bizarre',
                    'status' => 'progress',
                ],
                'quest_step_not_started' => [
                    'quest' => 'bagarre-bizarre',
                    'quest_step' => 2,
                ],
            ],
            'dialog' => 'quest_jarrod_le_tavernier',
            'reference' => 'quest_step_jarrod_le_tavernier_4',
        ],
        [
            'text' => "<p><em>J'ai pas revu le vieux passer. Il a dû s'perdre dans l'bois… Une bière&nbsp; ?</em></p>",
            'first' => true,
            'conditions' => [
                'quest_status' => [
                    'quest' => 'bagarre-bizarre',
                    'status' => 'progress',
                ],
                'quest_step_status' => [
                    'quest' => 'bagarre-bizarre',
                    'quest_step' => 2,
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_jarrod_le_tavernier',
            'reference' => 'quest_step_jarrod_le_tavernier_5',
        ],
        [
            'text' => "<p><em>Tiens donc, vous voilà… Alors, vous l’avez retrouvé, ce vieux fou du Bois du Pendu&nbsp;? Pas trop de branches qui grincent dans vos cauchemars, j’espère&nbsp;? Ha&nbsp;! Allez, prenez une bière, c’est moi qui régale. Vous l’avez méritée.</em></p>",
            'first' => true,
            'conditions' => [
                'quest_status' => [
                    'quest' => 'bagarre-bizarre',
                    'status' => 'progress',
                ],
                'quest_step_status' => [
                    'quest' => 'bagarre-bizarre',
                    'quest_step' => 2,
                    'status' => 'completed',
                ],
            ],
            'dialog' => 'quest_jarrod_le_tavernier',
            'reference' => 'quest_step_jarrod_le_tavernier_6',
        ],

        // Dialogue normal
        [
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
            'reference' => 'dialog_step_jarrod_le_tavernier_1',
        ],

        // Ragots
        [
            'text' => "<p><em>Vous savez qui me fait le plus peur ici ? Pas le Donjon. Pas les brigands. Non. C’est la vieille Myra, là, qui tricote dans le coin. J’vous jure, elle m’a une fois prédit que j’allais renverser ma bière. Trois jours plus tard… paf. Bref. Ici, on parle, on écoute, on oublie. C’est ça, le quartier des Docks&nbsp;!</em></p>",
            'first' => true,
            'dialog' => 'rumor_jarrod_le_tavernier',
            'reference' => 'rumor_step_jarrod_le_tavernier_1',
        ],
    ];
}
