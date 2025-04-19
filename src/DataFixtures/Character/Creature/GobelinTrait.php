<?php

namespace App\DataFixtures\Character\Creature;

trait GobelinTrait
{
    const GOBELIN_CREATURES = [
        [
            'name' => 'Éclaireur gobelin',
            'picture' => 'img/core/creature/gobelineclaireur.png',
            'thumbnail' => 'img/core/creature/gobelin-eclaireur_thumb.png',
            'description' => "<p>L'éclaireur gobelin est rapide et agile, mais manque de résistance physique. Il est souvent envoyé en avant-garde pour surveiller les alentours et rapporter des informations au groupe.</p>",
            'strength' => 8,
            'dexterity' => 13,
            'constitution' => 8,
            'wisdom' => 8,
            'intelligence' => 9,
            'charisma' => 6,
            'healthMax' => 60,
            'manaMax' => 10,
            'fortune' => 5,
            'level' => 1,
            'race' => 'race_gobelin',
            'reference' => 'creature_eclaireur_gobelin',
        ],
        [
            'name' => 'Guerrier gobelin',
            'picture' => 'img/core/creature/gobelin-guerrier.png',
            'thumbnail' => 'img/core/creature/gobelin-guerrier_thumb.png',
            'description' => "<p>Le guerrier gobelin représente la force de frappe moyenne des gobelins. Équipé d'armes rudimentaires mais efficaces, il n'hésitera pas à engager directement le combat.</p>",
            'strength' => 12,
            'dexterity' => 10,
            'constitution' => 12,
            'wisdom' => 9,
            'intelligence' => 8,
            'charisma' => 6,
            'healthMax' => 110,
            'manaMax' => 15,
            'fortune' => 10,
            'level' => 6,
            'race' => 'race_gobelin',
            'reference' => 'creature_guerrier_gobelin',
        ],
        [
            'name' => 'Chef gobelin',
            'picture' => 'img/core/creature/gobelin-chef.png',
            'thumbnail' => 'img/core/creature/gobelin-chef_thumb.png',
            'description' => "<p>Le chef gobelin est redouté pour sa férocité et ses capacités au combat. Plus intelligent et charismatique que ses semblables, il coordonne les attaques de ses subordonnés et représente une menace réelle.</p>",
            'strength' => 15,
            'dexterity' => 12,
            'constitution' => 15,
            'wisdom' => 12,
            'intelligence' => 11,
            'charisma' => 10,
            'healthMax' => 180,
            'manaMax' => 30,
            'fortune' => 20,
            'level' => 10,
            'race' => 'race_gobelin',
            'reference' => 'creature_chef_gobelin',
        ],
    ];
}
