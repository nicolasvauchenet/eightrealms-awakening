<?php

namespace App\DataFixtures\Location\Location\MontsTerribles;

trait GouffreDAskalorTrait
{
    const GOUFFRE_D_ASKALOR_LOCATIONS = [
        [
            'name' => 'Gouffre d’Askalor',
            'picture' => 'img/chapter1/location/gouffre-daskalor.webp',
            'description' => "<p>Un immense puits naturel, béant au cœur des Monts Terribles, réputé sans fond. On y jette parfois des prisonniers, parfois des offrandes, selon les superstitions du moment. Le vent qui remonte du gouffre ressemble à un souffle… ou à un râle.</p><p>On chuchote qu’Askalor y dort toujours, tapi dans l’obscurité.</p>",
            'type' => 'zone',
            'parent' => 'location_monts_terribles',
            'reference' => 'location_zone_gouffre_d_askalor',
        ],
    ];
}
