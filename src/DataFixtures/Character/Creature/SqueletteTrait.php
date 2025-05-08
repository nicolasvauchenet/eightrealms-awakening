<?php

namespace App\DataFixtures\Character\Creature;

trait SqueletteTrait
{
    const SQUELETTE_CREATURES = [
        [
            'name' => 'Squelette de marin',
            'picture' => 'img/core/creature/squelette-de-marin.png',
            'thumbnail' => 'img/core/creature/squelette-de-marin_thumb.png',
            'description' => "<p>Ce squelette porte encore les lambeaux d’un uniforme marin. Sa cage thoracique est percée de part en part, comme si un harpon l’avait transpercée. Il se redresse lentement, l’arme toujours en main, animé par une haine que la mort n’a pas calmée.</p>",
            'strength' => 8,
            'dexterity' => 10,
            'constitution' => 9,
            'wisdom' => 6,
            'intelligence' => 4,
            'charisma' => 3,
            'healthMax' => 60,
            'manaMax' => 0,
            'fortune' => 0,
            'level' => 4,
            'race' => 'race_squelette',
            'reference' => 'creature_squelette_de_marin',
        ],
        [
            'name' => 'Squelette d’Eryl le Traître',
            'picture' => 'img/core/creature/squelette-deryl.png',
            'thumbnail' => 'img/core/creature/squelette-deryl_thumb.png',
            'description' => "<p>Le squelette d’Eryl se relève, son médaillon brille faiblement à son cou. Ses orbites vides semblent pleines de sarcasme et de mépris. Même dans la mort, son ambition le pousse à se battre comme un capitaine déchu.</p>",
            'strength' => 10,
            'dexterity' => 13,
            'constitution' => 11,
            'wisdom' => 8,
            'intelligence' => 6,
            'charisma' => 5,
            'healthMax' => 85,
            'manaMax' => 10,
            'fortune' => 0,
            'level' => 6,
            'race' => 'race_squelette',
            'reference' => 'creature_squelette_deryl',
        ],
    ];
}
