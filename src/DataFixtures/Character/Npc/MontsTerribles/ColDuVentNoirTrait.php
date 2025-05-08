<?php

namespace App\DataFixtures\Character\Npc\MontsTerribles;

trait ColDuVentNoirTrait
{
    const COL_DU_VENT_NOIR_NPCS = [
        [
            'name' => 'Nain mineur',
            'picture' => 'img/core/npc/nain-mineur.png',
            'thumbnail' => 'img/core/creature/nain-mineur_thumb.png',
            'description' => "<p>Un nain surgit de derrière un rocher, les traits creusés et le regard vide. Son pic de mine est levé… et il ne vous pose aucune question.</p>",
            'strength' => 14,
            'dexterity' => 8,
            'constitution' => 15,
            'wisdom' => 9,
            'intelligence' => 8,
            'charisma' => 6,
            'healthMax' => 120,
            'manaMax' => 0,
            'fortune' => 5,
            'level' => 6,
            'race' => 'race_nain',
            'profession' => 'profession_mineur',
            'reference' => 'npc_nain_mineur',
        ],
    ];
}
