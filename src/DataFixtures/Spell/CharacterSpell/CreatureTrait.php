<?php

namespace App\DataFixtures\Spell\CharacterSpell;

use App\Entity\Character\Creature;

trait CreatureTrait
{
    const CREATURES_SPELLS = [
        [
            'character' => 'creature_sirene',
            'characterClass' => Creature::class,
            'spell' => 'spell_charm_hypnotic',
            'level' => 2,
            'manaCost' => 5,
            'durationBonus' => 1,
        ],
    ];
}
