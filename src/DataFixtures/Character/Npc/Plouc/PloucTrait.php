<?php

namespace App\DataFixtures\Character\Npc\Plouc;

trait PloucTrait
{
    const PLOUC_NPCS = [
        [
            'name' => 'Gérard le Pêcheur',
            'picture' => 'img/chapter1/npc/gerard-le-pecheur.png',
            'thumbnail' => 'img/chapter1/npc/gerard-le-pecheur_thumb.png',
            'description' => "<p>Gérard, les bottes encore humides, sent le poisson et la fatigue. Il sourit pourtant, un œil plissé par le soleil, l’autre inquiet, peut-être à cause de ce qu’il a vu… là-bas, au large.</p><p><em>Du poisson, j’en ai. Mais faut pas pêcher trop près du Donjon. Les bêtes là-bas… elles ont des yeux comme les miens, mais morts.</em></p>",
            'strength' => 10,
            'dexterity' => 12,
            'constitution' => 8,
            'wisdom' => 10,
            'intelligence' => 9,
            'charisma' => 9,
            'healthMax' => 80,
            'manaMax' => 45,
            'fortune' => 5,
            'level' => 1,
            'race' => 'race_humain',
            'profession' => 'profession_pecheur',
            'reference' => 'npc_gerard_le_pecheur',
        ],
    ];
}
