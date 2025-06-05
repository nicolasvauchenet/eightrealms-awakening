<?php

namespace App\DataFixtures\Dialog\DialogStep\BoisDuPendu;

trait TheobaldGrisMurmureTrait
{
    const THEOBALD_GRIS_MURMURE_DIALOG_STEPS = [
        // Quête secondaire : Bagarre Bizarre
        [
            'name' => 'Théobald - Rencontre',
            'text' => "<p><em>Alors comme ça, vous m’avez suivi depuis la capitale, jusqu'ici. Je n’ai rien volé, rien provoqué… mais personne ne veut rien entendre. Ils m'ont retrouvé dans cette taverne, déguisés en de simples voleurs… Je n'ai eu d'autre choix que de me défendre. J'ai quitté la ville, mais ils me retrouveront toujours…</em></p><p>Un léger bruissement le met soudain en alerte, il se redresse et serre son bâton dans sa main noueuse.</p><p><em>Préparez-vous. Ils viennent pour moi&nbsp;—&nbsp;et maintenant, pour vous aussi.</em></p>",
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
            'dialog' => 'quest_secondary_theobald_gris_murmure',
            'redirectToCombat' => 'les-druides-du-bois-du-pendu',
            'reference' => 'quest_secondary_theobald_gris_murmure_1',
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
            'dialog' => 'quest_secondary_theobald_gris_murmure',
            'reference' => 'quest_secondary_theobald_gris_murmure_2',
        ],
        [
            'name' => 'Théobald - Excuses',
            'text' => "<p><em>Je suis un ancien druide. La Nature me garde et me protège en ces lieux, et je n'ai nulle envie de montrer les dents face à mes anciens compagnons.</em></p><p>Ses épaules se voûtent tandis qu'il semble se parler à lui-même.</p><p><em>Pourquoi sont-ils en colère comme ça&nbsp;? Cela ne ressemble guère au Cercle…</em></p><p>Il rassemble ses esprits, et continue.</p><p><em>J'étais un druide de l'Ancien Cercle. Les miens m’ont banni pour avoir voulu apprendre le Rituel de l’Âme. Un savoir qu’ils jugent trop sacré pour être transmis, même entre leurs pairs. Moi, je craignais qu’il se perde, qu’il disparaisse avec le Grand Druide s’il venait à mourir.</em></p><p><em>Ils ont cru que je voulais le renverser. Ils ont crié au voleur, au traître. Ils m'ont chassé, et me voilà seul à présent. Ils m'ont laissé en paix quelque temps, mais ils semblent avoir décidé de m'éliminer, tout compte fait.</em></p><p><em>J’ai poursuivi mes recherches. Le Rituel de l’Âme est ancien, et il sert à révéler les portes cachées du Donjon. Ce lieu… il est maudit. Ce n’est pas une simple crypte. On raconte que le roi Galdric Ier y est mort d’une étrange malédiction, et que son tombeau a été scellé par un artefact brisé en deux fragments. Le Sceau.</em></p><p>Il redresse la tête et vous toise.</p><p><em>Êtes-vous venu jusqu'ici pour m'arrêter&nbsp;? Ou êtes-vous avec eux&nbsp;?</em></p>",
            'dialog' => 'quest_secondary_theobald_gris_murmure',
            'reference' => 'quest_secondary_theobald_gris_murmure_3',
        ],
        [
            'name' => 'Théobald - Combat',
            'text' => "<p><em>C'était moi. J'étais un druide de l'Ancien Cercle. Les miens m’ont banni pour avoir voulu apprendre le Rituel de l’Âme. Un savoir qu’ils jugent trop sacré pour être transmis, même entre leurs pairs. Moi, je craignais qu’il se perde, qu’il disparaisse avec le Grand Druide s’il venait à mourir.</em></p><p><em>Ils ont cru que je voulais le renverser. Ils ont crié au voleur, au traître. Ils m'ont chassé, et me voilà seul à présent. Ils m'ont laissé en paix quelque temps, mais ils semblent avoir décidé de m'éliminer, tout compte fait.</em></p><p><em>Je n’ai jamais renoncé à comprendre. J’ai découvert que le Rituel permettait d’ouvrir les yeux… sur les portes cachées du Donjon de l’Âme. Et que ce donjon était une prison. Le Roi Galdric Ier y aurait succombé à une malédiction inconnue, et son tombeau est scellé par un artefact brisé en deux parties. Un Sceau… peut-être pour contenir ce qui repose là-bas.</em></p><p>Il redresse la tête et vous toise.</p><p><em>Êtes-vous venu jusqu'ici pour m'arrêter&nbsp;? Ou êtes-vous avec eux&nbsp;?</em></p>",
            'dialog' => 'quest_secondary_theobald_gris_murmure',
            'reference' => 'quest_secondary_theobald_gris_murmure_4',
        ],
        [
            'name' => 'Théobald - Alaric',
            'text' => "<p><em>Un Druide n'est pas solitaire dans la forêt, et mon errance était planifiée par les Dieux. J’ai croisé le Prince Alaric, il y a quelques semaines. Il cherchait le Rituel. Il croyait que cela l’aiderait à franchir les portes du Donjon de l’Âme. Il croyait encore en l’humanité.</em></p><p><em>Il parlait du Bosquet, où réside le Grand Druide. Il pensait pouvoir le convaincre. Moi, je ne pouvais rien pour lui, sinon l’écouter. J’ai tenté de l’aider… mais j’étais déjà un paria à ses yeux comme à ceux des autres.</em></p>",
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
            'dialog' => 'quest_secondary_theobald_gris_murmure',
            'reference' => 'quest_secondary_theobald_gris_murmure_5',
        ],
        [
            'name' => 'Théobald - Grand Druide',
            'text' => "<p><em>Vous comptez approcher le Grand Druide ? Hm… c’est noble. Et terriblement dangereux. Les cercles se referment vite sur les intrus. Même un mot mal placé peut suffire à vous condamner. Je vais vous montrer le chemin.</em></p>",
            'effects' => [
                'reveal_location' => 'bosquet-des-druides',
            ],
            'dialog' => 'quest_secondary_theobald_gris_murmure',
            'reference' => 'quest_secondary_theobald_gris_murmure_6',
        ],
    ];
}
