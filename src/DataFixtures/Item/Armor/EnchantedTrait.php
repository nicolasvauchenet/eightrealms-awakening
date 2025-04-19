<?php

namespace App\DataFixtures\Item\Armor;

trait EnchantedTrait
{
    const ENCHANTED_ARMORS = [
        [
            'name' => "Robe d'apprenti",
            'picture' => 'armor_robe_mage_enchanted.png',
            'description' => "<p>Cette robe magique renforce le réservoir magique de son porteur, lui permettant de lancer des sorts plus puissants et plus fréquents. Elle offre une protection minimale, mais une grande réserve de mana, idéale pour les mages débutants.</p>",
            'type' => 'Robe enchantée',
            'price' => 1500,
            'category' => 'category_armor',
            'healthMax' => 10,
            'defense' => 1,
            'target' => 'mana',
            'amount' => 10,
            'magical' => true,
            'reference' => 'armor_mage_apprentice',
        ],
        [
            'name' => 'Armure de fer de santé',
            'picture' => 'armor_iron_enchanted.png',
            'description' => "<p>Forgée par un maître armurier, cette armure de fer est enchantée pour renforcer la santé de son porteur. Elle offre une protection solide tout en régénérant lentement les blessures de son utilisateur, lui permettant de rester en pleine forme pendant les combats prolongés.</p>",
            'type' => 'Armure lourde enchantée',
            'price' => 2000,
            'category' => 'category_armor',
            'healthMax' => 30,
            'defense' => 4,
            'target' => 'health',
            'amount' => 20,
            'magical' => true,
            'reference' => 'armor_iron_health',
        ],
    ];
}
