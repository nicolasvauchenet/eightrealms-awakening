<?php

namespace App\DataFixtures\Dialog\DialogStep\PortSaintDoux;

trait PecheurDuQuartierDesPloucsTrait
{
    const PECHEUR_DU_QUARTIER_DES_PLOUCS_DIALOG_STEPS = [
        // Dialogue normal
        [
            'name' => 'Pêcheur du Quartier des Ploucs - Ragots',
            'text' => "<p><em>Les gens de Plouc, ils aiment pas trop qu'on s'tire du village pour aller vivre à la ville… Y comprennent pas qu'on veuille s'en aller pour vivre mieux, plus de confort, la santé, tout ça…</em></p><p>Il réfléchit un instant, puis avoue.</p><p><em>Ben en fait, y'a point tellement de tout ça ici… on est et on reste des Ploucs, surtout quand on s'côtoie aux gens biens d'la cité. J'me demande des fois si j'étais point mieux au village.</em></p>",
            'first' => true,
            'dialog' => 'dialog_pecheur_du_quartier_des_ploucs',
            'reference' => 'dialog_pecheur_du_quartier_des_ploucs_1',
        ],

        // Ragots : Quartier des Chauves
        [
            'name' => 'Pêcheur du Quartier des Ploucs - Quartier des Chauves',
            'text' => "<p><em>Dans quèques jours, j'vas aller au quartier des Chauves. Ça sera la première fois d'ma vie&nbsp;! Et sûrement la dernière…</em></p><p><em>Y'a l'Maire qu'organise un banquet dans la Mairie, pour fêter l'inauguration d'son &laquo;&nbsp;Quartier de la Nouvelle Ville&nbsp;&raquo;. Tout le monde est convié, qu'il a dit. Même nous autres les pêcheurs&nbsp;!</em></p><p>Il se renfrogne un court instant.</p><p><em>À dire vrai, j'm'en fous un peu, j'avoue… Mais y paraît qu'y aura du bon vin, et d'la musique. Et surtout, que la bouffe sera à volonté&nbsp;! J'vais p'têt aller y traîner mes galoches.</em></p>",
            'first' => true,
            'conditions' => [
                'quest_not_started' => 'banquet-inaugural',
            ],
            'dialog' => 'rumor_quartier_des_chauves_pecheur_du_quartier_des_ploucs',
            'reference' => 'rumor_quartier_des_chauves_pecheur_du_quartier_des_ploucs_1',
        ],
        [
            'name' => "Pêcheur du Quartier des Ploucs - Quartier des Chauves 2",
            'text' => "<p><em>L'Quartier des Chauves&nbsp;! C'est l'quartier le plus bourgeois d'la capitale, pardi&nbsp;! Le Palais Royal, l'Hôtel de Ville, tous les aristos y zont leur cabane là-bas&nbsp;! Enfin, quand j'dis des cabanes, j'exagère hein. On parlerait plutôt de palaces, ouais&nbsp;!</em></p><p><em>Mais attention hein&nbsp;! C'est point tout l'monde qui peut s'y promener comme ça. Y'a des gardes de partout&nbsp;! Et des pas commodes en plus. Z'avez intérêt à vérifier vos s'melles de bottes si vous voulez trotter sur leurs pavés.</em></p>",
            'effects' => [
                'reveal_location' => 'quartier-des-chauves',
            ],
            'dialog' => 'rumor_quartier_des_chauves_pecheur_du_quartier_des_ploucs',
            'reference' => 'rumor_quartier_des_chauves_pecheur_du_quartier_des_ploucs_2',
        ],
        [
            'name' => 'Pêcheur du Quartier des Ploucs - Quartier des Chauves',
            'text' => "<p><em>Ouais, tout l'monde. Même vous. On s'croisera p't'ête autour d'un godet&nbsp;?</em></p>",
            'dialog' => 'rumor_quartier_des_chauves_pecheur_du_quartier_des_ploucs',
            'reference' => 'rumor_quartier_des_chauves_pecheur_du_quartier_des_ploucs_3',
        ],

        // Ragots: Banquet Inaugural
        [
            'name' => 'Pêcheur du Quartier des Ploucs - Banquet Inaugural',
            'text' => "<p><em>Par tous les bigorneaux&nbsp;! J'me suis jamais autant régalé d'ma vie&nbsp;! J'vous jure, z'avez goûté à l'porcelet à la broche&nbsp;? J'en ai pris trois fois. Trois&nbsp;! Hahaha&nbsp;!</em></p><p>Il chancelle un peu, rattrape une table en riant, puis poursuit d’un air conspirateur.</p><p><em>Et l’vin… l’vin, mon gars… C’est pas d'la vinasse d'la Crique. C’est du nectar d'aristo. J'sais pas où qu'y l'ont choppé, mais j'vais m'trouver un tonneau à la fin, j'vous l'dis.</em></p><p>Il baisse la voix, soudain grave.</p><p><em>Et z'avez vu c’que l'Maire a autour du cou&nbsp;? Une drôle d'breloque, ça. On dirait presque un bijou magique… Ou un machin à ouvrir les portails, j'sais pas trop. Mais y brille… même à travers le vin&nbsp;!</em></p>",
            'first' => true,
            'conditions' => [
                'quest_status' => [
                    'quest' => 'banquet-inaugural',
                    'status' => 'progress',
                ],
            ],
            'effects' => [
                'edit_quest_step_status' => [
                    'quest' => 'banquet-inaugural',
                    'quest_step' => 1,
                    'status' => 'completed',
                ],
            ],
            'dialog' => 'rumor_pecheur_du_quartier_des_ploucs_banquet_inaugural',
            'reference' => 'rumor_pecheur_du_quartier_des_ploucs_banquet_inaugural_1',
        ],

        // Ragots
        [
            'name' => 'Pêcheur du Quartier des Ploucs - Maire',
            'text' => "<p><em>L'a l'air gentil monsieur l'Maire. Il a fait un chouette discours à son banquet… Bon, il est sévère comme tous les riches, mais faut l'comprendre&nbsp;:&nbsp;qu'est-ce qu'on ferait sans eux-autres, nous les habitants&nbsp;? Faut bien quelqu'un qui dirige tout c'bazar, avec de la poigne.</em></p>",
            'first' => true,
            'conditions' => [
                'all' => [
                    'location_known' => 'quartier-des-ploucs',
                    'quest_status_not' => [
                        'quest' => 'banquet-inaugural',
                        'status' => 'progress',
                    ],
                ],
            ],
            'dialog' => 'rumor_pecheur_du_quartier_des_ploucs',
            'reference' => 'rumor_pecheur_du_quartier_des_ploucs_1',
        ],
    ];
}
