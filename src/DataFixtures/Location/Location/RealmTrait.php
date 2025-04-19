<?php

namespace App\DataFixtures\Location\Location;

trait RealmTrait
{
    const REALM_LOCATION = [
        [
            'name' => "Royaume de l'Île du Nord",
            'picture' => 'img/chapter1/location/royaume-de-lile-du-nord.webp',
            'description' => "<p>L'Île du Nord est un royaume prospère, dirigé par le roi Alaric. Les terres fertiles et les mines d'or font la richesse de ce petit royaume, qui attire commerçants et aventuriers en quête de fortune. Les habitants, fiers de leur patrie, sont réputés pour leur hospitalité et leur sens de l'honneur.</p>",
            'type' => 'realm',
            'map' => 'map_royaume_de_lile_du_nord',
            'reference' => 'location_realm_royaume_de_l_ile_du_nord',
        ],
    ];
}
