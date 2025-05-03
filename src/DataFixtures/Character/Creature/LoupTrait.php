<?php

namespace App\DataFixtures\Character\Creature;

trait LoupTrait
{
    const LOUP_CREATURES = [
        [
            'name' => 'Loup affamé',
            'picture' => 'img/core/creature/loup.png',
            'thumbnail' => 'img/core/creature/loup_thumb.png',
            'description' => "<p>Un grognement rauque brise le silence. Entre les troncs, deux yeux jaunes brillent… et d’autres suivent dans l’ombre.</p>",
            'strength' => 11,
            'dexterity' => 13,
            'constitution' => 9,
            'wisdom' => 10,
            'intelligence' => 5,
            'charisma' => 5,
            'healthMax' => 70,
            'manaMax' => 0,
            'fortune' => 0,
            'level' => 3,
            'race' => 'race_loup',
            'reference' => 'creature_loup_affame',
        ],
    ];
}
