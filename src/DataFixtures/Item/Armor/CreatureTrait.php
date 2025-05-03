<?php

namespace App\DataFixtures\Item\Armor;

trait CreatureTrait
{
    const CREATURE_ARMORS = [
        [
            'name' => 'Peau',
            'picture' => 'skin.png',
            'description' => "<p>La peau d'un animal sauvage lui sert à se protéger des éléments et des attaques mineures. Elle est légère, mais offre une protection minimale contre les coups.</p>",
            'type' => 'creature',
            'price' => 0,
            'category' => 'category_armor',
            'healthMax' => 100,
            'defense' => 1,
            'magical' => false,
            'reference' => 'armor_skin',
        ],
        [
            'name' => 'Fourrure',
            'picture' => 'fur.png',
            'description' => "<p>La fourrure d'un animal sauvage lui sert à se protéger des éléments et des attaques mineures. Elle est légère, mais offre une protection minimale contre les coups.</p>",
            'type' => 'creature',
            'price' => 0,
            'category' => 'category_armor',
            'healthMax' => 100,
            'defense' => 2,
            'magical' => false,
            'reference' => 'armor_fur',
        ],
        [
            'name' => 'Écailles',
            'picture' => 'scales.png',
            'description' => "<p>Les écailles d'une créature aquatique lui servent à se protéger des éléments et des attaques mineures. Elles sont légères, mais offrent une protection minimale contre les coups.</p>",
            'type' => 'creature',
            'price' => 0,
            'category' => 'category_armor',
            'healthMax' => 100,
            'defense' => 3,
            'magical' => false,
            'reference' => 'armor_scales',
        ],
    ];
}
