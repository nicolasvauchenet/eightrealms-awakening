<?php

namespace App\DataFixtures\Location\Location\PortSaintDoux;

trait DocksDeLOuestTrait
{
    const DOCKS_DE_L_OUEST_LOCATIONS = [
        // Zone
        [
            'name' => "Docks de l'Ouest",
            'picture' => 'img/chapter1/location/docks-de-louest.webp',
            'description' => "<p>Les Docks de l'Ouest de Port Saint-Doux sont le cœur vibrant du port, où pêcheurs, marchands et passants animent la scène parmi les quais neufs et les bateaux amarrés. On y trouve la taverne de la Flûte Moisie, un lieu bruyant et chaleureux, idéal pour se détendre, boire une bière et observer l'agitation des docks.</p>",
            'type' => 'zone',
            'parent' => 'location_port_saint_doux',
            'reference' => 'location_zone_docks_de_l_ouest',
        ],

        // Bâtiment
        [
            'name' => 'Taverne de la Flûte Moisie',
            'picture' => 'img/chapter1/location/taverne-de-la-flute-moisie.webp',
            'description' => "<p>La Taverne de la Flûte Moisie est un lieu bruyant et chaleureux, où les marins et les aventuriers viennent se détendre après une longue journée de travail. Les tables en bois massif sont couvertes de chopes de bière et de plats fumants, et l'odeur de la soupe au poisson flotte dans l'air. Le Tavernier vous adresse un sourire cordial…</p>",
            'type' => 'building',
            'thumbnail' => 'img/core/location/taverne_thumb.webp',
            'parent' => 'location_zone_docks_de_l_ouest',
            'reference' => 'location_building_taverne_de_la_flute_moisie',
        ],
    ];
}
