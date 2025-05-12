<?php

namespace App\DataFixtures\Location\Location\Plouc;

trait CampementGobelinTrait
{
    const CAMPEMENT_GOBELIN_LOCATIONS = [
        [
            'name' => 'Campement gobelin',
            'picture' => 'img/chapter1/location/campement-gobelin.webp',
            'description' => "<p>Une odeur âcre flotte dans l’air, mélange de cendres froides, de viande tournant sous les braises, et de bêtes mal lavées. Devant vous, le campement gobelin s’étale comme une verrue sur la clairière&nbsp;:&nbsp;des barricades grossières, faites de branchages entremêlés, encore garnis de feuilles mortes, dessinent un cercle irrégulier autour de plusieurs tentes à moitié effondrées. Une tente plus grande, couverte de peaux mal tannées et entourée de deux guerriers gobelins à l'air nerveux, trône au centre, flanquée d’un feu de camp aux flammes rougeoyantes, parmi quelques ossements.</p><p>Tout respire la précarité, le bricolage et l’urgence. Des tas d’immondices s’accumulent entre les tentes, et on entend au loin le couinement nerveux d’une créature attachée.</p>",
            'type' => 'location',
            'thumbnail' => 'img/core/location/camp_thumb.png',
            'parent' => 'location_realm_royaume_de_l_ile_du_nord',
            'reference' => 'location_campement_gobelin',
        ],
    ];
}
