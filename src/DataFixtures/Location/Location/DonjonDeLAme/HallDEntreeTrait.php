<?php

namespace App\DataFixtures\Location\Location\DonjonDeLAme;

trait HallDEntreeTrait
{
    const HALL_D_ENTREE_LOCATIONS = [
        [
            'name' => "Hall d'entrée",
            'picture' => 'img/chapter1/location/hall-dentree.webp',
            'description' => "<p>Le silence règne dans cette vaste salle de pierre, où la poussière danse paresseusement dans les rais de lumière filtrant depuis des fissures invisibles. Le sol est parsemé de traces de pas récentes, mais brouillées… par la précipitation ou autre chose. Au fond, un couloir s’ouvre dans l’ombre, comme une invitation malavisée à s’aventurer plus loin.</p>",
            'type' => 'zone',
            'parent' => 'location_donjon_de_l_ame',
            'reference' => 'location_zone_hall_d_entree',
        ],
    ];
}
