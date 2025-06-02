<?php

namespace App\DataFixtures\Character\Creature;

trait InfernalTrait
{
    const INFERNAL_CREATURES = [
        // Démons
        [
            'name' => 'Nashoré',
            'picture' => 'img/chapter1/creature/nashore.png',
            'thumbnail' => 'img/chapter1/creature/nashore_thumb.png',
            'description' => "<p>Majestueux et terrifiant, Nashoré incarne une puissance ancienne, tapie depuis des siècles dans les tréfonds du Donjon de l’Âme. Ni tout à fait vivant, ni véritablement mort, il se nourrit des ambitions des mortels, soufflant des promesses empoisonnées dans les esprits faibles. Son corps, semblable à une statue d’ombre animée par une volonté impie, semble imprégné d’un mal que nul sortilège ne saurait purger.</p><p>Il vous attend. Il savait que vous viendriez.</p>",
            'strength' => 18,
            'dexterity' => 14,
            'constitution' => 20,
            'wisdom' => 17,
            'intelligence' => 16,
            'charisma' => 12,
            'healthMax' => 200,
            'manaMax' => 80,
            'fortune' => 0,
            'level' => 10,
            'race' => 'race_demon',
            'reference' => 'creature_nashore',
        ],
    ];
}
