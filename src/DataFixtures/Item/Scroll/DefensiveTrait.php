<?php

namespace App\DataFixtures\Item\Scroll;

trait DefensiveTrait
{
    const DEFENSIVE_SCROLLS = [
        [
            'name' => 'Parchemin de Soin',
            'picture' => 'scroll.png',
            'description' => "<p>Rédigé avec une encre dorée sur un papier délicatement tissé, ce parchemin est une bénédiction pour les aventuriers blessés. En le lisant, une douce lueur enveloppe la cible, guérissant efficacement les blessures et restaurant sa vitalité. Essentiel pour les guérisseurs et les équipes cherchant à survivre aux dangers des donjons.</p>",
            'type' => 'defensive',
            'price' => 500,
            'category' => 'category_scroll',
            'target' => 'health',
            'amount' => 30,
            'reference' => 'scroll_heal',
        ],
        [
            'name' => 'Parchemin de Concentration',
            'picture' => 'scroll.png',
            'description' => "<p>Ce parchemin mystique est orné de symboles hypnotiques qui captivent l’attention de ceux qui le regardent. En le lisant, il renforce la concentration de la cible, augmentant sa capacité ésotérique et lui permettant de maintenir un combat magique plus longtemps. Idéal pour les mages et les aventuriers cherchant à renforcer leur défense contre les sorts ennemis.</p>",
            'type' => 'defensive',
            'price' => 500,
            'category' => 'category_scroll',
            'target' => 'mana',
            'amount' => 30,
            'reference' => 'scroll_concentration',
        ],
        [
            'name' => 'Parchemin de Puissance',
            'picture' => 'scroll.png',
            'description' => "<p>Le bras de l’homme est faible, mais son esprit est puissant. Ce parchemin mystique, gravé de runes de force, renforce la puissance de la cible, augmentant sa force physique et lui permettant de porter des coups plus dévastateurs. Idéal pour les guerriers et les aventuriers cherchant à renverser le cours d’un combat ou à briser la défense de leurs ennemis.</p>",
            'type' => 'defensive',
            'price' => 800,
            'category' => 'category_scroll',
            'target' => 'damage',
            'amount' => 10,
            'duration' => 3,
            'reference' => 'scroll_power',
        ],
        [
            'name' => 'Parchemin de Barrière',
            'picture' => 'scroll.png',
            'description' => "<p>Ce parchemin mystique est orné de runes protectrices qui brillent d’une lueur bleutée lorsqu’il est activé. En le déployant, il crée une barrière magique qui empêche les attaques ennemies de toucher sa cible, offrant une protection fiable contre les dégâts. Idéal pour les aventuriers cherchant à renforcer leur défense ou à protéger des alliés vulnérables.</p>",
            'type' => 'defensive',
            'price' => 800,
            'category' => 'category_scroll',
            'target' => 'defense',
            'amount' => 10,
            'duration' => 3,
            'reference' => 'scroll_barrier',
        ],
    ];
}
