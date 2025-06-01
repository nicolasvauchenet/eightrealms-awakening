<?php

namespace App\DataFixtures\Dialog\DialogStep\PortSaintDoux;

trait PecheurDuQuartierDesPloucsTrait
{
    const PECHEUR_DU_QUARTIER_DES_PLOUCS_DIALOG_STEPS = [
        // Dialogue normal
        [
            'name' => 'Pêcheur du Quartier des Ploucs - Dialogue',
            'text' => "<p><em>L'aut'jour chuis allé au quartier des Chauves pour la première fois d'ma vie&nbsp;! Et sûrement la dernière… Y'avait l'Maire qu'a convoqué tout le peuple de la cité, pour nous présenter la &laquo;Nouvelle Ville&raquo;. J'ai rien compris… Mais c'est point d'la nouvelle pour nous les pêcheurs, toute façon, alors voilà. On y foutra point les sabots, nous, dans leur nouvelle capitale. Déjà qu'on peut point s'promener partout où qu'on veut dans la vieille…</em></p>",
            'first' => true,
            'conditions' => [
                'location_unknown' => 'quartier-des-chauves',
            ],
            'dialog' => 'dialog_pecheur_du_quartier_des_ploucs',
            'reference' => 'dialog_step_pecheur_du_quartier_des_ploucs_1',
        ],
        [
            'name' => "Pêcheur du Quartier des Ploucs - Quartier des Chauves",
            'text' => "<p><em>Le quartier des Chauves&nbsp;! C'est l'quartier le plus bourgeois d'la capitale, voyons&nbsp;! Le Palais Royal, l'Hôtel de Ville, tous les aristos ont leur cabane là-bas&nbsp;! Enfin, quand j'dis &laquo;cabanes&raquo;, j'exagère hein. On parlerait plutôt de palaces, ouais&nbsp;!</em></p><p><em>Mais attention hein&nbsp;! C'est point tout l'monde qui peut s'y promener comme ça. Y'a des gardes de partout&nbsp;! Et des pas commodes en plus. Z'avez intérêt à vérifier vos s'melles de bottes si vous voulez trotter sur leurs pavés.</em></p>",
            'effects' => [
                'reveal_location' => 'quartier-des-chauves',
            ],
            'dialog' => 'dialog_pecheur_du_quartier_des_ploucs',
            'reference' => 'dialog_step_pecheur_du_quartier_des_ploucs_2',
        ],
        [
            'name' => 'Pêcheur du Quartier des Ploucs - Dialogue',
            'text' => "<p><em>L'a l'air gentil monsieur l'Maire. On y avait bien mangé là-bas à son discours… Bon, il est sévère comme tous les riches, mais faut l'comprendre&nbsp;:&nbsp;qu'est-ce qu'on ferait sans eux-autres, nous les habitants&nbsp;? Faut bien quelqu'un qui dirige tout c'bazar, avec de la poigne.</em></p>",
            'first' => true,
            'conditions' => [
                'location_known' => 'quartier-des-chauves',
            ],
            'dialog' => 'dialog_pecheur_du_quartier_des_ploucs',
            'reference' => 'dialog_step_pecheur_du_quartier_des_ploucs_3',
        ],

        // Ragots
        [
            'name' => 'Pêcheur du Quartier des Ploucs - Ragots',
            'text' => "<p><em>Les gens de Plouc, ils aiment pas trop qu'on s'tire du village pour aller vivre à la ville… Y comprennent pas qu'on veuille s'en aller pour vivre mieux, plus de confort, la santé, tout ça…</em></p><p>Il réfléchit un instant, puis avoue.</p><p><em>Ben en fait, y'a point tellement de tout ça ici… on est et on reste des Ploucs, surtout quand on s'côtoie aux gens biens d'la cité. J'me demande des fois si j'étais point mieux au village.</em></p>",
            'first' => true,
            'dialog' => 'rumor_pecheur_du_quartier_des_ploucs',
            'reference' => 'rumor_step_pecheur_du_quartier_des_ploucs_1',
        ],
    ];
}
