<?php

namespace App\DataFixtures\Character\Creature;

trait SireneTrait
{
    const SIRENE_CREATURES = [
        [
            'name' => 'Sirène',
            'picture' => 'img/core/creature/sirene.png',
            'thumbnail' => 'img/core/creature/sirene_thumb.png',
            'description' => "<p>Cette créature surgie des flots n’a rien d’un monstre ordinaire. Son chant trouble les pensées, ses gestes sont lents, presque dansants.</p>",
            'strength' => 10,
            'dexterity' => 13,
            'constitution' => 12,
            'wisdom' => 14,
            'intelligence' => 16,
            'charisma' => 18,
            'healthMax' => 140,
            'manaMax' => 100,
            'fortune' => 0,
            'level' => 8,
            'race' => 'race_sirene',
            'reference' => 'creature_sirene',
        ],
    ];
}
