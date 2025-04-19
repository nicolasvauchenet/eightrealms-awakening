<?php

namespace App\DataFixtures\Item\Ring;

trait OffensiveTrait
{
    const OFFENSIVE_RINGS = [
        [
            'name' => 'Anneau de chevalier',
            'picture' => 'ring.png',
            'description' => "<p>Cet anneau en acier gravé de runes protectrices augmente le bonus d'attaque de son porteur. Les guerriers et les chevaliers le portent souvent pour augmenter leur puissance de frappe et infliger des dégâts supplémentaires à leurs ennemis. Cet anneau est un accessoire indispensable pour les combats les plus périlleux et les affrontements les plus redoutables.</p>",
            'type' => 'offensive',
            'price' => 750,
            'category' => 'category_ring',
            'target' => 'damage',
            'amount' => 5,
            'reference' => 'ring_knight',
        ],
    ];
}
