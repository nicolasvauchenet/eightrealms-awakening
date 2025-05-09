<?php

namespace App\DataFixtures\Dialog\DialogStep\BoisDuPendu;

trait TheobaldGrisMurmureTrait
{
    const THEOBALD_GRIS_MURMURE_DIALOG_STEPS = [
        [
            'text' => "<p><em>Alors comme ça, vous m’avez suivi depuis la capitale, jusqu'ici. Je n’ai rien volé, rien provoqué… mais personne ne veut rien entendre. Et ils me retrouveront toujours…</em></p><p><em>Préparez-vous. Ils viennent pour moi — et maintenant, pour vous aussi.</em></p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'bagarre-bizarre',
                    'quest_step' => 2,
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'edit_quest_step_status' => [
                    'quest' => 'bagarre-bizarre',
                    'quest_step' => 2,
                    'status' => 'completed',
                ],
            ],
            'dialog' => 'quest_theobald_gris_murmure',
            'redirectToCombat' => 'les-druides-du-bois-du-pendu',
            'reference' => 'quest_step_theobald_gris_murmure_1',
        ],
        [
            'text' => "<p><em>Vous vous battez bien. Je m'appelle Théobald, et on me surnommait autrefois le Gris-Murmure. Le Cercle m’a banni pour avoir voulu apprendre le Rituel de l’Âme. Un savoir qu’ils jugent trop sacré pour être transmis, même entre leurs pairs. Moi, je craignais qu’il se perde, qu’il disparaisse avec le Grand Druide s’il venait à mourir.</em></p><p><em>Ils ont cru que je voulais le renverser. Ils ont crié au voleur, au traître. Et me voilà seul à présent.</em></p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'bagarre-bizarre',
                    'quest_step' => 4,
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_theobald_gris_murmure',
            'reference' => 'quest_step_theobald_gris_murmure_2',
        ],
        [
            'text' => "<p><em>Un Druide n'est pas solitaire dans la forêt, et mon errance était planifiée par les Dieux. J’ai croisé le Prince Alaric, jadis. Il cherchait le Rituel. Il pensait que cela l’aiderait à franchir les portes du Donjon de l’Âme. Il croyait pouvoir convaincre les Druides. Il croyait encore en l’humanité.</em></p><p><em>J’ai essayé de l’aider… mais moi aussi, j’étais déjà un paria.</em></p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'bagarre-bizarre',
                    'quest_step' => 4,
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_theobald_gris_murmure',
            'reference' => 'quest_step_theobald_gris_murmure_3',
        ],
        [
            'text' => "<p><em>Vous comptez approcher le Grand Druide ? Hm… c’est noble. Et terriblement dangereux. Les cercles se referment vite sur les intrus. Même un mot mal placé peut suffire à vous condamner.</em></p><p><em>Alors prenez ceci. L’Amulette du Cercle. Elle marque celui qui a appartenu à la Forêt. Même bannis, nous portons encore son empreinte. Peut-être qu’en la voyant, ils écouteront… avant de frapper.</em></p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'bagarre-bizarre',
                    'quest_step' => 4,
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'add_items' => [
                    [
                        'item' => 'amulette-du-cercle',
                        'questItem' => true,
                    ],
                ],
            ],
            'dialog' => 'quest_theobald_gris_murmure',
            'reference' => 'quest_step_theobald_gris_murmure_4',
        ],
        [
            'text' => "<p><em>Attendez. Le Rituel seul ne suffit pas. Il faut une clé. Une vraie. Symbolique ou matérielle, je l’ignore. Mais sans elle… le Tombeau reste clos.</em></p><p><em>Je vous ai donné tout ce que je sais. Le reste… appartient aux morts.</em></p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'bagarre-bizarre',
                    'quest_step' => 4,
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'edit_quest_step_status' => [
                    'quest' => 'bagarre-bizarre',
                    'quest_step' => 4,
                    'status' => 'completed',
                ],
            ],
            'dialog' => 'quest_theobald_gris_murmure',
            'reference' => 'quest_step_theobald_gris_murmure_5',
        ],
        [
            'text' => "<p><em>Vous êtes pressé. Que les âmes vous protègent. Merci encore pour votre aide.</em></p><p>Théobald se retourne et s'enfonce dans la pénombre des bois.</p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'bagarre-bizarre',
                    'quest_step' => 4,
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'edit_quest_step_status' => [
                    'quest' => 'bagarre-bizarre',
                    'quest_step' => 4,
                    'status' => 'skipped',
                ],
                'start_quest_step' => [
                    'quest' => 'bagarre-bizarre',
                    'quest_step' => 5,
                ],
            ],
            'dialog' => 'quest_theobald_gris_murmure',
            'reference' => 'quest_step_theobald_gris_murmure_6',
        ],
    ];
}
