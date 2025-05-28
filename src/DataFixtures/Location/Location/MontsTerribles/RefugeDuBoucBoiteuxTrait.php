<?php

namespace App\DataFixtures\Location\Location\MontsTerribles;

trait RefugeDuBoucBoiteuxTrait
{
    const REFUGE_DU_BOUC_BOITEUX_LOCATIONS = [
        // Lieu
        [
            'name' => 'Refuge du Bouc Boiteux',
            'picture' => 'img/chapter1/location/refuge-du-bouc-boiteux.webp',
            'description' => "<p>Perché sur une corniche étroite, ce vieux refuge de chasseurs semble abandonné depuis des années. Pourtant, on y trouve toujours du bois sec et des restes de repas récents. Le soir, des traces de sabots solitaires apparaissent dans la neige devant la porte…</p><p>Le nom viendrait d’un animal de légende, gardien farouche des lieux.</p>",
            'type' => 'zone',
            'parent' => 'location_monts_terribles',
            'reference' => 'location_zone_refuge_du_bouc_boiteux',
        ],

        // Bâtiment
        [
            'name' => 'Le Refuge',
            'picture' => 'img/chapter1/location/le-refuge.webp',
            'description' => "<p>Une unique pièce, simple et austère. Lit de bois contre le mur, table centrale avec une assiette sale, un bol fendu, une cuillère tordue. Au fond, un foyer de pierres noircies abrite des braises presque mortes. L’air sent le bois brûlé et l’oubli. Sur une chaise, un vieux manteau. Et sur la table, un carnet froissé, griffonné de mots confus.</p><p>Tout semble prêt à accueillir un voyageur… ou à témoigner d’un départ qu’on n’a jamais vraiment osé prendre.</p>",
            'type' => 'building',
            'thumbnail' => 'img/core/location/maison_thumb.png',
            'parent' => 'location_zone_refuge_du_bouc_boiteux',
            'reference' => 'location_building_le_refuge',
        ],
    ];
}
