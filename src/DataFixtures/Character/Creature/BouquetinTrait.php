<?php

namespace App\DataFixtures\Character\Creature;

trait BouquetinTrait
{
    const BOUQUETIN_CREATURES = [
        [
            'name' => 'Bouquetin Féroce',
            'picture' => 'img/core/creature/bouquetin.png',
            'thumbnail' => 'img/core/creature/bouquetin_thumb.png',
            'description' => "<p>Son pelage est gris de poussière et ses cornes marquées par les années. Il vous fixe sans bouger, puis gratte le sol d’un sabot. Ici, c’est lui le maître des hauteurs.</p>",
            'strength' => 13,
            'dexterity' => 10,
            'constitution' => 14,
            'wisdom' => 6,
            'intelligence' => 4,
            'charisma' => 3,
            'healthMax' => 130,
            'manaMax' => 0,
            'fortune' => 0,
            'level' => 6,
            'race' => 'race_bouquetin',
            'reference' => 'creature_bouquetin_feroce',
        ],
    ];
}
