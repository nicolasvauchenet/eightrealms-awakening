<?php

namespace App\DataFixtures\Location\Location\BoisDuPendu;

trait BosquetDesDruidesTrait
{
    const BOSQUET_DES_DRUIDES_LOCATIONS = [
        [
            'name' => 'Bosquet des Druides',
            'picture' => 'img/chapter1/location/bosquet-des-druides.webp',
            'description' => "<p>Un cercle sacré, caché dans les recoins les plus sombres du Bois du Pendu. De grands arbres noueux forment une enceinte naturelle, au centre de laquelle veillent plusieurs druides vêtus de capes de mousse et de racines.</p><p>Ils n’aiment pas les intrus, mais tolèrent ceux qui approchent avec respect. Leur silence est pesant, leurs regards perçants… et leurs paroles, rares mais précieuses.</p>",
            'type' => 'zone',
            'parent' => 'location_bois_du_pendu',
            'reference' => 'location_zone_bosquet_des_druides',
        ],
    ];
}
