<?php

namespace App\DataFixtures\Item\Scroll;

trait OffensiveTrait
{
    const OFFENSIVE_SCROLLS = [
        [
            'name' => 'Parchemin de Boule de feu',
            'picture' => 'scroll.png',
            'description' => "<p>Ce parchemin ancien est gravé de symboles flamboyants qui s’illuminent lorsqu’il est utilisé. Lorsqu’il est activé, il libère une boule de feu destructrice qui explose sur une large zone, infligeant des dégâts de feu dévastateurs aux ennemis. Ce parchemin est une arme redoutable pour renverser le cours d’un combat ou neutraliser des groupes d’adversaires en un instant.</p>",
            'type' => 'offensive',
            'price' => 500,
            'category' => 'category_scroll',
            'target' => 'health',
            'amount' => 30,
            'area' => 3,
            'reference' => 'scroll_fireball',
        ],
        [
            'name' => 'Parchemin de Déconcentration',
            'picture' => 'scroll.png',
            'description' => "<p>Ce parchemin mystique est orné de runes tourbillonnantes qui dansent à la surface du papier. Lorsqu’il est activé, il crée une onde de choc magique qui perturbe les sens des ennemis, les désorientant et diminuant leur réserve magique. Idéal pour les aventuriers cherchant à affaiblir les magiciens ou à échapper à des situations périlleuses.</p>",
            'type' => 'offensive',
            'price' => 500,
            'category' => 'category_scroll',
            'target' => 'mana',
            'amount' => 30,
            'reference' => 'scroll_deconcentration',
        ],
    ];
}
