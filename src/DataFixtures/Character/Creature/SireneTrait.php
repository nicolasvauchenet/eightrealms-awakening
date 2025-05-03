<?php

namespace App\DataFixtures\Character\Creature;

trait SireneTrait
{
    const SIRENE_CREATURES = [
        [
            'name' => 'Sirène',
            'picture' => 'img/core/creature/sirene.png',
            'picture_angry' => 'img/core/creature/sirene-angry.png',
            'thumbnail' => 'img/core/creature/sirene_thumb.png',
            'description' => "<p>Cette créature surgie des flots n’a rien d’un monstre ordinaire. Son chant trouble les pensées, ses gestes sont lents, presque dansants.</p>",
            'strength' => 10,
            'dexterity' => 13,
            'constitution' => 12,
            'wisdom' => 14,
            'intelligence' => 16,
            'charisma' => 18,
            'healthMax' => 120,
            'manaMax' => 80,
            'fortune' => 0,
            'level' => 2,
            'race' => 'race_sirene',
            'reference' => 'creature_sirene',
        ],
    ];
}
