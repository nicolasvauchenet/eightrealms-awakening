<?php

namespace App\DataFixtures\Item\Weapon;

trait EnchantedTrait
{
    const ENCHANTED_WEAPONS = [
        [
            'name' => 'Épée longue de foudre',
            'picture' => 'sword_long_enchanted.png',
            'description' => "<p>Forgée dans un alliage de métal et de magie, cette épée est capable de canaliser l’énergie électrique pour infliger des dégâts dévastateurs. Son apparence imposante et son pouvoir destructeur en font une arme redoutée des mages de combat et des guerriers magiques.</p>",
            'type' => 'Arme de mêlée enchantée',
            'price' => 1500,
            'category' => 'category_weapon',
            'healthMax' => 15,
            'damage' => 8,
            'range' => 1,
            'target' => 'damage',
            'amount' => 5,
            'magical' => true,
            'reference' => 'weapon_longsword_storm',
        ],
        [
            'name' => 'Arc long de foudre',
            'picture' => 'bow_long_enchanted.png',
            'description' => "<p>Cet arc magique est capable de lancer des éclairs à grande distance, infligeant des dégâts électriques à ses cibles. Idéal pour les mages de combat et les archers magiques, il offre une portée supérieure et une puissance dévastatrice. Un choix incontournable pour ceux qui maîtrisent la magie élémentaire.</p>",
            'type' => 'Arme de jet enchantée',
            'price' => 1500,
            'category' => 'category_weapon',
            'healthMax' => 15,
            'damage' => 8,
            'range' => 10,
            'target' => 'damage',
            'amount' => 5,
            'magical' => true,
            'reference' => 'weapon_longbow_storm',
        ],
    ];
}
