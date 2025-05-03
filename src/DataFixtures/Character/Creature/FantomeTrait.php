<?php

namespace App\DataFixtures\Character\Creature;

trait FantomeTrait
{
    const FANTOME_CREATURES = [
        [
            'name' => 'Fantôme du pendu',
            'picture' => 'img/core/creature/fantome.png',
            'thumbnail' => 'img/core/creature/fantome_thumb.png',
            'description' => "<p>Une forme pâle flotte devant vous, les pieds juste au-dessus du sol… ou de l’eau. Sa tête penche sur le côté. Et la corde, elle, est toujours là.</p>",
            'strength' => 7,
            'dexterity' => 12,
            'constitution' => 10,
            'wisdom' => 14,
            'intelligence' => 12,
            'charisma' => 8,
            'healthMax' => 90,
            'manaMax' => 40,
            'fortune' => 0,
            'level' => 5,
            'race' => 'race_fantome',
            'reference' => 'creature_fantome_pendu',
        ],
    ];
}
