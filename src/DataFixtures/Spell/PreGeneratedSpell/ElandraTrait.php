<?php

namespace App\DataFixtures\Spell\PreGeneratedSpell;

use App\Entity\Character\PreGenerated;

trait ElandraTrait
{
    const ELANDRA_SPELLS = [
        [
            'character' => 'character_elandra',
            'characterClass' => PreGenerated::class,
            'spell' => 'spell_fireball',
            'level' => 2,
            'manaCost' => 5,
            'amountBonus' => 5,
            'areaBonus' => 1,
            'durationBonus' => 0,
        ],
        [
            'character' => 'character_elandra',
            'characterClass' => PreGenerated::class,
            'spell' => 'spell_iceball',
            'level' => 1,
            'manaCost' => 0,
            'amountBonus' => 0,
            'areaBonus' => 0,
            'durationBonus' => 0,
        ],
        [
            'character' => 'character_elandra',
            'characterClass' => PreGenerated::class,
            'spell' => 'spell_arcane_nova',
            'level' => 1,
            'manaCost' => 0,
            'amountBonus' => 0,
            'areaBonus' => 0,
            'durationBonus' => 0,
        ],
        [
            'character' => 'character_elandra',
            'characterClass' => PreGenerated::class,
            'spell' => 'spell_shield',
            'level' => 1,
            'manaCost' => 0,
            'amountBonus' => 0,
            'areaBonus' => 0,
            'durationBonus' => 0,
        ],
        [
            'character' => 'character_elandra',
            'characterClass' => PreGenerated::class,
            'spell' => 'spell_invisibility',
            'level' => 1,
            'manaCost' => 0,
            'amountBonus' => 0,
            'areaBonus' => 0,
            'durationBonus' => 0,
        ],
        [
            'character' => 'character_elandra',
            'characterClass' => PreGenerated::class,
            'spell' => 'spell_ice_wall',
            'level' => 1,
            'manaCost' => 0,
            'amountBonus' => 0,
            'areaBonus' => 0,
            'durationBonus' => 0,
        ],
    ];
}
