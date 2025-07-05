<?php

namespace App\DataFixtures\Dialog\DialogStep\PortSaintDoux;

trait WilbertLArcanisteTrait
{
    const WILBERT_L_ARCANISTE_DIALOG_STEPS = [
        // Quête principale : La note mystérieuse
        [
            'name' => "Wilbert - Note",
            'text' => "<p>Les bras chargés de parchemins, Wilbert vous fixe, tapote du pied, l’air contrarié.</p><p><em>Je n’ai pas toute la journée, vous savez. Si c’est encore pour me demander une potion d’amour ou un élixir contre la perte de cheveux…</em></p>",
            'first' => true,
            'conditions' => [
                'all' => [
                    [
                        'has_item' => 'note-anonyme',
                    ],
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 2,
                            'status' => 'progress',
                        ],
                    ],
                ],
            ],
            'dialog' => 'quest_main_wilbert_larcaniste',
            'reference' => 'quest_main_wilbert_larcaniste_1',
        ],
        [
            'name' => "Wilbert - Lecture de la note",
            'text' => "<p>Il saisit la note, la déroule d’un geste sec, sans cesser de vous regarder.</p><p><em>Hmm… Où avez-vous trouvé ça&nbsp;? Non, attendez. Ne me dites rien.</em></p><p>Il fronce les sourcils, déchiffre en silence… puis ses yeux s’illuminent.</p><p><em>Formidable&nbsp;! Une relique écrite dans l’ancien code de Galdric Ier. Un chef-d’œuvre d’ingéniosité et de secrets… On croyait ce langage perdu&nbsp;!</em></p><p>Sans vous demander, il roule la note et la glisse sous son bras, l’air de rien.</p>",
            'dialog' => 'quest_main_wilbert_larcaniste',
            'reference' => 'quest_main_wilbert_larcaniste_2',
        ],
        [
            'name' => "Wilbert - Traduction de la note",
            'text' => "<p>Il hausse les sourcils, faussement surpris.</p><p><em>Mais bien sûr que je peux la traduire&nbsp;! Voyons… Oui, c’est clair… Hmmm… Intéressant…</em></p><p>Il affiche un large sourire, à la fois content de lui et excité comme un gamin devant un puzzle antique.</p>",
            'dialog' => 'quest_main_wilbert_larcaniste',
            'reference' => 'quest_main_wilbert_larcaniste_3',
        ],
        [
            'name' => "Wilbert - Vexé",
            'text' => "<p>Wilbert vous fusille du regard. Il vous rend la note sans un mot, puis tourne les talons. Tout en marmonnant dans sa barbe, il se perd dans ses étagères, l’air blessé… et vexé comme un crapaud dans une flaque sèche.</p>",
            'effects' => [
                'edit_quest_step_status' => [
                    [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 1,
                        'status' => 'completed',
                    ],
                    [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 2,
                        'status' => 'completed',
                        'next' => 'skipped',
                    ],
                ],
            ],
            'dialog' => 'quest_main_wilbert_larcaniste',
            'reference' => 'quest_main_wilbert_larcaniste_4',
        ],
        [
            'name' => "Wilbert - Restitution de la note",
            'text' => "<p>Il se râcle la gorge.</p><p><em>Ça dit&nbsp;:&nbsp;&laquo;&nbsp;Les Druides savent… Le Rituel permet de passer de l’autre côté… Le Sceau ouvrira le Tombeau…&nbsp;&raquo;</em></p><p>Son visage se glace d'un coup. Il semble ne réaliser que maintenant ce qu'il vient de lire. Il vous regarde, les yeux écarquillés, incrédules. Vous décelez un peu de crainte dans son rictus tordu.</p><p><em>Le Donjon… de l'Âme… C'est… Impossible… Ce vieil endroit devait rester oublié. C'est interdit. Ce sont les affaires de la Couronne.</em></p><p>Baissant la voix, il continue.</p><p><em>Ces souvenirs-là ne doivent pas être remués à la légère. Ne cherchez pas davantage. Ce… Ce n'est rien. Rien de bon, pour vous, pour moi. Pour personne. Laissez tomber.</em></p><p>Il remet le parchemin sous son bras, visiblement pas décidé à vous le rendre, et pressé de mettre fin à cette discussion.</p>",
            'effects' => [
                'edit_quest_step_status' => [
                    [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 1,
                        'status' => 'completed',
                    ],
                    [
                        'quest' => 'les-disparus-du-donjon',
                        'quest_step' => 2,
                        'status' => 'completed',
                    ],
                ],
                'end_quest_step' => [
                    'quest' => 'les-disparus-du-donjon',
                    'quest_step' => 3,
                    'status' => 'completed',
                ],
                'remove_items' => [
                    'note-anonyme',
                ],
            ],
            'dialog' => 'quest_main_wilbert_larcaniste',
            'reference' => 'quest_main_wilbert_larcaniste_5',
        ],

        // Quête secondaire : La Fiole Perdue
        [
            'name' => "Wilbert - Fiole volée",
            'text' => "<p><em>Ma fiole&nbsp;! Une concoction d’essence de feu pur, stabilisée à grand-peine… envolée&nbsp;! Pas de traces de pas, pas d’empreintes… juste de petits tas de sable épars, comme déposés par le vent lui-même.</em></p><p><em>Quel genre de voleur laisse du désert derrière lui&nbsp;? Hmmm… Avec un esprit vif et le pas léger, moi je suivrais la piste vers les Sables Chauds…</em></p><p>Il relève le nez de ses réflexions, attendant visiblement une réponse de votre part…</p>",
            'first' => true,
            'conditions' => [
                'any' => [
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 3,
                            'status' => 'completed',
                        ],
                    ],
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 3,
                            'status' => 'skipped',
                        ],
                    ],
                ],
                'quest_not_started' => 'la-fiole-perdue',
            ],
            'dialog' => 'quest_secondary_wilbert_larcaniste',
            'reference' => 'quest_secondary_wilbert_larcaniste_1',
        ],
        [
            'name' => "Wilbert - Sable Chauds",
            'text' => "<p><em>Les Sables Chauds&nbsp;? À l’extrême sud-est de l’île. On y accède par les dunes au-delà des falaises rouges. Peu osent s’y aventurer, sauf les fous… et les désespérés.</em></p><p><em>Si ce voleur est ce que je crois, il n’a pas fui au hasard. Le désert attire ceux qui veulent disparaître… ou ceux qui cherchent à réveiller ce qui ne devrait pas l’être.</em></p>",
            'effects' => [
                'reveal_location' => 'sables-chauds',
            ],
            'dialog' => 'quest_secondary_wilbert_larcaniste',
            'reference' => 'quest_secondary_wilbert_larcaniste_2',
        ],
        [
            'name' => "Wilbert - Accepter la quête",
            'text' => "<p><em>Bonne chance. Et souvenez-vous&nbsp;:&nbsp;tout ce qui brille dans le sable n’est pas or… parfois, c’est pire. Revenez si vous survivez, je vous paierai pour vos efforts.</em></p>",
            'effects' => [
                'start_quest' => 'la-fiole-perdue',
            ],
            'dialog' => 'quest_secondary_wilbert_larcaniste',
            'reference' => 'quest_secondary_wilbert_larcaniste_3',
        ],
        [
            'name' => "Wilbert - Refuser la quête",
            'text' => "<p><em>Je vois. Je ne vous en tiens pas rigueur. Peu sont prêts à affronter le désert. Mais si un jour vous changez d’avis… ma porte est ouverte.</em></p>",
            'dialog' => 'quest_secondary_wilbert_larcaniste',
            'reference' => 'quest_secondary_wilbert_larcaniste_4',
        ],
        [
            'name' => "Wilbert - Quête en cours",
            'text' => "<p><em>Si ma fiole tombait entre de mauvaises mains, elle pourrait provoquer une catastrophe. Le désert est déjà assez dangereux sans ça. Restez sur vos gardes&nbsp;!</em></p>",
            'first' => true,
            'conditions' => [
                'all' => [
                    [
                        'quest_started' => 'la-fiole-perdue',
                    ],
                    [
                        'quest_step_status_not' => [
                            'quest' => 'la-fiole-perdue',
                            'quest_step' => 4,
                            'status' => 'progress',
                        ],
                    ],
                ],
            ],
            'dialog' => 'quest_secondary_wilbert_larcaniste',
            'reference' => 'quest_secondary_wilbert_larcaniste_5',
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
                'reward_quest' => 'la-fiole-perdue',
            ],
            'dialog' => 'quest_secondary_wilbert_larcaniste',
            'reference' => 'quest_secondary_wilbert_larcaniste_6',
        ],
        [
            'name' => "Wilbert - Médaillon des Vents",
            'text' => "<p><em>Ce… ce n’est pas un simple bijou. Il pulse… Il respire. C’est un artefact ancien, chargé d’énergie élémentaire. Je crois… Oui c'est ça&nbsp;:&nbsp; le Médaillons des Vents. Incroyable&nbsp;! On le croyait perdu… ou détruit.</em></p><p><em>Conservez-le. Il pourrait vous ouvrir des portes que nul ne voit encore.</em></p>",
            'effects' => [
                'start_quest_step' => [
                    'quest' => 'les-disparus-du-donjon',
                    'quest_step' => 7,
                ],
                'end_quest_step' => [
                    'quest' => 'les-disparus-du-donjon',
                    'quest_step' => 7,
                    'status' => 'completed',
                ],
            ],
            'dialog' => 'quest_secondary_wilbert_larcaniste',
            'reference' => 'quest_secondary_wilbert_larcaniste_7',
        ],

        // Quête principale : Explication
        [
            'name' => "Wilbert - Demande d'explications",
            'text' => "<p>Wilbert vous accueille avec un grand sourire, les bras pleins d’objets improbables.</p><p><em>Ah&nbsp;! Mon cher ami&nbsp;! Devinez quoi&nbsp;? J’ai réparé ma fiole&nbsp;! Il suffisait de concentrer les résidus d’essence et de… enfin, peu importe.</em></p><p>Il vous observe un instant.</p><p><em>Vous ne venez pas pour ça, n’est-ce pas&nbsp;?</em></p>",
            'first' => true,
            'conditions' => [
                'all' => [
                    [
                        'has_item' => 'medaillon-des-vents',
                    ],
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 7,
                            'status' => 'completed',
                        ],
                    ],
                    [
                        'quest_step_not_started' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 8,
                        ],
                    ],
                ],
            ],
            'dialog' => 'quest_main_wilbert_larcaniste',
            'reference' => 'quest_main_wilbert_larcaniste_6',
        ],
        [
            'name' => "Wilbert - Refus poli",
            'text' => "<p>Il lève un sourcil, l’air soudain méfiant.</p><p><em>Je vous l’ai dit&nbsp;:&nbsp;ce sont de vieilles histoires. Légendes, rumeurs… des contes de feu de camp, rien de plus.</em></p><p>Il tente un sourire, mais on sent qu’il veut détourner la conversation.</p><p><em>Les gens aiment se faire peur, vous savez. Surtout quand la réalité est trop ennuyeuse.</em></p>",
            'dialog' => 'quest_main_wilbert_larcaniste',
            'reference' => 'quest_main_wilbert_larcaniste_7',
        ],
        [
            'name' => "Wilbert - Refus ferme",
            'text' => "<p>Wilbert fronce les sourcils. Fini de plaisanter.</p><p><em>Il n’y a rien à dire. Vraiment rien. Et si quelque chose dort là-dessous… mieux vaut qu’il y reste.</em></p><p>Il attrape un parchemin au hasard et fait mine de s’y plonger pour mettre fin à la discussion.</p>",
            'dialog' => 'quest_main_wilbert_larcaniste',
            'reference' => 'quest_main_wilbert_larcaniste_8',
        ],
        [
            'name' => "Wilbert - Interpellation sur le Sceau",
            'text' => "<p>Il regarde le Médaillon que vous tenez, puis vous, puis le Médaillon à nouveau. Il soupire longuement.</p><p><em>Bon. Vous savez déjà trop de choses. Autant aller jusqu’au bout… Que savez-vous exactement&nbsp;?</em></p>",
            'dialog' => 'quest_main_wilbert_larcaniste',
            'reference' => 'quest_main_wilbert_larcaniste_9',
        ],
        [
            'name' => "Wilbert - Pas d'Explication",
            'text' => "<p>Il acquiesce d'un hochement de tête, mais n'ouvre pas la bouche, et se replonge dans son parchemin.</p>",
            'dialog' => 'quest_main_wilbert_larcaniste',
            'reference' => 'quest_main_wilbert_larcaniste_10',
        ],
        [
            'name' => "Wilbert - Révélation complète",
            'text' => "<p>Il fronce les sourcils, intrigué.</p><p><em>Le Rituel&nbsp;? Le Tombeau&nbsp;? Qui vous a parlé de ça&nbsp;? Bah, qu'importe.</em></p><p>Il réfléchit quelques instants, puis se décide enfin.</p><p><em>Vous avez appris beaucoup de choses, c'est vrai. Mais pas suffisamment pour comprendre, et en toute logique, vous n'y comprenez rien.</em></p><p><em>Le Médaillon des Vents est l'un des deux fragments du Sceau du Tombeau de Galdric 1er. Dans le Donjon de l'Âme. Où il est enterré. Enfin, probablement… Sa disparition reste un mystère. Les gens racontent qu'il aurait été touché par une… une malédiction, mais je n'y crois pas trop, personnellement.</em></p><p>Il enchaîne, sans vous laisser le temps d'ouvrir la bouche.</p><p><em>À cette époque nous étions au service de Galdric 1er, Gart, Robert, et moi-même. Le &laquo;&nbsp;Trio Royal&nbsp;&raquo;, qu'on aimait à s'appeler, entre nous. Fidèles serviteurs et conseillers de la Couronne. Gart, le Forgeron, Robert le Garde d'Élite, et moi, Magicien attitré.</em></p><p>Il pousse un soupir empreint de nostalgie.</p><p><em>Quand Galdric 1er a disparu, c'est son fils qui a pris la couronne. Ce n'était alors qu'un adolescent, vif, et fort, mais… si jeune. Nous l'avons épaulé, conseillé, nous avons rempli toutes sortes de missions à travers les Royaumes, pour l'aider à continuer l'œuvre de son père. L'unification du Royaume de l'Île du Nord, l'épanouissement de Port Saint-Doux, et l'enterrement définitif des troubles du passé.</em></p><p>Un petit sourire attendri vient soudain égayer son visage.</p><em>Puis il a grandi. Et il a fait de grandes choses. Il a consolidé les liens entre les peuples de l'île, bâti des quartiers entiers, il a fait de Port Saint-Doux une Capitale rayonnante, cosmopolite et riche en échanges, en commerce. Ces temps-là étaient bien motivants, bien joyeux…</em></p><p>Son visage s'assombrit de nouveau.</p><p><em>Mais les nuages noirs sont revenus au-dessus du Royaume. Galdric II s'est d'abord intéressé&nbsp;—&nbsp;en dépit de mes avertissements&nbsp;—&nbsp;aux vieilles légendes, au Donjon du nord, à la disparition de son père. Et il a trouvé. Le Sceau, qui n'avait été pour lui qu'une relique enfermée au fond des coffres du Trésor. Le Sceau du Tombeau. La malédiction emprisonnée, qu'il ne faut pas libérer, sous aucun prétexte.</em></p><p>Il marque un temps d'arrêt, puis reprend.</p><p><em>Il nous a écoutés, il était sage, ce roi. Sûrement le meilleur de tous les hommes que cette île ait fait naître. Gart a séparé le Sceau, et un des fragments a été volé peu de temps après… C'était le Médaillon des Vents, que vous venez de retrouver. Quant à l'autre, nul ne sait où il se trouve. Galdric II s'est arrangé pour le cacher à tout jamais. Même à nous, il n'a rien dit.</em></p><p>Fatigué, il s'assied, la tête baissée, perdu dans ses souvenirs. Il ne dira plus rien. Il attend que vous sortiez.</p>",
            'effects' => [
                'start_quest_step' => [
                    'quest' => 'les-disparus-du-donjon',
                    'quest_step' => 8,
                ],
                'end_quest_step' => [
                    'quest' => 'les-disparus-du-donjon',
                    'quest_step' => 8,
                    'status' => 'completed',
                ],
            ],
            'dialog' => 'quest_main_wilbert_larcaniste',
            'reference' => 'quest_main_wilbert_larcaniste_11',
        ],

        // Ragots
        [
            'name' => "Wilbert - Ragots",
            'text' => "<p><em>Port Saint-Doux est aveugle. Les gens rient, commercent, prient… pendant que des forces invisibles tirent les ficelles. Mais je les vois, moi. Je les entends. Et si vous ouvrez votre esprit, vous entendrez aussi… Oh, mais j’en oublie mes manières. Vous voulez un sort de lévitation ou une infusion pour la mémoire&nbsp;?</em></p>",
            'first' => true,
            'dialog' => 'rumor_wilbert_larcaniste',
            'reference' => 'rumor_wilbert_larcaniste_1',
        ],
    ];
}
