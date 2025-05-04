<?php

namespace App\DataFixtures\Spell\CharacterSpell;

use App\Entity\Character\Npc;

trait DruidTrait
{
    const DRUID_SPELLS = [
        [
            'character' => 'npc_druide',
            'characterClass' => Npc::class,
            'spell' => 'spell_iceball',
            'level' => 2,
            'manaCost' => 5,
            'amountBonus' => 5,
        ],
        [
            'character' => 'npc_druide',
            'characterClass' => Npc::class,
            'spell' => 'spell_entangling_roots',
            'level' => 2,
            'manaCost' => 5,
            'durationBonus' => 5,
        ],
    ];
}
