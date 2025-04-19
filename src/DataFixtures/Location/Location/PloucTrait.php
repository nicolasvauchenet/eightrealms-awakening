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
            'picture' => 'img/core/location/maison-pecheur.webp',
            'description' => "<p>Cette bicoque en bois est la maison de Gérard, un pêcheur du village de Plouc. Les murs sont couverts de filets de pêche et de trophées de pêche, et une odeur de poisson rance flotte dans l'air. Gérard vous accueille avec un sourire timide, et vous invite à entrer…</p>",
            'type' => 'building',
            'thumbnail' => 'img/core/location/maison_thumb.png',
            'parent' => 'location_plouc',
            'reference' => 'location_building_maison_de_gerard_le_pecheur',
        ],
    ];
}
