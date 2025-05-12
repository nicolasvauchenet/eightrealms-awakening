<?php

namespace App\DataFixtures\Location\Location;

trait PloucTrait
{
    const PLOUC_LOCATIONS = [
        // Lieu
        [
            'name' => 'Plouc',
            'picture' => 'img/chapter1/location/plouc.webp',
            'description' => "<p>Le village de pêcheurs de Plouc est un endroit reculé, situé à quelques lieues de Port Saint-Doux. Les habitants, simples et rustiques, vivent de la pêche et de la chasse, loin de l'agitation de la capitale. Les maisons en bois et en torchis s'alignent le long de la côte, où un semblant d'embarcadère semble servir de port de pêche. Les villageois vous regardent d'un air méfiant, et s'en remettent à leurs occupations.</p>",
            'type' => 'location',
            'parent' => 'location_realm_royaume_de_l_ile_du_nord',
            'map' => 'map_plouc',
            'reference' => 'location_plouc',
        ],

        // Zone
        [
            'name' => 'Maison de Gérard le Pêcheur',
            'picture' => 'img/chapter1/location/maison-de-gerard-le-pecheur.webp',
            'description' => "<p>Cette bicoque en bois est la maison de Gérard, un pêcheur du village de Plouc. Les murs sont couverts de filets de pêche et de trophées de pêche, et une odeur de poisson rance flotte dans l'air.</p>",
            'type' => 'building',
            'thumbnail' => 'img/core/location/maison_thumb.png',
            'parent' => 'location_plouc',
            'reference' => 'location_building_maison_de_gerard_le_pecheur',
        ],
        [
            'name' => 'Campement gobelin',
            'picture' => 'img/chapter1/location/campement-gobelin.webp',
            'description' => "<p>Une odeur âcre flotte dans l’air, mélange de cendres froides, de viande tournant sous les braises, et de bêtes mal lavées. Devant vous, le campement gobelin s’étale comme une verrue sur la clairière&nbsp;:&nbsp;des barricades grossières, faites de branchages entremêlés, encore garnis de feuilles mortes, dessinent un cercle irrégulier autour de plusieurs tentes à moitié effondrées. Une tente plus grande, couverte de peaux mal tannées et entourée de deux guerriers gobelins à l'air nerveux, trône au centre, flanquée d’un feu de camp aux flammes rougeoyantes, parmi quelques ossements.</p><p>Tout respire la précarité, le bricolage et l’urgence. Des tas d’immondices s’accumulent entre les tentes, et on entend au loin le couinement nerveux d’une créature attachée.</p>",
            'type' => 'zone',
            'thumbnail' => 'img/core/location/camp_thumb.png',
            'parent' => 'location_plouc',
            'reference' => 'location_zone_campement_gobelin',
        ],
    ];
}
