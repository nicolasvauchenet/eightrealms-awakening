<?php

namespace App\DataFixtures\Location\Location;

trait ExternalTrait
{
    const EXTERNAL_LOCATIONS = [
        [
            'name' => 'Plaine',
            'picture' => 'img/core/location/plain.webp',
            'description' => "<p>Une vaste plaine s'étend à perte de vue, couverte d'herbes hautes et de fleurs sauvages. Au loin, on distingue une forêt sombre, où les arbres se dressent comme des sentinelles. Le vent souffle doucement, faisant onduler les hautes herbes, et le soleil brille dans un ciel sans nuages.</p>",
            'type' => 'plain',
            'parent' => 'location_realm_royaume_de_l_ile_du_nord',
            'reference' => 'location_plain',
        ],
    ];
}
