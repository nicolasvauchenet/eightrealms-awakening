<?php

namespace App\DataFixtures\Character\Profession;

trait FightTrait
{
    const FIGHT_PROFESSIONS = [
        // Personnages
        [
            'name' => 'Barbare',
            'type' => 'fight',
            'playable' => true,
            'reference' => 'profession_barbare',
        ],
        [
            'name' => 'Guerrier',
            'type' => 'fight',
            'playable' => true,
            'reference' => 'profession_guerrier',
        ],
        [
            'name' => 'Chevalier',
            'type' => 'fight',
            'playable' => true,
            'reference' => 'profession_chevalier',
        ],
        [
            'name' => 'Archer',
            'type' => 'fight',
            'playable' => true,
            'reference' => 'profession_archer',
        ],
        [
            'name' => 'Rôdeur',
            'type' => 'fight',
            'playable' => true,
            'reference' => 'profession_rodeur',
        ],
        [
            'name' => 'Moine',
            'type' => 'fight',
            'playable' => true,
            'reference' => 'profession_moine',
        ],

        // Pnjs
        [
            'name' => 'Garde',
            'type' => 'fight',
            'playable' => false,
            'reference' => 'profession_garde',
        ],
        [
            'name' => 'malfrat',
            'type' => 'fight',
            'playable' => false,
            'reference' => 'profession_malfrat',
        ],
    ];
}
