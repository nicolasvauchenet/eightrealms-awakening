<?php

namespace App\DataFixtures\Item\Amulet;

trait QuestTrait
{
    const QUEST_AMULETS = [
        [
            'name' => "Cœur d'Écume",
            'picture' => 'coeur-decume.png',
            'description' => "<p>Cette amulette bleutée semble vibrer doucement au contact de l’air humide. Offerte par une Sirène en guise de reconnaissance ou d'amitié, elle relie son porteur aux forces tranquilles des abysses. Tant qu’elle est portée, les créatures aquatiques hésitent à lever la main.</p><p>Elle permet aussi de respirer sous l’eau là où l’air ne passe plus.</p>",
            'type' => 'utile',
            'price' => 1500,
            'category' => 'category_amulet',
            'target' => 'aquatics',
            'effect' => 'charmed',
            'reference' => 'amulet_coeur_d_ecume',
        ],
        [
            'name' => 'Médaillon des Vents',
            'picture' => 'amulet.png',
            'description' => "<p>Un médaillon ancestral orné de symboles runiques liés aux esprits des vents. On raconte qu'il permet à son porteur d'invoquer une brise salvatrice en cas de danger, et qu'il pourrait rendre son porteur invisible.</p>",
            'type' => 'utile',
            'price' => 2000,
            'category' => 'category_amulet',
            'effect' => 'invisibility',
            'duration' => 3,
            'reference' => 'amulet_medaillon_des_vents',
        ],
        [
            'name' => 'Amulette du Cercle',
            'picture' => 'circle-amulet.png',
            'description' => "<p>Forgée non par le feu, mais par le temps et la nature, cette amulette est composée de bois sacré, de fibres végétales et d’un fragment de pierre lunaire enchâssé en son centre. Elle sert de signe de reconnaissance entre les membres du Cercle, un ordre ancien qui veille sur les bois sacrés et parle aux esprits des arbres. Le symbole gravé représente l’harmonie entre les cycles de la vie et les forces de la forêt.</p>",
            'type' => 'defensive',
            'price' => 200,
            'category' => 'category_amulet',
            'target' => 'defense',
            'amount' => 5,
            'reference' => 'amulet_amulette_du_cercle',
        ],
    ];
}
