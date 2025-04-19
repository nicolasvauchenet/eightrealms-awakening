<?php

namespace App\DataFixtures\Location\Location;

trait BoisDuPenduTrait
{
    const BOIS_DU_PENDU_LOCATIONS = [
        // Lieu
        [
            'name' => 'Bois du Pendu',
            'picture' => 'img/chapter1/location/bois-du-pendu.webp',
            'description' => "<p>Un sous-bois étrange, où les lianes pendent comme des cordes à nœud coulant, et où les feuilles semblent vous observer. L’air y est lourd, et le silence… presque vivant.</p><p>On raconte qu’ici, les morts murmurent aux arbres, et que ceux qui viennent les écouter ne reviennent jamais tout à fait les mêmes.</p>",
            'type' => 'location',
            'parent' => 'location_realm_royaume_de_l_ile_du_nord',
            'map' => 'map_bois_du_pendu',
            'reference' => 'location_bois_du_pendu',
        ],

        // Zone
        [
            'name' => "Clairière de l'Oublié",
            'picture' => 'img/chapter1/location/clairiere-de-loublie.webp',
            'description' => "<p>Une clairière baignée d’une lumière étrange, comme filtrée à travers un voile. Au centre, une pierre moussue couverte de gravures effacées marque l’emplacement d’un ancien rituel… ou d’un tombeau. On dit que celui qu’on a oublié y revient parfois, quand la forêt s’endort.</p>",
            'type' => 'zone',
            'parent' => 'location_bois_du_pendu',
            'reference' => 'location_zone_clairiere_de_loublie',
        ],
        [
            'name' => 'Bosquet des Druides',
            'picture' => 'img/chapter1/location/bosquet-des-druides.webp',
            'description' => "<p>Un cercle sacré, caché dans les recoins les plus sombres du Bois du Pendu. De grands arbres noueux forment une enceinte naturelle, au centre de laquelle veillent plusieurs druides vêtus de capes de mousse et de racines.</p><p>Ils n’aiment pas les intrus, mais tolèrent ceux qui approchent avec respect. Leur silence est pesant, leurs regards perçants… et leurs paroles, rares mais précieuses.</p>",
            'type' => 'zone',
            'parent' => 'location_bois_du_pendu',
            'reference' => 'location_zone_bosquet_des_druides',
        ],
        [
            'name' => 'Crique du Pendu',
            'picture' => 'img/chapter1/location/crique-du-pendu.webp',
            'description' => "<p>Là où le bois touche la mer, les rochers forment une crique isolée. Une vieille corde pourrie pend encore à une branche tordue, surplombant les vagues. On y trouve parfois des restes de barques brisées… ou des prières gravées dans l’écorce. Le vent y porte des chants qu’on préférerait ne pas comprendre.</p>",
            'type' => 'zone',
            'parent' => 'location_bois_du_pendu',
            'reference' => 'location_zone_crique_du_pendu',
        ],
    ];
}
