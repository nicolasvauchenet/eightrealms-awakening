<?php

namespace App\DataFixtures\Character\Race;

trait PlayableTrait
{
    const PLAYABLE_RACES = [
        [
            'name' => 'Humain',
            'playable' => true,
            'reference' => 'race_humain',
        ],
        [
            'name' => 'Elfe',
            'playable' => true,
            'reference' => 'race_elfe',
        ],
        [
            'name' => 'Nain',
            'playable' => true,
            'reference' => 'race_nain',
        ],
        [
            'name' => 'Orque',
            'playable' => true,
            'reference' => 'race_orque',
        ],
        [
            'name' => 'Halfelin',
            'playable' => true,
            'reference' => 'race_halfelin',
        ],
        [
            'name' => 'Gnome',
            'playable' => true,
            'reference' => 'race_gnome',
        ],
    ];
}
