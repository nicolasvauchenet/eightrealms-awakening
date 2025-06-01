<?php

namespace App\DataFixtures\Dialog\DialogStep\BoisDuPendu;

trait TheobaldGrisMurmureTrait
{
    const THEOBALD_GRIS_MURMURE_DIALOG_STEPS = [
        [
            'name' => 'Théobald - Rencontre',
            'text' => "<p><em>Alors comme ça, vous m’avez suivi depuis la capitale, jusqu'ici. Je n’ai rien volé, rien provoqué… mais personne ne veut rien entendre. Ils m'ont retrouvé à la taverne, déguisés en de simples voleurs… Je n'ai eu d'autre choix que de me défendre. Mais ils me retrouveront toujours…</em></p><p>Un léger bruissement le met soudain en alerte, il se redresse et serre son bâton dans sa main noueuse.</p><p><em>Préparez-vous. Ils viennent pour moi&nbsp;—&nbsp;et maintenant, pour vous aussi.</em></p>",
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
            'name' => 'Théobald - Présentations',
            'text' => "<p><em>Vous vous battez bien. Je m'appelle Théobald, et on me surnommait autrefois le Gris-Murmure.</em></p>",
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
            'name' => 'Théobald - Excuses',
            'text' => "<p><em>Je suis un ancien druide. La Nature me garde et me protège en ces lieux, et je n'ai nulle envie de montrer les dents face à mes anciens compagnons.</em></p><p>Ses épaules se voûtent tandis  qu'il semble se parler à lui-même.</p><p><em>Pourquoi sont-ils en colère comme ça&nbsp;? Cela ne ressemble guère au Cercle…</em></p><p>Il rassemble ses esprits, et continue.</p><p><em>J'étais un druide de l'Ancien Cercle. Les miens m’ont banni pour avoir voulu apprendre le Rituel de l’Âme. Un savoir qu’ils jugent trop sacré pour être transmis, même entre leurs pairs. Moi, je craignais qu’il se perde, qu’il disparaisse avec le Grand Druide s’il venait à mourir.</em></p><p><em>Ils ont cru que je voulais le renverser. Ils ont crié au voleur, au traître. Ils m'ont chassé, et me voilà seul à présent. Ils m'ont laissé en paix quelque temps, mais ils semblent avoir décidé de m'éliminer, tout compte fait.</em></p><p>Il redresse la tête et vous toise.</p><p><em>Êtes-vous venu jusqu'ici pour m'arrêter&nbsp;? Ou êtes-vous avec eux&nbsp;?</em></p>",
            'dialog' => 'quest_theobald_gris_murmure',
            'reference' => 'quest_step_theobald_gris_murmure_3',
        ],
        [
            'name' => 'Théobald - Combat',
            'text' => "<p><em>J'étais un druide de l'Ancien Cercle. Les miens m’ont banni pour avoir voulu apprendre le Rituel de l’Âme. Un savoir qu’ils jugent trop sacré pour être transmis, même entre leurs pairs. Moi, je craignais qu’il se perde, qu’il disparaisse avec le Grand Druide s’il venait à mourir.</em></p><p><em>Ils ont cru que je voulais le renverser. Ils ont crié au voleur, au traître. Ils m'ont chassé, et me voilà seul à présent. Ils m'ont laissé en paix quelque temps, mais ils semblent avoir décidé de m'éliminer, tout compte fait.</em></p><p>Il redresse la tête et vous toise.</p><p><em>Êtes-vous venu jusqu'ici pour m'arrêter&nbsp;? Ou êtes-vous avec eux&nbsp;?</em></p>",
            'dialog' => 'quest_theobald_gris_murmure',
            'reference' => 'quest_step_theobald_gris_murmure_4',
        ],
        [
            'name' => 'Théobald - Alaric',
            'text' => "<p><em>Un Druide n'est pas solitaire dans la forêt, et mon errance était planifiée par les Dieux. J’ai croisé le Prince Alaric, il y a quelques semaines. Il cherchait le Rituel. Il pensait que cela l’aiderait à franchir les portes du Donjon de l’Âme. Il croyait pouvoir convaincre le Grand Druide. Il croyait encore en l’humanité.</em></p><p><em>J’ai essayé de l’aider… mais moi aussi, j’étais déjà un paria.</em></p>",
            'effects' => [
                'edit_quest_step_status' => [
                    [
                        'quest' => 'bagarre-bizarre',
                        'quest_step' => 4,
                        'status' => 'completed',
                    ],
                    [
                        'quest' => 'bagarre-bizarre',
                        'quest_step' => 5,
                        'status' => 'completed',
                    ],
                ],
                'start_quest_step' => [
                    'quest' => 'bagarre-bizarre',
                    'quest_step' => 6,
                ],
            ],
            'dialog' => 'quest_theobald_gris_murmure',
            'reference' => 'quest_step_theobald_gris_murmure_5',
        ],
        [
            'name' => 'Théobald - Grand Druide',
            'text' => "<p><em>Vous comptez approcher le Grand Druide ? Hm… c’est noble. Et terriblement dangereux. Les cercles se referment vite sur les intrus. Même un mot mal placé peut suffire à vous condamner. Je vais vous montrer le chemin.</em></p>",
            'effects' => [
                'reveal_location' => 'bosquet-des-druides',
            ],
            'dialog' => 'quest_theobald_gris_murmure',
            'reference' => 'quest_step_theobald_gris_murmure_6',
        ],
        [
            'name' => 'Théobald - Clé',
            'text' => "<p><em>Attendez. Le Rituel seul ne suffit pas. Il faut une clé. Une vraie. Symbolique ou matérielle, je l’ignore. Mais sans elle… le Tombeau reste clos.</em></p><p><em>Je vous ai donné tout ce que je sais. Le reste… appartient aux morts.</em></p>",
            'dialog' => 'quest_theobald_gris_murmure',
            'reference' => 'quest_step_theobald_gris_murmure_7',
        ],
        [
            'name' => 'Théobald - Fin',
            'text' => "<p><em>Vous êtes pressé. Que les âmes vous protègent. Merci encore pour votre aide.</em></p><p>Théobald se retourne et s'enfonce dans la pénombre des bois.</p>",
            'edit_quest_step_status' => [
                [
                    'quest' => 'bagarre-bizarre',
                    'quest_step' => 4,
                    'status' => 'completed',
                ],
                [
                    'quest' => 'bagarre-bizarre',
                    'quest_step' => 5,
                    'status' => 'completed',
                ],
            ],
            'start_quest_step' => [
                'quest' => 'bagarre-bizarre',
                'quest_step' => 6,
            ],
            'dialog' => 'quest_theobald_gris_murmure',
            'reference' => 'quest_step_theobald_gris_murmure_8',
        ],
    ];
}
