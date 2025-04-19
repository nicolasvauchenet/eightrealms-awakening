<?php

namespace App\DataFixtures\Item\MagicalWeapon;

trait DefensiveTrait
{
    const DEFENSIVE_MAGICAL_WEAPONS = [
        [
            'name' => 'Bâton de soin',
            'picture' => 'magical_stick.png',
            'description' => "<p>Ce bâton en bois poli émet une douce lueur apaisante. Il est conçu pour soigner les blessures, rétablissant la santé de ses alliés. Un outil indispensable pour les guérisseurs, il symbolise la compassion et le dévouement dans les moments les plus critiques.</p>",
            'type' => 'defensive',
            'price' => 500,
            'category' => 'category_magical',
            'chargeMax' => 50,
            'target' => 'health',
            'amount' => 20,
            'reference' => 'magical_healstick',
        ],
        [
            'name' => 'Bâton de protection',
            'picture' => 'magical_stick.png',
            'description' => "<p>Ce bâton magique projette un champ de force protecteur autour de son porteur. Il absorbe les dégâts et renvoie les attaques ennemies, protégeant efficacement contre les attaques physiques et magiques. Un atout majeur pour les défenseurs cherchant à protéger leurs alliés.</p>",
            'type' => 'defensive',
            'price' => 500,
            'category' => 'category_magical',
            'chargeMax' => 50,
            'target' => 'defense',
            'amount' => 20,
            'reference' => 'magical_protectionstick',
        ],
    ];
}
