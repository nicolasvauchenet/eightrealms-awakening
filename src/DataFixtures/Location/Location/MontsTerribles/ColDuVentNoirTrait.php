<?php

namespace App\DataFixtures\Location\Location\MontsTerribles;

trait ColDuVentNoirTrait
{
    const COL_DU_VENT_NOIR_LOCATIONS = [
        [
            'name' => 'Col du Vent Noir',
            'picture' => 'img/chapter1/location/col-du-vent-noir.webp',
            'description' => "<p>Premier passage vers les hauteurs des Monts Terribles, le Col du Vent Noir est balayé par des bourrasques si violentes qu’elles emportent parfois les plus imprudents dans le vide. Aucun arbre ne pousse ici, seulement des pierres battues par les intempéries et des vestiges d’anciens cairns, empilés par des voyageurs dont personne ne se souvient.</p><p>On dit que ceux qui traversent le col doivent prouver leur courage ou se perdre dans les nuages…</p>",
            'type' => 'zone',
            'parent' => 'location_monts_terribles',
            'reference' => 'location_zone_col_du_vent_noir',
        ],
    ];
}
