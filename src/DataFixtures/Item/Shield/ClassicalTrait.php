<?php

namespace App\DataFixtures\Item\Shield;

trait ClassicalTrait
{
    const CLASSICAL_SHIELDS = [
        [
            'name' => 'Écu en bois',
            'picture' => 'shield_wood.png',
            'description' => "<p>Léger et rudimentaire, cet écu est fabriqué à partir de planches de bois renforcées par des clous et une fine bordure en métal. Bien qu’il offre une protection minimale, il reste un choix abordable pour les débutants ou ceux qui ne peuvent pas porter d’équipement plus lourd. Sa légèreté permet une grande mobilité, mais il est moins efficace contre les attaques puissantes.</p>",
            'type' => 'Bouclier léger',
            'price' => 100,
            'category' => 'category_shield',
            'healthMax' => 10,
            'defense' => 2,
            'magical' => false,
            'reference' => 'shield_wooden',
        ],
        [
            'name' => 'Bouclier en fer',
            'picture' => 'shield_iron.png',
            'description' => "<p>Forgé avec soin, ce bouclier en fer combine robustesse et efficacité. Il offre une défense solide contre les coups physiques et augmente considérablement les chances de parer les attaques ennemies. Utilisé par de nombreux guerriers, il est un choix fiable pour ceux qui cherchent un bon équilibre entre protection et maniabilité.</p>",
            'type' => 'Bouclier lourd',
            'price' => 250,
            'category' => 'category_shield',
            'healthMax' => 20,
            'defense' => 3,
            'magical' => false,
            'reference' => 'shield_iron',
        ],
        [
            'name' => 'Bouclier en acier',
            'picture' => 'shield_steel.png',
            'description' => "<p>Ce bouclier massif, fabriqué en acier poli, est conçu pour résister aux assauts les plus violents. Avec une défense exceptionnelle et une grande capacité de blocage, il est idéal pour les chevaliers et les combattants en première ligne. Bien qu’un peu plus lourd, il compense par une protection inégalée, rendant son porteur presque invulnérable aux attaques directes.</p>",
            'type' => 'Bouclier lourd',
            'price' => 500,
            'category' => 'category_shield',
            'healthMax' => 30,
            'defense' => 5,
            'magical' => false,
            'reference' => 'shield_steel',
        ],
    ];
}
