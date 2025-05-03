<?php

namespace App\DataFixtures\Item\Weapon;

trait CreatureTrait
{
    const CREATURE_WEAPONS = [
        [
            'name' => 'Griffes',
            'picture' => 'claws.png',
            'description' => "<p>Les griffes d'une créature sont pointues et acérées</p>",
            'type' => 'Arme de mêlée',
            'price' => 0,
            'category' => 'category_weapon',
            'healthMax' => 100,
            'damage' => 5,
            'range' => 1,
            'magical' => false,
            'reference' => 'weapon_claws',
        ],
        [
            'name' => 'Dents',
            'picture' => 'teeth.png',
            'description' => "<p>Les dents d'une créature sont tranchantes comme des rasoirs</p>",
            'type' => 'Arme de mêlée',
            'price' => 0,
            'category' => 'category_weapon',
            'healthMax' => 100,
            'damage' => 10,
            'range' => 1,
            'magical' => false,
            'reference' => 'weapon_teeth',
        ],
        [
            'name' => 'Lame Aquatique',
            'picture' => 'lame-aquatique.png',
            'description' => "<p>Un jet d'eau sous pression qui peut couper n'importe quoi</p>",
            'type' => 'Arme de jet',
            'price' => 0,
            'category' => 'category_weapon',
            'healthMax' => 100,
            'damage' => 10,
            'range' => 2,
            'magical' => false,
            'reference' => 'weapon_lame_aquatique',
        ],
    ];
}
