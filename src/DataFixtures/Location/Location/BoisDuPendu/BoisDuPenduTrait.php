<?php

namespace App\DataFixtures\Location\Location\BoisDuPendu;

trait BoisDuPenduTrait
{
    const BOIS_DU_PENDU_LOCATIONS = [
        [
            'name' => 'Bois du Pendu',
            'picture' => 'img/chapter1/location/bois-du-pendu.webp',
            'description' => "<p>Un sous-bois étrange, où les lianes pendent comme des cordes à nœud coulant, et où les feuilles semblent vous observer. L’air y est lourd, et le silence… presque vivant.</p><p>On raconte qu’ici, les morts murmurent aux arbres, et que ceux qui viennent les écouter ne reviennent jamais tout à fait les mêmes.</p>",
            'type' => 'location',
            'parent' => 'location_realm_royaume_de_l_ile_du_nord',
            'map' => 'map_bois_du_pendu',
            'reference' => 'location_bois_du_pendu',
        ],
    ];
}
