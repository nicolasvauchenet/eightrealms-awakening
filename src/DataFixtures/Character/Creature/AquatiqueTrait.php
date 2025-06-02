<?php

namespace App\DataFixtures\Character\Creature;

trait AquatiqueTrait
{
    const AQUATIC_CREATURES = [
        // Sirènes
        [
            'name' => 'Sirène',
            'picture' => 'img/core/creature/sirene.png',
            'thumbnail' => 'img/core/creature/sirene_thumb.png',
            'description' => "<p>Cette créature aquatique est connue pour sa beauté envoûtante et son chant mélodieux. Elle attire les marins vers les récifs avec sa voix enchanteresse.</p>",
            'strength' => 7,
            'dexterity' => 10,
            'constitution' => 8,
            'wisdom' => 10,
            'intelligence' => 12,
            'charisma' => 16,
            'healthMax' => 80,
            'manaMax' => 60,
            'fortune' => 0,
            'level' => 1,
            'race' => 'race_sirene',
            'reference' => 'creature_sirene',
        ],
        [
            'name' => 'Sirène Mélancolique',
            'picture' => 'img/core/creature/sirene-melancolique.png',
            'picture_angry' => 'img/core/creature/sirene-melancolique-angry.png',
            'thumbnail' => 'img/core/creature/sirene-melancolique_thumb.png',
            'description' => "<p>Cette créature surgie des flots n’a rien d’un monstre ordinaire. Son chant trouble les pensées, ses gestes sont lents, presque dansants.</p>",
            'strength' => 10,
            'dexterity' => 12,
            'constitution' => 10,
            'wisdom' => 14,
            'intelligence' => 16,
            'charisma' => 18,
            'healthMax' => 100,
            'manaMax' => 80,
            'fortune' => 0,
            'level' => 2,
            'race' => 'race_sirene',
            'reference' => 'creature_sirene_melancolique',
        ],
    ];
}
