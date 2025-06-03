<?php

namespace App\DataFixtures\Dialog\DialogStep\PortSaintDoux;

trait WilbertLArcanisteTrait
{
    const WILBERT_L_ARCANISTE_DIALOG_STEPS = [
        // Quête principale : La note mystérieuse
        [
            'name' => "Wilbert - Note",
            'text' => "<p>Les bras chargés de rouleaux de parchemins, le vieux gnome vous regarde et semble attendre que vous vous décidiez à parler. Au bout de quelques secondes, il commence à tapoter du pied.</p>",
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
            'text' => "<p>Il prend la note sans vous quitter du regard, un sourcil suspicieux levé, presque comiquement, en l'air. Puis il se penche dessus, fronce les sourcils et prend un air concentré.</p><p><em>Où avez-vous trouvé ça&nbsp;? Qu'importe. C'est le… un ancien langage d'un temps révolu… Je n'étais plus tombé dessus depuis… C'est formidable&nbsp;!</em></p><p>Il relève la tête d'un air tout excité.</p><p><em>C'est quasiment une relique&nbsp;! Le langage secret de Galdric 1er&nbsp;! Vous vous rendez compte&nbsp;? Cette note est un des derniers vestiges qui représente toute l'ingéniosité et l'intelligence de ce grand monarque&nbsp;!</em></p><p>Tout en parlant, il roule la note et la glisse sous son bras, avec les autres…</p>",
            'dialog' => 'quest_main_wilbert_larcaniste',
            'reference' => 'quest_main_wilbert_larcaniste_2',
        ],
        [
            'name' => "Wilbert - Traduction de la note",
            'text' => "<p>Il prend un air surpris mais ne semble pas du tout gêné. Il attrape la note du bout de deux doigts, et la rouvre.</p><p><em>Bien sûr que oui&nbsp;! Attendez… Voyons voir… Oui. C'est ça. Oui, je peux.</em></p><p>Il vous regarde d'un air satisfait, mais son regard montre clairement qu'à l'intérieur, il s'amuse comme un enfant.</p>",
            'dialog' => 'quest_main_wilbert_larcaniste',
            'reference' => 'quest_main_wilbert_larcaniste_3',
        ],
        [
            'name' => "Wilbert - Vexé",
            'text' => "<p>Son visage se fige tout à coup, puis se ferme. Vous l'avez apparemment vexé au plus haut point. Sans un mot, il vous rend la note, se retourne, et se met à farfouiller dans ses étagères en marmonnant dans sa barbe.</p>",
            'effects' => [
                'edit_quest_step_status' => [
                    'quest' => 'les-disparus-du-donjon',
                    'quest_step' => 2,
                    'status' => 'completed',
                    'next' => 'skipped',
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
                    'quest' => 'les-disparus-du-donjon',
                    'quest_step' => 2,
                    'status' => 'completed',
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
