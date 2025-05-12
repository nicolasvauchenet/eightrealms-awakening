<?php

namespace App\DataFixtures\Location\Location\PortSaintDoux;

trait PortSaintDouxTrait
{
    const PORT_SAINT_DOUX_LOCATIONS = [
        [
            'name' => 'Port Saint-Doux',
            'picture' => 'img/chapter1/location/port-saint-doux.webp',
            'description' => "<p>Port Saint-Doux est la capitale de l'Île du Nord, un port prospère où se croisent marchands, aventuriers et marins en quête de fortune. La ville est dirigée par le maire, un homme autoritaire mais juste, qui veille à maintenir l'ordre et la sécurité dans les rues animées de la cité.</p>",
            'type' => 'location',
            'parent' => 'location_realm_royaume_de_l_ile_du_nord',
            'map' => 'map_port_saint_doux',
            'reference' => 'location_port_saint_doux',
        ],
    ];
}
