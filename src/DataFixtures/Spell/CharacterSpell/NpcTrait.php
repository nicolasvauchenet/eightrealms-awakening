<?php

namespace App\DataFixtures\Spell\CharacterSpell;

use App\Entity\Character\Npc;

trait NpcTrait
{
    const NPC_SPELLS = [
        // Théobald le Gris-Murmure
        [
            'character' => 'npc_theobald_le_gris_murmure',
            'characterClass' => Npc::class,
            'spell' => 'spell_giantstrength',
            'level' => 3,
            'manaCost' => 5,
            'amountBonus' => 15,
        ],
        [
            'character' => 'npc_theobald_le_gris_murmure',
            'characterClass' => Npc::class,
            'spell' => 'spell_shield',
            'level' => 3,
            'manaCost' => 5,
            'amountBonus' => 15,
        ],
        [
            'character' => 'npc_theobald_le_gris_murmure',
            'characterClass' => Npc::class,
            'spell' => 'spell_healrestore',
            'level' => 3,
            'manaCost' => 5,
            'amountBonus' => 15,
        ],

        // Druide
        [
            'character' => 'npc_druide',
            'characterClass' => Npc::class,
            'spell' => 'spell_entangling_roots',
            'level' => 2,
            'manaCost' => 5,
            'durationBonus' => 5,
        ],

        // Grand Druide
        [
            'character' => 'npc_grand_druide',
            'characterClass' => Npc::class,
            'spell' => 'spell_iceball',
            'level' => 2,
            'manaCost' => 5,
            'amountBonus' => 5,
        ],
    ];
}
