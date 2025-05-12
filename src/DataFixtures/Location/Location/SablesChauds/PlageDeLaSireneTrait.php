<?php

namespace App\DataFixtures\Location\Location\SablesChauds;

trait PlageDeLaSireneTrait
{
    const PLAGE_DE_LA_SIRENE_LOCATIONS = [
        [
            'name' => 'Plage de la Sirène',
            'picture' => 'img/chapter1/location/plage-de-la-sirene.webp',
            'description' => "<p>Ici, le désert rejoint la mer. Les vagues effleurent les dunes avec une lenteur étrange, comme si elles hésitaient à revenir. La brise y transporte un chant à peine audible, comme un appel oublié. On dit que c’est là qu’une promesse fut noyée… et qu’un objet précieux y repose toujours, enfoui dans le sable.</p>",
            'type' => 'zone',
            'parent' => 'location_sables_chauds',
            'reference' => 'location_zone_plage_de_la_sirene',
        ],
    ];
}
