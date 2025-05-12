<?php

namespace App\DataFixtures\Location\Location\SablesChauds;

trait CampAbandonneTrait
{
    const CAMP_ABANDONNE_LOCATIONS = [
        [
            'name' => 'Camp Abandonné',
            'picture' => 'img/chapter1/location/camp-abandonne.webp',
            'description' => "<p>Des toiles déchirées battent au vent. Le feu de camp est froid depuis longtemps. On trouve encore des restes d’objets, des notes griffonnées sur du cuir… mais aucune trace de ceux qui les ont laissés. Le silence y est oppressant, et le sable semble refuser de recouvrir cet endroit.</p>",
            'type' => 'zone',
            'parent' => 'location_sables_chauds',
            'reference' => 'location_zone_camp_abandonne',
        ],
    ];
}
