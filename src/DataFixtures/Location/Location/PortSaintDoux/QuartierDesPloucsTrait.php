<?php

namespace App\DataFixtures\Location\Location\PortSaintDoux;

trait QuartierDesPloucsTrait
{
    const QUARTIER_DES_PLOUCS_LOCATIONS = [
        [
            'name' => 'Quartier des Ploucs',
            'picture' => 'img/chapter1/location/quartier-des-ploucs.webp',
            'description' => "<p>Le quartier des Ploucs s'appelle ainsi parce qu'il a été bâti par les pêcheurs du village de Plouc, qui ont émigré à Port Saint-Doux pour fuir la misère. Les maisons sont modestes, construites en bois et en torchis, et les ruelles sont étroites et mal entretenues. Les habitants, pas toujours très richement vêtus, se pressent autour des étals des marchands, cherchant à troquer leur maigre pêche contre quelques pièces d'argent.</p>",
            'type' => 'zone',
            'parent' => 'location_port_saint_doux',
            'reference' => 'location_zone_quartier_des_ploucs',
        ],

        // Bâtiment
        [
            'name' => 'Arcanes de Port Saint-Doux',
            'picture' => 'img/chapter1/location/arcanes-de-port-saint-doux.webp',
            'description' => "<p>Les arcanes de Port Saint-Doux sont un lieu mystérieux, où les arcanistes étudient les secrets de la magie. Les étagères croulent sous les grimoires et les fioles d'élixirs, tandis que les apprentis s'entraînent à lancer des sorts. L'Arcaniste a toujours l'air affairé, et qu'il s'adresse à vous ou pas, il a un souvent sourire malicieux aux lèvres…</p>",
            'type' => 'building',
            'thumbnail' => 'img/core/location/arcanes_thumb.webp',
            'parent' => 'location_zone_quartier_des_ploucs',
            'reference' => 'location_building_arcanes_de_port_saint_doux',
        ],
    ];
}
