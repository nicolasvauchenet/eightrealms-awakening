<?php

namespace App\DataFixtures\Location\CharacterLocation\DonjonDeLAme;

use App\Entity\Character\Creature;

trait TombeauDeGladricPremierTrait
{
    const TOMBEAU_DE_GALDRIC_PREMIER_NPCS = [
        [
            'character' => 'creature_nashore',
            'characterClass' => Creature::class,
            'location' => 'location_zone_tombeau_de_galdric_premier',
            'conditions' => [
                'quest_status' => [
                    'quest' => 'les-disparus-du-donjon',
                    'status' => 'progress',
                ],
            ],
            'reference' => 'location_zone_tombeau_de_galdric_premier_nashore',
        ],
    ];
}
