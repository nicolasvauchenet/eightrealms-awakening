<?php

namespace App\DataFixtures\Location\Location\BoisDuPendu;

trait CriqueDuPenduTrait
{
    const CRIQUE_DU_PENDU_LOCATIONS = [
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
