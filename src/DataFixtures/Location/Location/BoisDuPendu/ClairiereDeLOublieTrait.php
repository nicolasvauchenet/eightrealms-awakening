<?php

namespace App\DataFixtures\Location\Location\BoisDuPendu;

trait ClairiereDeLOublieTrait
{
    const CLAIRIERE_DE_L_OUBLIE_LOCATIONS = [
        [
            'name' => "Clairière de l'Oublié",
            'picture' => 'img/chapter1/location/clairiere-de-loublie.webp',
            'description' => "<p>Une clairière baignée d’une lumière étrange, comme filtrée à travers un voile. Au centre, une pierre moussue couverte de gravures effacées marque l’emplacement d’un ancien rituel… ou d’un tombeau. On dit que celui qu’on a oublié y revient parfois, quand la forêt s’endort.</p>",
            'type' => 'zone',
            'parent' => 'location_bois_du_pendu',
            'reference' => 'location_zone_clairiere_de_loublie',
        ],
    ];
}
