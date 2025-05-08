<?php

namespace App\DataFixtures\Item\Potion;

trait QuestTrait
{
    const QUEST_POTIONS = [
        [
            'name' => 'Fiole brisée',
            'picture' => 'potion_broken.png',
            'description' => "<p>Le verre est fendu, presque réduit en éclats, mais une étrange lueur dorée pulse encore à l’intérieur, comme un battement de cœur trop ancien. Un résidu d’énergie arcanique s’en échappe par moments, effleurant l’air de petits frissons statiques. Malgré les dommages, l’objet semble refuser de mourir… ou de se taire.</p>",
            'type' => 'utile',
            'price' => 0,
            'category' => 'category_potion',
            'reference' => 'broken_vial',
        ],
    ];
}
