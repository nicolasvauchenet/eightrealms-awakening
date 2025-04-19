<?php

namespace App\DataFixtures\Item\Weapon;

trait RangedTrait
{
    const RANGED_WEAPONS = [
        [
            'name' => 'Arc court',
            'picture' => 'bow_short.png',
            'description' => "<p>Compact et rapide, cet arc est idéal pour les combats à distance rapprochée. Conçu pour la vitesse et la précision, il permet de tirer rapidement sur des cibles sans nécessiter un grand espace. Il est souvent utilisé par les éclaireurs et les archers débutants.</p>",
            'type' => 'Arme de jet',
            'price' => 150,
            'category' => 'category_weapon',
            'healthMax' => 10,
            'damage' => 6,
            'range' => 2,
            'magical' => false,
            'reference' => 'weapon_shortbow',
        ],
        [
            'name' => 'Arc long',
            'picture' => 'bow_long.png',
            'description' => "<p>Ce puissant arc est capable de décocher des flèches à grande distance avec une force remarquable. Idéal pour les archers aguerris, il offre une portée supérieure, permettant d’abattre les ennemis avant même qu’ils ne puissent riposter. Un incontournable pour les combats à longue distance.</p>",
            'type' => 'Arme de jet',
            'price' => 500,
            'category' => 'category_weapon',
            'healthMax' => 15,
            'damage' => 8,
            'range' => 3,
            'magical' => false,
            'reference' => 'weapon_longbow',
        ],
        [
            'name' => 'Pistolet de foudre',
            'picture' => 'gun.png',
            'description' => "<p>Cette arme magique, en forme de pistolet, canalise l’énergie électrique pour lancer de petits éclairs. Redoutable à distance, elle est prisée des mages de combat et des ingénieurs pour son style moderne et ses capacités destructrices. Son rayon d’action en fait une arme unique dans les affrontements stratégiques.</p>",
            'type' => 'Arme de poing enchantée',
            'price' => 2000,
            'category' => 'category_weapon',
            'healthMax' => 10,
            'damage' => 5,
            'range' => 8,
            'amount' => 5,
            'magical' => false,
            'reference' => 'weapon_gunstorm',
        ],
    ];
}
