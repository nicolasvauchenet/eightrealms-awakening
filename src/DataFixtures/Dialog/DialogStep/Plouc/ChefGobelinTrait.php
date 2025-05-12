<?php

namespace App\DataFixtures\Dialog\DialogStep\Plouc;

trait ChefGobelinTrait
{
    const CHEF_GOBELIN_DIALOG_STEPS = [
        // Quête : Livraison en cours
        [
            'name' => 'Chef Gobelin - Rencontre',
            'text' => "<p>Le Chef Gobelin crache par terre et vous regarde de son air le plus menaçant.</p><p><em>Khhhk… Qu’est-ce que tu veux, l’gringalet&nbsp;? Tu t’es perdu dans les bois, p’tit fromage&nbsp;?</em></p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'livraison-en-cours',
                    'quest_step' => 3,
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_chef_gobelin',
            'reference' => 'quest_step_chef_gobelin_1',
        ],
        [
            'name' => 'Chef Gobelin - Quête',
            'text' => "<p>Il lève les mains au ciel, d'un air théâtral.</p><p><em>On l'attaque pas&nbsp;! On… on fouille un peu. On s’sert. On est pas des monstres, nous. Les pêcheurs, eux, y nous balancent des pierres&nbsp;! Khhhk… Même un poisson moisi, ils veulent pas partager.</em></p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'livraison-en-cours',
                    'quest_step' => 3,
                    'status' => 'progress',
                ],
            ],
            'dialog' => 'quest_chef_gobelin',
            'reference' => 'quest_step_chef_gobelin_2',
        ],
        [
            'name' => 'Chef Gobelin - Quête - Négociation',
            'text' => "<p>Le chef gobelin éclate d'un gros rire tonitruant. Les deux autres hésitent un instant, se regardent, et se joignent à lui.</p><p><em>T’as une belle langue pour un humain, mais j’parie qu’y t’écouteront pas, les gross'bottes du village. Khhhk… Mais vas-y, p’tit malin. Si tu r'viens, on t’écoutera… ptêt.</em></p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'livraison-en-cours',
                    'quest_step' => 3,
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'edit_quest_step_status' => [
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 3,
                        'status' => 'completed',
                    ],
                    // TEMP>
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 4,
                        'status' => 'skipped',
                    ],
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 5,
                        'status' => 'completed',
                    ],
                    // <TEMP
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 6,
                        'status' => 'skipped',
                    ],
                ],
                'start_quest_step' => [
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 7,
                    ],
                ],
            ],
            'dialog' => 'quest_chef_gobelin',
            'reference' => 'quest_step_chef_gobelin_3',
        ],
        [
            'name' => 'Chef Gobelin - Quête - Combat',
            'text' => "<p>Le chef gobelin éclate d'un gros rire tonitruant. Les deux autres se mettent en position de combat.</p><p><em>Khhhk… Ha&nbsp;! Tous vous êtes pareils, vous les grandes pattes&nbsp;! Vous vous prenez pour les plus forts, vous nous prenez pour des mioches. Hé ben allez, viens-y voir un peu… On t'attend, face de crevette.</em></p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'livraison-en-cours',
                    'quest_step' => 3,
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'edit_quest_step_status' => [
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 3,
                        'status' => 'completed',
                    ],
                    // TEMP>
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 4,
                        'status' => 'skipped',
                    ],
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 5,
                        'status' => 'completed',
                    ],
                    // <TEMP
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
                        'quest_step' => 6,
                    ],
                ],
            ],
            'dialog' => 'quest_chef_gobelin',
            'reference' => 'quest_step_chef_gobelin_4',
        ],
        [
            'name' => 'Chef Gobelin - Quête - Négociation terminée',
            'text' => "<p>Le Chef Gobelin crache par terre en rigolant.</p><p><em>Haha&nbsp;! Alors, mon p’tit moustique, t’as fait causer les gros-pêcheurs&nbsp;? Khhhk… T’as réussi ton baratin&nbsp;?</em></p><p>Il ouvre ses bras, peut-être en signe de respect, ou de reconnaissance, mais d'un air en tout cas amical.</p><p><em>Sacrées grandes pattes&nbsp;! Plus j'vous croise et plus j'm'étonne. On va bien s'tenir, t'inquiète, on va être sage comme des bouses. Tiens, j’te file un cadeau.</em></p><p>Il sort un anneau sale et poisseux, mais ce n'est apparemment pas une simple babiole..</p><p><em>C’est magique, ça. On m’voyait pas quand j’le portais. Maintenant j’en ai plus besoin. Tiens, j'te l'donne.</em></p>",
            'first' => true,
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'livraison-en-cours',
                    'quest_step' => 8,
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'add_items' => [
                    [
                        'item' => 'anneau-dinvisibilite',
                        'questItem' => false,
                    ],
                ],
            ],
            'dialog' => 'quest_chef_gobelin',
            'reference' => 'quest_step_chef_gobelin_5',
        ],
        [
            'name' => 'Chef Gobelin - Quête - Indice',
            'text' => "<p>Il vous toise un moment, se gratte le menton et se râcle la gorge.</p><p><em>Ah, et un truc… Khhhk… On a vu un vieux bonhomme, tout seul dans la forêt. Un roi, j’crois, ou un noble en tout cas. L'avait l'air vieux mais l'avait l'air riche. On l'a suivi dans l'idée de le… Enfin. Bref. On l'a suivi.</em></p><p><em>Y causait tout seul en marchant. Il gueulait contre son gamin. Il disait qu’il allait faire une connerie… Et il a causé d’un aut'bonhomme… Nashiiii… Nashintruc. On l’a suivi jusqu’au Col du Vent Noir, là-bas dans les Monts.</em></p><p>Apparemment fier de lui, il croise les bras sur sa grosse poitrine.</p><p><em>T'en fais c'que t'en veux. Nous on a des bagages à faire. Allez les gars&nbsp;! On y va.</em></p><p>Il marque un temps d'arrêt, comme s'il venait de se rendre qcompte de quelque chose d'important.</p><p><em>Z'avez pas vu les éclaireurs&nbsp;? Où qu'y sont encore ceux-là&nbsp;?</em></p>",
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'livraison-en-cours',
                    'quest_step' => 8,
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'reveal_location' => [
                    'monts-terribles',
                    'col-du-vent-noir',
                ],
                'edit_quest_step_status' => [
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 8,
                        'status' => 'completed',
                    ],
                    [
                        'quest' => 'livraison-en-cours',
                        'quest_step' => 9,
                        'status' => 'skipped',
                    ],
                ],
                'start_quest_step' => [
                    'quest' => 'livraison-en-cours',
                    'quest_step' => 10,
                ],
            ],
            'dialog' => 'quest_chef_gobelin',
            'reference' => 'quest_step_chef_gobelin_6',
        ],

        // Dialogue normal
        [
            'name' => 'Chef Gobelin - Dialogue',
            'text' => "<p>Le Chef Gobelin vous accueille avec un grand sourire.</p><p><em>On y est bien ici, avec les pêcheurs. Y sont pas si cruels que j'pensais, et on commence à s'connaître.</em></p>",
            'first' => true,
            'conditions' => [
                'quest_status' => [
                    'quest' => 'livraison-en-cours',
                    'status' => 'rewarded',
                ],
            ],
            'dialog' => 'dialog_chef_gobelin',
            'reference' => 'dialog_step_chef_gobelin_1',
        ],
    ];
}
