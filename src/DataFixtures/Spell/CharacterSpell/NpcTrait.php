<?php

namespace App\DataFixtures\Spell\CharacterSpell;

use App\Entity\Character\Npc;

trait NpcTrait
{
    const NPC_SPELLS = [
        // Druide
        [
            'character' => 'npc_druide',
            'characterClass' => Npc::class,
            'spell' => 'spell_entangling_roots',
            'level' => 1,
        ],

        // Grand Druide
        [
            'character' => 'npc_grand_druide',
            'characterClass' => Npc::class,
            'spell' => 'spell_iceball',
            'level' => 2,
            'manaCost' => 5,
            'amountBonus' => 1,
        ],
    ];
}
