<?php

namespace App\DataFixtures\Character\Creature;

trait RatTrait
{
    const RAT_CREATURES = [
        [
            'name' => 'Gros rat',
            'picture' => 'img/core/creature/rat.png',
            'thumbnail' => 'img/core/creature/rat_thumb.png',
            'description' => "<p>Le rat est un animal nuisible qui se reproduit rapidement. Il est capable de transmettre des maladies et de causer des dégâts matériels. Il est important de s'en débarrasser rapidement.</p>",
            'strength' => 9,
            'dexterity' => 9,
            'constitution' => 8,
            'wisdom' => 7,
            'intelligence' => 10,
            'charisma' => 4,
            'healthMax' => 50,
            'manaMax' => 0,
            'fortune' => 0,
            'level' => 1,
            'race' => 'race_rat',
            'reference' => 'creature_gros_rat',
        ],
        [
            'name' => 'Rat géant',
            'picture' => 'img/core/creature/rat-geant.png',
            'thumbnail' => 'img/core/creature/rat-geant_thumb.png',
            'description' => "<p>Le rat est un animal nuisible qui se reproduit rapidement. Il est capable de transmettre des maladies et de causer des dégâts matériels. Il est important de s'en débarrasser rapidement.</p>",
            'strength' => 10,
            'dexterity' => 9,
            'constitution' => 10,
            'wisdom' => 7,
            'intelligence' => 12,
            'charisma' => 4,
            'healthMax' => 100,
            'manaMax' => 0,
            'fortune' => 0,
            'level' => 6,
            'race' => 'race_rat',
            'reference' => 'creature_rat_geant',
        ],
    ];
}
