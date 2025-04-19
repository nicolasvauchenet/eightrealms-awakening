<?php

namespace App\DataFixtures\Character\Race;

trait CreatureTrait
{
    const CREATURE_RACES = [
        [
            'name' => 'Rat',
            'playable' => false,
            'reference' => 'race_rat',
        ],
        [
            'name' => 'Gobelin',
            'playable' => false,
            'reference' => 'race_gobelin',
        ],
        [
            'name' => 'Sirène',
            'playable' => false,
            'reference' => 'race_sirene',
        ],
    ];
}
