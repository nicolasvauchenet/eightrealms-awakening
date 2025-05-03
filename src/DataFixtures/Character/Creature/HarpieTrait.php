<?php

namespace App\DataFixtures\Character\Creature;

trait HarpieTrait
{
    const HARPIE_CREATURES = [
        [
            'name' => 'Harpie des cimes',
            'picture' => 'img/core/creature/harpie.png',
            'thumbnail' => 'img/core/creature/harpie_thumb.png',
            'description' => "<p>Un cri perçant fend les airs, aussitôt suivi d’un autre. Des ombres planent au-dessus du col, et l’une d’elles plonge en piqué, serres en avant.</p>",
            'strength' => 10,
            'dexterity' => 15,
            'constitution' => 9,
            'wisdom' => 12,
            'intelligence' => 10,
            'charisma' => 6,
            'healthMax' => 85,
            'manaMax' => 20,
            'fortune' => 5,
            'level' => 5,
            'race' => 'race_harpie',
            'reference' => 'creature_harpie_des_cimes',
        ],
    ];
}
