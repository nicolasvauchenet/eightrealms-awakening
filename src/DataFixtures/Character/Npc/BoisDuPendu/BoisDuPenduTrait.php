<?php

namespace App\DataFixtures\Character\Npc\BoisDuPendu;

trait BoisDuPenduTrait
{
    const BOIS_DU_PENDU_NPCS = [
        [
            'name' => 'Druide',
            'picture' => 'img/core/npc/druide.png',
            'thumbnail' => 'img/core/npc/druide_thumb.png',
            'description' => "<p>Le druide vous observe à travers les feuillages, immobile. Son bâton est levé avant même que vous ouvriez la bouche. Ici, la forêt ne vous veut pas… et lui non plus.</p>",
            'strength' => 9,
            'dexterity' => 10,
            'constitution' => 11,
            'wisdom' => 15,
            'intelligence' => 14,
            'charisma' => 8,
            'healthMax' => 100,
            'manaMax' => 60,
            'fortune' => 5,
            'level' => 6,
            'race' => 'race_humain',
            'profession' => 'profession_druide',
            'reference' => 'npc_druide',
        ],
    ];
}
