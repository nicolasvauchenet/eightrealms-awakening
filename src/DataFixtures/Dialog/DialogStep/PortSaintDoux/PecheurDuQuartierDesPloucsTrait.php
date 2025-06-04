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
            'text' => "<p><em>Dans quèques jours, j'vas aller au quartier des Chauves. Ça sera la première fois d'ma vie&nbsp;! Et sûrement la dernière… Y'a l'Maire qu'a convoqué tout le peuple de la cité, pour nous présenter la &laquo;&nbsp;Nouvelle Ville&nbsp;&raquo;.</em></p><p><em>J'm'en fous un peu, j'avoue… C'est point d'la nouvelle pour nous les pêcheurs, toute façon, alors voilà. On y foutra point les orteils, nous, dans leur nouvelle capitale. Déjà qu'on peut point s'promener partout où qu'on veut dans la normale…</em></p>",
            'first' => true,
            'conditions' => [
                'location_unknown' => 'quartier-des-chauves',
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

        // Ragots
        [
            'name' => 'Pêcheur du Quartier des Ploucs - Maire',
            'text' => "<p><em>L'a l'air gentil monsieur l'Maire. On y avait bien mangé là-bas à son discours… Bon, il est sévère comme tous les riches, mais faut l'comprendre&nbsp;:&nbsp;qu'est-ce qu'on ferait sans eux-autres, nous les habitants&nbsp;? Faut bien quelqu'un qui dirige tout c'bazar, avec de la poigne.</em></p>",
            'first' => true,
            'conditions' => [
                'location_known' => 'quartier-des-chauves',
                'any' => [
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 11,
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 11,
                            'status' => 'completed',
                        ],
                    ],
                ],
            ],
            'dialog' => 'rumor_pecheur_du_quartier_des_ploucs',
            'reference' => 'rumor_pecheur_du_quartier_des_ploucs_1',
        ],
    ];
}
