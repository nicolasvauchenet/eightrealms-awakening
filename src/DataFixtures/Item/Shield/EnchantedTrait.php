<?php

namespace App\DataFixtures\Item\Shield;

trait EnchantedTrait
{
    const ENCHANTED_SHIELDS = [
        [
            'name' => 'Bouclier en fer de santé',
            'picture' => 'shield_iron_enchanted.png',
            'description' => "<p>Ce bouclier en fer est imprégné de magie curative, lui permettant de renforcer la santé de son porteur. En plus d’offrir une défense solide, il renforce la vitalité de son utilisateur, lui permettant de tenir plus longtemps sur le champ de bataille.</p>",
            'type' => 'Bouclier lourd enchanté',
            'price' => 1500,
            'category' => 'category_shield',
            'healthMax' => 20,
            'defense' => 3,
            'target' => 'health',
            'amount' => 10,
            'magical' => true,
            'reference' => 'shield_iron_health',
        ],
        [
            'name' => 'Bouclier en fer de défense',
            'picture' => 'shield_iron_enchanted.png',
            'description' => "<p>Ce bouclier en fer est imprégné de magie, lui permettant de renforcer la défense de son porteur. En plus d’offrir une défense solide, il renforce la robustesse de son utilisateur, lui permettant de tenir plus longtemps sur le champ de bataille.</p>",
            'type' => 'Bouclier lourd enchanté',
            'price' => 1500,
            'category' => 'category_shield',
            'healthMax' => 20,
            'defense' => 3,
            'target' => 'defense',
            'amount' => 2,
            'magical' => true,
            'reference' => 'shield_iron_defense',
        ],
    ];
}
