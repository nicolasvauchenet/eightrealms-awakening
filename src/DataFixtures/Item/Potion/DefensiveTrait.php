<?php

namespace App\DataFixtures\Item\Potion;

trait DefensiveTrait
{
    const DEFENSIVE_POTIONS = [
        [
            'name' => 'Potion de soin léger',
            'picture' => 'potion_health.png',
            'description' => "<p>Cette potion, contenue dans un petit flacon en verre, est composée d’un liquide rouge vif. Elle est idéale pour les blessures superficielles ou en cas de faiblesse légère. Rapide à consommer et facile à transporter, elle est souvent utilisée par les aventuriers en début de carrière ou dans les situations d’urgence mineures.</p>",
            'type' => 'defensive',
            'price' => 100,
            'category' => 'category_potion',
            'target' => 'health',
            'amount' => 20,
            'reference' => 'potion_lighthealing',
        ],
        [
            'name' => 'Potion de soin',
            'picture' => 'potion_health.png',
            'description' => "<p>Élaborée à partir d’herbes rares et d’essences curatives, cette potion rouge est un incontournable pour restaurer une santé significative. Son efficacité en fait un choix prisé des guerriers et aventuriers confrontés à des combats intenses. Elle peut faire la différence entre la vie et la mort lors des batailles prolongées.</p>",
            'type' => 'defensive',
            'price' => 200,
            'category' => 'category_potion',
            'target' => 'health',
            'amount' => 50,
            'reference' => 'potion_healing',
        ],
        [
            'name' => 'Potion de magie légère',
            'picture' => 'potion_mana.png',
            'description' => "<p>Un liquide bleu translucide remplit ce flacon délicat. Cette potion régénère une petite quantité de mana, permettant aux utilisateurs de magie de continuer à lancer leurs sorts. Très appréciée par les magiciens novices, elle est parfaite pour les situations où la magie doit être conservée avec parcimonie.</p>",
            'type' => 'defensive',
            'price' => 100,
            'category' => 'category_potion',
            'target' => 'mana',
            'amount' => 20,
            'reference' => 'potion_lightmana',
        ],
        [
            'name' => 'Potion de magie',
            'picture' => 'potion_mana.png',
            'description' => "<p>Cette potion bleu profond est enrichie d’énergies arcanes concentrées. Elle offre une régénération significative de mana, permettant aux magiciens expérimentés de restaurer leurs capacités en plein combat. Essentielle pour les longues quêtes ou les affrontements où la magie est indispensable.</p>",
            'type' => 'defensive',
            'price' => 200,
            'category' => 'category_potion',
            'target' => 'mana',
            'amount' => 50,
            'reference' => 'potion_mana',
        ],
    ];
}
