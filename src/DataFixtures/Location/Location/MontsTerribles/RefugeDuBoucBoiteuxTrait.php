<?php

namespace App\DataFixtures\Location\Location\MontsTerribles;

trait RefugeDuBoucBoiteuxTrait
{
    const REFUGE_DU_BOUC_BOITEUX_LOCATIONS = [
        [
            'name' => 'Refuge du Bouc Boiteux',
            'picture' => 'img/chapter1/location/refuge-du-bouc-boiteux.webp',
            'description' => "<p>Perché sur une corniche étroite, ce vieux refuge de chasseurs semble abandonné depuis des années. Pourtant, on y trouve toujours du bois sec et des restes de repas récents. Le soir, des traces de sabots solitaires apparaissent dans la neige devant la porte…</p><p>Le nom viendrait d’un animal de légende, gardien farouche des lieux.</p>",
            'type' => 'zone',
            'parent' => 'location_monts_terribles',
            'reference' => 'location_zone_refuge_du_bouc_boiteux',
        ],
    ];
}
