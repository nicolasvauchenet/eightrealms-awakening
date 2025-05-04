<?php

namespace App\DataFixtures\Character\Creature;

trait FantomeTrait
{
    const FANTOME_CREATURES = [
        [
            'name' => 'Fantôme',
            'picture' => 'img/core/creature/fantome.png',
            'thumbnail' => 'img/core/creature/fantome_thumb.png',
            'description' => "<p>Une forme pâle flotte devant vous, les pieds juste au-dessus du sol… Sa tête penche sur le côté. Ses yeux vides vous fixent et semblent regarder à l'intérieur de vous.</p>",
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
            'reference' => 'creature_fantome',
        ],
        [
            'name' => 'Âme en peine',
            'picture' => 'img/core/creature/ame-en-peine.png',
            'thumbnail' => 'img/core/creature/ame-en-peine_thumb.png',
            'description' => "<p>Une forme pâle flotte devant vous, les pieds juste au-dessus du sol… Sa tête penche sur le côté. Ses yeux vides vous fixent et semblent regarder à l'intérieur de vous.</p>",
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
            'reference' => 'creature_ame-en-peine',
        ],
    ];
}
