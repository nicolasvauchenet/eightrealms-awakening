<?php

namespace App\DataFixtures\Location\Location\SablesChauds;

trait SablesChaudsTrait
{
    const SABLES_CHAUDS_LOCATIONS = [
        [
            'name' => 'Sables Chauds',
            'picture' => 'img/chapter1/location/sables-chauds.webp',
            'description' => "<p>Le désert des Sables Chauds s’étend jusqu’à l’horizon, bordé d’un côté par la mer et de l’autre par des falaises ocres. Les dunes y chantent au moindre souffle du vent. Des mirages dansent à la surface du sable, et les traces de pas s’effacent presque aussitôt. C’est un lieu oublié des cartes et des hommes, où les légendes se cachent dans les grains brûlants.</p>",
            'type' => 'location',
            'parent' => 'location_realm_royaume_de_l_ile_du_nord',
            'map' => 'map_sables_chauds',
            'reference' => 'location_sables_chauds',
        ],
    ];
}
