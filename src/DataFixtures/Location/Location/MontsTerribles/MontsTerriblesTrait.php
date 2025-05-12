<?php

namespace App\DataFixtures\Location\Location\MontsTerribles;

trait MontsTerriblesTrait
{
    const MONTS_TERRIBLES_LOCATIONS = [
        [
            'name' => 'Monts Terribles',
            'picture' => 'img/chapter1/location/monts-terribles.webp',
            'description' => "<p>Les Monts Terribles dressent leurs cimes déchiquetées au centre de l'île. Aucun sentier sûr ne serpente entre leurs parois abruptes, et les voyageurs y avancent à leurs risques et périls, au milieu des bourrasques glaciales et des éboulis traîtres. Autrefois, les nains y extrayaient de précieux minerais, mais leurs mines ont été abandonnées, et nul ne sait vraiment pourquoi. On raconte que les pierres elles-mêmes hurlent lorsque le vent se lève…</p>",
            'type' => 'location',
            'parent' => 'location_realm_royaume_de_l_ile_du_nord',
            'map' => 'map_monts_terribles',
            'reference' => 'location_monts_terribles',
        ],
    ];
}
