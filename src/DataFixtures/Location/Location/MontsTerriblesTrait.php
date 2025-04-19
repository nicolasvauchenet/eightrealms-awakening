<?php

namespace App\DataFixtures\Location\Location;

trait MontsTerriblesTrait
{
    const MONTS_TERRIBLES_LOCATIONS = [
        // Lieu
        [
            'name' => 'Monts Terribles',
            'picture' => 'img/chapter1/location/monts-terribles.webp',
            'description' => "<p>Les Monts Terribles dressent leurs cimes déchiquetées au centre de l'île. Aucun sentier sûr ne serpente entre leurs parois abruptes, et les voyageurs y avancent à leurs risques et périls, au milieu des bourrasques glaciales et des éboulis traîtres. Autrefois, les nains y extrayaient de précieux minerais, mais leurs mines ont été abandonnées, et nul ne sait vraiment pourquoi. On raconte que les pierres elles-mêmes hurlent lorsque le vent se lève…</p>",
            'type' => 'location',
            'parent' => 'location_realm_royaume_de_l_ile_du_nord',
            'map' => 'map_monts_terribles',
            'reference' => 'location_monts_terribles',
        ],

        // Zone
        [
            'name' => 'Col du Vent Noir',
            'picture' => 'img/chapter1/location/col-du-vent-noir.webp',
            'description' => "<p>Premier passage vers les hauteurs des Monts Terribles, le Col du Vent Noir est balayé par des bourrasques si violentes qu’elles emportent parfois les plus imprudents dans le vide. Aucun arbre ne pousse ici, seulement des pierres battues par les intempéries et des vestiges d’anciens cairns, empilés par des voyageurs dont personne ne se souvient.</p><p>On dit que ceux qui traversent le col doivent prouver leur courage ou se perdre dans les nuages…</p>",
            'type' => 'zone',
            'parent' => 'location_monts_terribles',
            'reference' => 'location_zone_col_du_vent_noir',
        ],
        [
            'name' => 'Grotte des Échos',
            'picture' => 'img/chapter1/location/grotte-des-echos.webp',
            'description' => "<p>Creusée dans la roche noire, la Grotte des Échos renvoie les moindres sons avec un étrange décalage, comme si d'autres voix répétaient vos paroles dans une langue oubliée. Les anciens mineurs disent qu’elle mène à un réseau souterrain encore inexploré, mais nul n’a osé aller au-delà des premiers boyaux.</p>",
            'type' => 'zone',
            'parent' => 'location_monts_terribles',
            'reference' => 'location_zone_grotte_des_echos',
        ],
        [
            'name' => 'Refuge du Bouc Boiteux',
            'picture' => 'img/chapter1/location/refuge-du-bouc-boiteux.webp',
            'description' => "<p>Perché sur une corniche étroite, ce vieux refuge de chasseurs semble abandonné depuis des années. Pourtant, on y trouve toujours du bois sec et des restes de repas récents. Le soir, des traces de sabots solitaires apparaissent dans la neige devant la porte…</p><p>Le nom viendrait d’un animal de légende, gardien farouche des lieux.</p>",
            'type' => 'zone',
            'parent' => 'location_monts_terribles',
            'reference' => 'location_zone_refuge_du_bouc_boiteux',
        ],
        [
            'name' => 'Rocher du Dragon',
            'picture' => 'img/chapter1/location/rocher-du-dragon.webp',
            'description' => "<p>Dressé comme une griffe géante plantée dans la montagne, le Rocher du Dragon surplombe un précipice silencieux. Les anciens disent qu’un dragon de pierre y sommeille depuis des siècles, figé dans la roche par un antique sortilège. Parfois, la nuit, des grondements résonnent dans les falaises…</p><p>Certains aventuriers affirment avoir vu des écailles briller sous la lune, d’autres n’en sont jamais revenus.</p>",
            'type' => 'zone',
            'parent' => 'location_monts_terribles',
            'reference' => 'location_zone_rocher_du_dragon',
        ],
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
