<?php

namespace App\DataFixtures\Item\Shield;

trait QuestTrait
{
    const QUEST_SHIELDS = [
        [
            'name' => 'Bouclier en fer de Gérard',
            'picture' => 'shield_iron.png',
            'description' => "<p>Forgé avec soin, ce bouclier en fer combine robustesse et efficacité. Il offre une défense solide contre les coups physiques et augmente considérablement les chances de parer les attaques ennemies. Utilisé par de nombreux guerriers, il est un choix fiable pour ceux qui cherchent un bon équilibre entre protection et maniabilité.</p>",
            'type' => 'Bouclier lourd',
            'price' => 250,
            'category' => 'category_shield',
            'healthMax' => 20,
            'defense' => 3,
            'magical' => false,
            'reference' => 'shield_iron_gerard',
        ],
    ];
}
