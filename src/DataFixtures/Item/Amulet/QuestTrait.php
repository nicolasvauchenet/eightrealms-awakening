<?php

namespace App\DataFixtures\Item\Amulet;

trait QuestTrait
{
    const QUEST_AMULETS = [
        [
            'name' => "Médaillon d'Eryl",
            'picture' => 'amulet.png',
            'description' => "<p>Ce médaillon ancien, orné d’une pierre opaline et gravé du nom &laquo;&nbsp;Eryl&nbsp;&raquo;, semble avoir traversé les âges. Il dégage une chaleur étrange, presque apaisante, comme s’il contenait les derniers fragments d’un souvenir oublié. Malgré le sable incrusté dans ses gravures, il brille doucement lorsque vous le tenez en main.</p>",
            'type' => 'defensive',
            'price' => 500,
            'category' => 'category_amulet',
            'target' => 'charisma',
            'amount' => 2,
            'reference' => 'amulet_medaillon_d_eryl',
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
