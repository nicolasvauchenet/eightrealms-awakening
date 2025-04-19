<?php

namespace App\DataFixtures\Item\Potion;

trait UtileTrait
{
    const UTILE_POTIONS = [
        [
            'name' => "Potion d'invisibilité",
            'picture' => 'potion_util.png',
            'description' => "<p>Une potion mystérieuse, contenue dans un flacon scintillant, qui émet une légère brume argentée. Lorsqu’elle est consommée, elle rend son utilisateur complètement invisible pendant trois tours, lui permettant d’échapper à ses ennemis ou de préparer des attaques furtives. Cette potion est un atout stratégique dans les situations où la discrétion est essentielle.</p>",
            'type' => 'utile',
            'price' => 500,
            'category' => 'category_potion',
            'effect' => 'invisibility',
            'duration' => 3,
            'reference' => 'potion_invisibility',
        ],
    ];
}
