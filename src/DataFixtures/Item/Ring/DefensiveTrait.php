<?php

namespace App\DataFixtures\Item\Ring;

trait DefensiveTrait
{
    const DEFENSIVE_RINGS = [
        [
            'name' => 'Anneau de santé',
            'picture' => 'ring.png',
            'description' => "<p>Cet anneau élégant est orné d’une pierre rouge brillante, symbole de vitalité et de force. Il est enchanté pour renforcer la santé de son porteur, augmentant sa capacité à encaisser les coups et à survivre aux combats les plus acharnés. Connu pour être un bijou prisé des aventuriers intrépides, il offre un avantage stratégique crucial dans les quêtes où la résistance est mise à rude épreuve.</p>",
            'type' => 'defensive',
            'price' => 750,
            'category' => 'category_ring',
            'target' => 'health',
            'amount' => 20,
            'reference' => 'ring_health',
        ],
        [
            'name' => 'Anneau de magie',
            'picture' => 'ring.png',
            'description' => "<p>Incrusté d’une pierre bleue étincelante, cet anneau est une véritable source de puissance magique. Il augmente les réserves de mana du porteur, lui permettant de lancer plus de sorts ou de maintenir des incantations prolongées. Les mages et enchanteurs considèrent cet anneau comme un accessoire essentiel pour maximiser leur potentiel arcanique lors des affrontements ou des explorations mystiques.</p>",
            'type' => 'defensive',
            'price' => 750,
            'category' => 'category_ring',
            'target' => 'mana',
            'amount' => 20,
            'reference' => 'ring_mana',
        ],
        [
            'name' => 'Anneau de protection',
            'picture' => 'ring.png',
            'description' => "<p>Cet anneau en acier gravé de runes protectrices est un rempart contre les attaques ennemies. Il renforce la défense de son porteur, réduisant les dégâts subis lors des combats et des affrontements. Les guerriers et les chevaliers le portent souvent pour se protéger des coups les plus violents et des attaques les plus redoutables, en faisant un accessoire indispensable pour les combats les plus périlleux.</p>",
            'type' => 'defensive',
            'price' => 750,
            'category' => 'category_ring',
            'target' => 'defense',
            'amount' => 5,
            'reference' => 'ring_protection',
        ],
    ];
}
