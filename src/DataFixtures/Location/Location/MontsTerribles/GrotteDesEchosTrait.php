<?php

namespace App\DataFixtures\Location\Location\MontsTerribles;

trait GrotteDesEchosTrait
{
    const GROTTE_DES_ECHOS_LOCATIONS = [
        [
            'name' => 'Grotte des Échos',
            'picture' => 'img/chapter1/location/grotte-des-echos.webp',
            'description' => "<p>Creusée dans la roche noire, la Grotte des Échos renvoie les moindres sons avec un étrange décalage, comme si d'autres voix répétaient vos paroles dans une langue oubliée. Les anciens mineurs disent qu’elle mène à un réseau souterrain encore inexploré, mais nul n’a osé aller au-delà des premiers boyaux.</p>",
            'type' => 'zone',
            'parent' => 'location_monts_terribles',
            'reference' => 'location_zone_grotte_des_echos',
        ],
    ];
}
