<?php

namespace App\DataFixtures\Dialog\DialogStep\Plouc;

trait GerardLePecheurTrait
{
    const GERARD_LE_PECHEUR_DIALOG_STEPS = [
        // Quête : Livraison en cours
        [
            'name' => 'Gérard - Rencontre',
            'text' => "<p>Gérard vous regarde, les yeux plissés, l'air suspicieux.</p><p><em>Qu’est-ce que je peux faire pour vous, l’ami ? Vous êtes pas d’ici, ça se voit tout de suite</em></p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'livraison-en-cours',
                    'quest_step' => 1,
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_gerard_le_pecheur',
            'reference' => 'quest_step_gerard_le_pecheur_1',
        ],
        [
            'name' => 'Gérard - Début de la Quête',
            'text' => "<p><em>Ah&nbsp;! Enfin&nbsp;! Par tous les crabes du port, j’pensais qu’il m’avait oublié, l’enclumeur. Ce truc-là va me servir, j’vous le dis. Ces saloperies de gobelins vont comprendre c’que c’est qu’un vieux pêcheur bien équipé&nbsp;!</em></p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'livraison-en-cours',
                    'quest_step' => 1,
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'edit_quest_step_status' => [
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 1,
                        'status' => 'completed',
                    ],
                ],
                'remove_items' => [
                    'bouclier-en-fer-de-gerard',
                ],
            ],
            'dialog' => 'quest_gerard_le_pecheur',
            'reference' => 'quest_step_gerard_le_pecheur_2',
        ],
        [
            'name' => 'Gérard - Quête',
            'text' => "<p>Gérard attrape une canne à pêche renforcée, visiblement modifiée pour frapper fort.</p><p><em>Contre des gobelins, oui. Depuis des mois, ces vermines viennent la nuit. Ils crèvent les filets, piquent le poisson, foutent le feu aux barques. Et le maire&nbsp;? Il s’en bat les roustons et y nous renvoie chier comme des malpropres, c'te gros bon à rien d'imposteur. Alors j’vais m’occuper de ces fumiers moi-même.</em></p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'livraison-en-cours',
                    'quest_step' => 1,
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_gerard_le_pecheur',
            'reference' => 'quest_step_gerard_le_pecheur_3',
        ],
        [
            'name' => 'Gérard - Accepter la quête',
            'text' => "<p>Il vous fixe, surpris, puis baisse les yeux sur le bouclier. Soupire.</p><p><em>Vous feriez ça&nbsp;? Bon sang… J’ai beau faire le fier, je sais bien que j’ai plus vingt ans. Prenez-le, le bouclier. Suivez le sentier derrière les vieux chênes, à l’orée du Bois des Relents. Ça devrait vous mener tout droit à leur planque. Et méfiez-vous, ces saletés sont rusées comme des rats d’égout.</em></p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'livraison-en-cours',
                    'quest_step' => 2,
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'reveal_location' => [
                    'bois-des-relents',
                ],
                'add_items' => [
                    [
                        'item' => 'bouclier-en-fer',
                    ],
                ],
                'edit_quest_step_status' => [
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 2,
                        'status' => 'completed',
                    ],
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 4,
                        'status' => 'skipped',
                    ],
                ],
            ],
            'dialog' => 'quest_gerard_le_pecheur',
            'reference' => 'quest_step_gerard_le_pecheur_4',
        ],
        [
            'name' => 'Gérard - Refuser la quête',
            'first' => true,
            'text' => "<p>Il serre le bouclier et la canne à pêche dans ses mains, et s'arrête un instant à l'entrée de la cabane, comme pour apprécier un dernier regard sur son village.</p><p><em>Allez. Quelqu’un doit le faire. S’ils me plantent, j’espère que ce sera vite fait</em></p><p>Puis il s'en va.</p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'livraison-en-cours',
                    'quest_step' => 2,
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'edit_quest_step_status' => [
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 2,
                        'status' => 'completed',
                    ],
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 3,
                        'status' => 'skipped',
                    ],
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 5,
                        'status' => 'skipped',
                    ],
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 6,
                        'status' => 'skipped',
                    ],
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 7,
                        'status' => 'skipped',
                    ],
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 8,
                        'status' => 'skipped',
                    ],
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 9,
                        'status' => 'skipped',
                    ],
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 10,
                        'status' => 'skipped',
                    ],
                ],
                'start_quest_step' => [
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 4,
                        'status' => 'progress',
                    ],
                ],
            ],
            'dialog' => 'quest_gerard_le_pecheur',
            'reference' => 'quest_step_gerard_le_pecheur_5',
        ],
        [
            'name' => 'Gérard - Quête terminée',
            'text' => "<p>Gérard ouvre la porte, l'air fatigué, puis sourit en vous voyant.</p><p><em>C’est fait&nbsp;? Par tous les diables du large, vous l’avez fait&nbsp;? Merci… Vraiment. Gardez le bouclier. Il est à vous. Et prenez ces poissons, c’est pas grand-chose, mais c’est de bon cœur. Et dites à l'enclumeur que j'viendrai lui apporter son tonneau, même qu'on l'boira ensemble&nbsp;!</em></p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'livraison-en-cours',
                    'quest_step' => 6,
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'add_items' => [
                    [
                        'item' => 'poisson-grille',
                    ],
                    [
                        'item' => 'poisson-grille',
                    ],
                    [
                        'item' => 'poisson-grille',
                    ],
                ],
                'edit_quest_step_status' => [
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 6,
                        'status' => 'completed',
                    ],
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 7,
                        'status' => 'skipped',
                    ],
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 8,
                        'status' => 'skipped',
                    ],
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 9,
                        'status' => 'skipped',
                    ],
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 10,
                        'status' => 'skipped',
                    ],
                ],
                'start_quest_step' => [
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 11,
                    ],
                ],
            ],
            'dialog' => 'quest_gerard_le_pecheur',
            'reference' => 'quest_step_gerard_le_pecheur_6',
        ],
        [
            'name' => 'Gérard - Quête en négociation',
            'text' => "<p>Gérard ouvre la porte, l'air fatigué, puis sourit en vous voyant.</p><p><em>C’est fait&nbsp;? Vous les avez exterminés&nbsp;?</em></p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'livraison-en-cours',
                    'quest_step' => 7,
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'edit_quest_step_status' => [
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 6,
                        'status' => 'skipped',
                    ],
                ],
            ],
            'dialog' => 'quest_gerard_le_pecheur',
            'reference' => 'quest_step_gerard_le_pecheur_7',
        ],
        [
            'name' => 'Gérard - Quête en négociation 2',
            'text' => "<p>Gérard prend son air le plus sombre et renfrogné, crache par terre et vous regarde sévèrement.</p><p><em>Vous voulez qu’on papote avec ces fouilles-merde&nbsp;? Qu’on leur offre le gîte tant qu’on y est&nbsp;? Jamais&nbsp;! Des voleurs, des parasites, des enflures, voilà ce qu’ils sont&nbsp;! Si c'est pour ça qu'vous êtes revenu, c'était pas la peine de… heu… de revenir&nbsp;! Fallait rester papoter avec vos nouveaux amis.</em></p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'livraison-en-cours',
                    'quest_step' => 7,
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_gerard_le_pecheur',
            'reference' => 'quest_step_gerard_le_pecheur_8',
        ],
        [
            'name' => 'Gérard - Quête en négociation 3',
            'text' => "<p>Il reste impassible et croise les bras.</p><p><em>Et moi j’veux un royaume sans gobelins&nbsp;! C’est pas pour ça qu’on l’a, hein&nbsp;?</em></p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'livraison-en-cours',
                    'quest_step' => 7,
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_gerard_le_pecheur',
            'reference' => 'quest_step_gerard_le_pecheur_9',
        ],
        [
            'name' => 'Gérard - Quête négociée',
            'text' => "<p>Gérard blêmit, se gratte la tempe.</p><p><em>Bon sang… Bon. D’accord. Mais j’vous préviens&nbsp;:&nbsp;si une de ces ordures touche à une écaille de poisson sans demander, ou qu'y s'approche de trop près des barques, j’le démonte&nbsp;!</em></p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'livraison-en-cours',
                    'quest_step' => 7,
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'edit_quest_step_status' => [
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 7,
                        'status' => 'completed',
                    ],
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 9,
                        'status' => 'skipped',
                    ],
                ],
            ],
            'dialog' => 'quest_gerard_le_pecheur',
            'reference' => 'quest_step_gerard_le_pecheur_10',
        ],
        [
            'name' => 'Gérard - Quête négociée',
            'text' => "<p>Gérard reprend son bouclier, puis il sort d'un pas décidé et part vers le bois en marmonnant.</p><p><em>Ça va pas s'faire tout seul, allez&nbsp;! Au carnage&nbsp;!</em></p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'livraison-en-cours',
                    'quest_step' => 7,
                    'status' => 'completed',
                ],
            ],
            'effects' => [
                'remove_items' => [
                    'bouclier-en-fer',
                ],
                'edit_quest_step_status' => [
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 7,
                        'status' => 'completed',
                    ],
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 8,
                        'status' => 'skipped',
                    ],
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 10,
                        'status' => 'skipped',
                    ],
                ],
                'start_quest_step' => [
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 9,
                    ],
                ],
            ],
            'dialog' => 'quest_gerard_le_pecheur',
            'reference' => 'quest_step_gerard_le_pecheur_11',
        ],

        // Dialogue normal
        [
            'name' => 'Gérard - Dialogue',
            'text' => "<p><em>On se sent bien mieux maintenant, grâce à vous. Y'a encore des braves dans c'te royaume, et vous en êtes, pour sûr&nbsp;!</em></p>",
            'first' => true,
            'conditions' => [
                'all' => [
                    [
                        'quest_status' => [
                            'quest' => 'livraison-en-cours',
                            'status' => 'rewarded',
                        ],
                    ],
                    [
                        'quest_step_status_not' => [
                            'quest' => 'livraison-en-cours',
                            'quest_step' => 6,
                            'status' => 'skipped',
                        ],
                    ],
                ],
            ],
            'dialog' => 'dialog_gerard_le_pecheur',
            'reference' => 'dialog_step_gerard_le_pecheur_1',
        ],
        [
            'name' => 'Gérard - Dialogue',
            'text' => "<p><em>Vous savez quoi&nbsp;? Je m'étais trompé sur le compte des gobelins… Ouais, je l'avoue.</em></p><p>Gérard vous regarde d'un air radieux et reconnaissant.</p><p><em>Y sont travailleurs ces fumi… ces p'tits gars&nbsp;! Bon ils puent comme pas permis, mais l'odeur du poisson leur fait rien, au moins. Et y arrivent même à me surprendre par leur gentillesse, quand on est bien avec eux.</em></p><p>Il se gratte le menton, pensif.</p><p><em>Et j'dois dire… On se sent plus en sécurité maintenant qu'y sont au village.</em></p>",
            'first' => true,
            'conditions' => [
                'all' => [
                    [
                        'quest_status' => [
                            'quest' => 'livraison-en-cours',
                            'status' => 'rewarded',
                        ],
                    ],
                    [
                        'quest_step_status_not' => [
                            'quest' => 'livraison-en-cours',
                            'quest_step' => 6,
                            'status' => 'completed',
                        ],
                    ],
                ],
            ],
            'dialog' => 'dialog_gerard_le_pecheur',
            'reference' => 'dialog_step_gerard_le_pecheur_2',
        ],

        // Ragots
        [
            'name' => 'Gérard - Ragots',
            'text' => "<p><em>Le Royaume&nbsp;? J'en connais rien moi, de cet îlot, à part ses côtes. J'passe le plus clair de mon temps en mer, chuis pêcheur.</em></p><p><em>Quant à la capitale, et son maire véreux, qu'y restent où qu'y sont, on a pas besoin d'eux ici. On est très bien entre pêcheurs au village. Et tant pis pour les ceusses qui s'tirent pour aller moisir dans leur tas d'pavés crasseux. Qu'ils y restent ces traîtres de paresseux.</em></p>",
            'first' => true,
            'dialog' => 'rumor_gerard_le_pecheur',
            'reference' => 'rumor_step_gerard_le_pecheur_1',
        ],
    ];
}
