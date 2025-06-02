<?php

namespace App\DataFixtures\Character\Creature;

trait LegendaireTrait
{
    const LEGENDARY_CREATURES = [
        // Dragons
        [
            'name' => 'Dragon de Pierre',
            'picture' => 'img/core/creature/dragon-de-pierre.png',
            'thumbnail' => 'img/core/creature/dragon-de-pierre_thumb.png',
            'description' => "<p>Le roc s’est fissuré. Lentement, une forme se détache de la paroi. Deux yeux s’ouvrent dans la pierre. Le souffle est grave, ancien. Quelque chose s’éveille…</p>",
            'strength' => 18,
            'dexterity' => 10,
            'constitution' => 20,
            'wisdom' => 14,
            'intelligence' => 16,
            'charisma' => 12,
            'healthMax' => 300,
            'manaMax' => 150,
            'fortune' => 50,
            'level' => 12,
            'race' => 'race_dragon',
            'reference' => 'creature_dragon_de_pierre',
        ],
    ];
}

