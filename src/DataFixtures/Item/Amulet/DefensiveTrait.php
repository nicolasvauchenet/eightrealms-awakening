<?php

namespace App\DataFixtures\Item\Amulet;

trait DefensiveTrait
{
    const DEFENSIVE_AMULETS = [
        [
            'name' => 'Amulette de santé',
            'picture' => 'amulet.png',
            'description' => "<p>Bijou orné de symboles anciens, cette amulette est réputée pour ses pouvoirs curatifs. Forgée par des mages alchimistes, elle renforce la vitalité et la résilience du porteur. Idéale pour les aventuriers, elle inspire sécurité et robustesse face aux défis les plus dangereux.</p>",
            'type' => 'defensive',
            'price' => 750,
            'category' => 'category_amulet',
            'target' => 'health',
            'amount' => 20,
            'reference' => 'amulet_health',
        ],
        [
            'name' => 'Amulette de magie',
            'picture' => 'amulet.png',
            'description' => "<p>Ciselée avec des cristaux lumineux, cette amulette amplifie les réserves de mana de son porteur. Créée par le Conseil des Mages, elle est imprégnée d’une énergie arcanique, offrant aux magiciens une puissance accrue pour leurs sorts les plus complexes.</p>",
            'type' => 'defensive',
            'price' => 750,
            'category' => 'category_amulet',
            'target' => 'mana',
            'amount' => 20,
            'reference' => 'amulet_mana',
        ],
        [
            'name' => 'Amulette de protection',
            'picture' => 'amulet.png',
            'description' => "<p>Cette amulette est un talisman de protection, forgé dans un alliage de métaux rares. Elle renforce les défenses naturelles de son porteur, le protégeant des attaques ennemies. Idéale pour les guerriers, elle inspire confiance et courage face aux adversaires les plus redoutables.</p>",
            'type' => 'defensive',
            'price' => 750,
            'category' => 'category_amulet',
            'target' => 'defense',
            'amount' => 5,
            'reference' => 'amulet_protection',
        ],
    ];
}
