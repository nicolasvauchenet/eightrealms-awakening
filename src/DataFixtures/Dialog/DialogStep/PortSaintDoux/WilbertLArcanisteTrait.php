<?php

namespace App\DataFixtures\Dialog\DialogStep\PortSaintDoux;

trait WilbertLArcanisteTrait
{
    const WILBERT_L_ARCANISTE_DIALOG_STEPS = [
        // Quête : La Fiole Perdue
        [
            'name' => "Wilbert - Quête",
            'text' => "<p><em>Ma fiole&nbsp;! Une concoction d’essence de feu pur, stabilisée à grand-peine… envolée&nbsp;! Pas de traces de pas, pas d’empreintes… juste de petits tas de sable épars, comme déposés par le vent lui-même.</em></p><p><em>Quel genre de voleur laisse du désert derrière lui&nbsp;? Hmmm… Si vous avez l’esprit vif et le pas léger, suivez la piste. Vers les Sables Chauds…</em></p>",
            'first' => true,
            'conditions' => [
                'quest_not_started' => 'la-fiole-perdue',
            ],
            'dialog' => 'quest_wilbert_larcaniste',
            'reference' => 'quest_step_wilbert_larcaniste_1',
        ],
        [
            'name' => "Wilbert - Sable Chauds",
            'text' => "<p><em>Les Sables Chauds&nbsp;? À l’extrême sud-est de l’île. On y accède par les dunes au-delà des falaises rouges. Peu osent s’y aventurer, sauf les fous… et les désespérés.</em></p><p><em>Si ce voleur est ce que je crois, il n’a pas fui au hasard. Le désert attire ceux qui veulent disparaître… ou ceux qui cherchent à réveiller ce qui ne devrait pas l’être.</em></p>",
            'conditions' => [
                'quest_not_started' => 'la-fiole-perdue',
            ],
            'effects' => [
                'reveal_location' => 'sables-chauds',
            ],
            'dialog' => 'quest_wilbert_larcaniste',
            'reference' => 'quest_step_wilbert_larcaniste_2',
        ],
        [
            'name' => "Wilbert - Accepter la quête",
            'text' => "<p><em>Bonne chance. Et souvenez-vous&nbsp;:&nbsp;tout ce qui brille dans le sable n’est pas or… parfois, c’est pire. Revenez si vous survivez, je vous paierai pour vos efforts.</em></p>",
            'conditions' => [
                'quest_not_started' => 'la-fiole-perdue',
            ],
            'effects' => [
                'start_quest' => 'la-fiole-perdue',
            ],
            'dialog' => 'quest_wilbert_larcaniste',
            'reference' => 'quest_step_wilbert_larcaniste_3',
        ],
        [
            'name' => "Wilbert - Refuser la quête",
            'text' => "<p><em>Je vois. Je ne vous en tiens pas rigueur. Peu sont prêts à affronter le désert. Mais si un jour vous changez d’avis… ma porte est ouverte.</em></p>",
            'conditions' => [
                'quest_not_started' => 'la-fiole-perdue',
            ],
            'dialog' => 'quest_wilbert_larcaniste',
            'reference' => 'quest_step_wilbert_larcaniste_4',
        ],
        [
            'name' => "Wilbert - Quête en cours",
            'text' => "<p><em>Si ma fiole tombait entre de mauvaises mains, elle pourrait provoquer une catastrophe. Le désert est déjà assez dangereux sans ça. Restez sur vos gardes&nbsp;!</em></p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'la-fiole-perdue',
                    'quest_step' => 1,
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_wilbert_larcaniste',
            'reference' => 'quest_step_wilbert_larcaniste_5',
        ],
        [
            'name' => "Wilbert - Quête terminée",
            'text' => "<p><em>Vous êtes revenu vivant… C’est déjà une victoire. Quant à ma fiole… elle n'est peut-être pas tout à fait perdue… Peut-être que si je…</em></p><p>Il se perd dans ses pensées un instant, puis se reprend en sursautant.</p><p><em>Au moins, le désert ne brûlera pas avec elle. Voici votre récompense, comme promis. Je garde mes serments, même quand mes objets me trahissent.</em></p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'la-fiole-perdue',
                    'quest_step' => 4,
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'remove_items' => [
                    'fiole-brisee',
                ],
                'edit_quest_step_status' => [
                    'quest' => 'la-fiole-perdue',
                    'quest_step' => 4,
                    'status' => 'completed',
                ],
            ],
            'dialog' => 'quest_wilbert_larcaniste',
            'reference' => 'quest_step_wilbert_larcaniste_6',
        ],
        [
            'name' => "Wilbert - Médaillon des Vents",
            'text' => "<p><em>Ce… ce n’est pas un simple bijou. Il pulse… Il respire. C’est un artefact ancien, chargé d’énergie élémentaire. Je crois… Oui c'est ça&nbsp;:&nbsp; le Médaillons des Vents. Incroyable&nbsp;! On le croyait perdu… ou détruit.</em></p><p><em>Conservez-le. Il pourrait vous ouvrir des portes que nul ne voit encore.</em></p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'la-fiole-perdue',
                    'quest_step' => 5,
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'reward_quest' => 'la-fiole-perdue',
            ],
            'dialog' => 'quest_wilbert_larcaniste',
            'reference' => 'quest_step_wilbert_larcaniste_7',
        ],

        // Dialogue : Médaillon des Vents
        [
            'name' => "Wilbert - Médaillon des Vents",
            'text' => "<p>Wilbert vous regarde et attend.</p><p><em>Hé bien, que voulez-vous donc maintenant&nbsp;?</em></p>",
            'first' => true,
            'conditions' => [
                'all' => [
                    'quest_status' => [
                        'quest' => 'la-fiole-perdue',
                        'status' => 'rewarded',
                    ],
                    'quest_step_status' => [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 5,
                        'status' => 'progress',
                    ],
                ],
            ],
            'dialog' => 'dialog_wilbert_larcaniste',
            'reference' => 'dialog_step_wilbert_larcaniste_medaillon_1',
        ],
        [
            'name' => "Wilbert - Médaillon des Vents",
            'text' => "<p>Wilbert vous regarde pendant un long moment, se voûtant au fur et à mesure en se grattant la barbe. Il semble réfléchir en essayant de vous sonder, pendant que vous essayez de retenir un rire qui monte en vous de façon irrépressible. Enfin, il se redresse et vous montre du doigt.</p><p><em>Et pourquoi ce médaillon vous intéresse-t-il&nbsp;? Que savez-vous du Sceau&nbsp;?</em></p>",
            'first' => false,
            'conditions' => [
                'all' => [
                    'quest_status' => [
                        'quest' => 'la-fiole-perdue',
                        'status' => 'rewarded',
                    ],
                    'quest_step_status' => [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 5,
                        'status' => 'progress',
                    ],
                ],
            ],
            'dialog' => 'dialog_wilbert_larcaniste',
            'reference' => 'dialog_step_wilbert_larcaniste_medaillon_2',
        ],
        [
            'name' => "Wilbert - Tombeau",
            'text' => "<p>Son regard se fait un peu plus intense, il nage en pleine intrigue.</p><p><em>C'est bien ça. Et vous voulez ouvrir ce tombeau&nbsp;?</em></p>",
            'first' => false,
            'conditions' => [
                'all' => [
                    'quest_status' => [
                        'quest' => 'la-fiole-perdue',
                        'status' => 'rewarded',
                    ],
                    'quest_step_status' => [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 5,
                        'status' => 'progress',
                    ],
                ],
            ],
            'dialog' => 'dialog_wilbert_larcaniste',
            'reference' => 'dialog_step_wilbert_larcaniste_medaillon_3',
        ],
        [
            'name' => "Wilbert - Silence",
            'text' => "<p>Il vous tourne le dos et se met à faire semblant de chercher quelque chose dans ses étagères.</p><p><em>Je ne peux rien de plus pour vous. Et j'ai du travail. Si vous voulez bien m'excuser…</em></p>",
            'first' => false,
            'conditions' => [
                'all' => [
                    'quest_status' => [
                        'quest' => 'la-fiole-perdue',
                        'status' => 'rewarded',
                    ],
                    'quest_step_status' => [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 5,
                        'status' => 'progress',
                    ],
                ],
            ],
            'dialog' => 'dialog_wilbert_larcaniste',
            'reference' => 'dialog_step_wilbert_larcaniste_medaillon_4',
        ],
        [
            'name' => "Wilbert - le Prince et le Roi",
            'text' => "<p>Il fronce les sourcils, puis son visage s'ouvre, il semble avoir compris quelque chose.</p><p><em>Alors c'était pour ça… Il est venu me voir, peu de temps avant de disparaître. Il voulait des renseignements. Sur les druides de l'Ancien Cercle. Je lui ai dit ce que je savais à leur sujet, mais rien d'autre. Et il m'a fait jurer de n'en toucher mot à quiconque.</em></p>",
            'first' => false,
            'conditions' => [
                'all' => [
                    'quest_status' => [
                        'quest' => 'la-fiole-perdue',
                        'status' => 'rewarded',
                    ],
                    'quest_step_status' => [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 5,
                        'status' => 'progress',
                    ],
                ],
            ],
            'dialog' => 'dialog_wilbert_larcaniste',
            'reference' => 'dialog_step_wilbert_larcaniste_medaillon_5',
        ],
        [
            'name' => "Wilbert - Mystère",
            'text' => "<p>Il fronce les sourcils à nouveau, et se perd dans des réflexions encore plus profondes. Il se met à marmonner, comme s'il réfléchissait à voix haute.</p><p><em>Tiens donc… Alors Galdric serait parti retrouver le Prince. Sûrement pour l'empêcher d'entrer dans le donjon, et d'accéder au Tombeau…</em></p><p>Il secoue la tête plusieurs fois et lève les bras en l'air.</p><p><em>Non. Non, impossible. Le second fragment est perdu. Seul Galdric sait où il est. Et encore, rien n'est moins sûr… Et quand bien même, le Sceau ne peut être reconstitué sans…</em></p><p>Il semble soudainement se rappeler votre présence, hésite un instant, puis il baisse les bras.</p><p><em>Autant finir. Je pense que vous voulez aider. Seul Gart le Forgeron est capable de reconstituer le Sceau. Lui et moi sommes vieux, et nous avons tous les deux, à une époque qui me semble si lointaine, aidé le Roi à protéger le Tombeau. Avec le Grand Druide, nous avons dissimulé les portes du Donjon de l'Âme. Puis Gart a scindé le Sceau en deux fragments. L'un a été volé, mais vous l'avez retrouvé. Quant à l'autre, le Roi l'a caché, et lui seul sait où.</em></p><p>Il vous regarde avec sévérité.</p><p><em>Le Tombeau ne doit PAS être rouvert&nbsp;! J'ignore ce que compte faire le Prince Alaric, mais le Roi a décidé de l'en empêcher, et il lui est sûrement arrivé quelque chose. Vous devez le rejoindre&nbsp;! Vous devez l'aider&nbsp;! Allez voir le Grand Druide dans le Bosquet des Druides. Décidez-le à vous enseigner le Rituel de l'Âme. Puis allez au Donjon de l'Âme, et retrouvez le Roi  et le Prince avant qu'il ne soit trop tard&nbsp;!</em></p>",
            'first' => false,
            'conditions' => [
                'all' => [
                    'quest_status' => [
                        'quest' => 'la-fiole-perdue',
                        'status' => 'rewarded',
                    ],
                    'quest_step_status' => [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 5,
                        'status' => 'progress',
                    ],
                ],
            ],
            'dialog' => 'dialog_wilbert_larcaniste',
            'reference' => 'dialog_step_wilbert_larcaniste_medaillon_6',
        ],
        [
            'name' => "Wilbert - Donjon",
            'text' => "<p>Il ouvre de grand yeux ronds, ce qui lui donne un air ridicule. Vous retenez un sourire.</p><p><em>Hé bien, vous avez désormais les deux pieds dans le plat, si j'ose dire… Je vais vous montrer le chemin le plus sûr pour vous rendre au Donjon de l'Âme. Partez, et retrouvez le Roi et le Prince&nbsp;!</em></p>",
            'first' => false,
            'conditions' => [
                'all' => [
                    'quest_status' => [
                        'quest' => 'la-fiole-perdue',
                        'status' => 'rewarded',
                    ],
                    'quest_step_status' => [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 5,
                        'status' => 'progress',
                    ],
                ],
            ],
            'effects' => [
                'reveal_location' => 'donjon-de-lame',
                'end_quest_step' => [
                    [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 1,
                        'status' => 'completed',
                    ],
                    [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 5,
                        'status' => 'completed',
                    ],
                    [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 6,
                        'status' => 'completed',
                    ],
                ],
            ],
            'dialog' => 'dialog_wilbert_larcaniste',
            'reference' => 'dialog_step_wilbert_larcaniste_medaillon_7',
        ],
        [
            'name' => "Wilbert - Donjon",
            'text' => "<p>Il acquiesce d'un hochement de tête.</p><p><em>Je vais vous montrer le chemin le plus sûr pour vous rendre au Donjon de l'Âme. Partez au Bosquet des Druides, et retrouvez le Roi et le Prince&nbsp;!</em></p>",
            'first' => false,
            'conditions' => [
                'all' => [
                    'quest_status' => [
                        'quest' => 'la-fiole-perdue',
                        'status' => 'rewarded',
                    ],
                    'quest_step_status' => [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 5,
                        'status' => 'progress',
                    ],
                ],
            ],
            'effects' => [
                'reveal_location' => 'donjon-de-lame',
                'end_quest_step' => [
                    [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 1,
                        'status' => 'completed',
                    ],
                    [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 5,
                        'status' => 'completed',
                    ],
                    [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 6,
                        'status' => 'completed',
                    ],
                ],
            ],
            'dialog' => 'dialog_wilbert_larcaniste',
            'reference' => 'dialog_step_wilbert_larcaniste_medaillon_8',
        ],

        // Dialogue normal
        [
            'name' => "Wilbert - Dialogue",
            'text' => "<p><em>Vous m’avez bien aidé, l’ami. Depuis, mes recherches avancent à pas de géant. J’espère que le désert vous a enseigné quelque chose… ou au moins appris à boire lentement.</em></p>",
            'first' => true,
            'conditions' => [
                'all' => [
                    'quest_status' => [
                        'quest' => 'la-fiole-perdue',
                        'status' => 'rewarded',
                    ],
                    'quest_step_status_not' => [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 5,
                        'status' => 'progress',
                    ],
                ],
            ],
            'dialog' => 'dialog_wilbert_larcaniste',
            'reference' => 'dialog_step_wilbert_larcaniste_1',
        ],

        // Ragots
        [
            'name' => "Wilbert - Ragots",
            'text' => "<p><em>Port Saint-Doux est aveugle. Les gens rient, commercent, prient… pendant que des forces invisibles tirent les ficelles. Mais je les vois, moi. Je les entends. Et si vous ouvrez votre esprit, vous entendrez aussi… Oh, mais j’en oublie mes manières. Vous voulez un sort de lévitation ou une infusion pour la mémoire&nbsp;?</em></p>",
            'first' => true,
            'dialog' => 'rumor_wilbert_larcaniste',
            'reference' => 'rumor_step_wilbert_larcaniste_1',
        ],
    ];
}
