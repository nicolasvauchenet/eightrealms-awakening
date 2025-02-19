<?php

namespace App\DataFixtures\Item;

use App\Entity\Item\Category;
use App\Entity\Item\Shield;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ShieldFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // Classique
        $shields = [
            [
                'category' => 'category_shield',
                'name' => 'Écu en bois',
                'description' => "<p>Léger et rudimentaire, cet écu est fabriqué à partir de planches de bois renforcées par des clous et une fine bordure en métal. Bien qu’il offre une protection minimale, il reste un choix abordable pour les débutants ou ceux qui ne peuvent pas porter d’équipement plus lourd. Sa légèreté permet une grande mobilité, mais il est moins efficace contre les attaques puissantes.</p>",
                'picture' => 'shield_wood.png',
                'type' => 'Léger',
                'defense' => 1,
                'price' => 10,
                'reference' => 'shield_wooden',
            ],
            [
                'category' => 'category_shield',
                'name' => 'Bouclier en fer',
                'description' => "<p>Forgé avec soin, ce bouclier en fer combine robustesse et efficacité. Il offre une défense solide contre les coups physiques et augmente considérablement les chances de parer les attaques ennemies. Utilisé par de nombreux guerriers, il est un choix fiable pour ceux qui cherchent un bon équilibre entre protection et maniabilité.</p>",
                'picture' => 'shield_iron.png',
                'type' => 'Lourd',
                'defense' => 3,
                'price' => 100,
                'reference' => 'shield_iron',
            ],
            [
                'category' => 'category_shield',
                'name' => 'Bouclier en acier',
                'description' => "<p>Ce bouclier massif, fabriqué en acier poli, est conçu pour résister aux assauts les plus violents. Avec une défense exceptionnelle et une grande capacité de blocage, il est idéal pour les chevaliers et les combattants en première ligne. Bien qu’un peu plus lourd, il compense par une protection inégalée, rendant son porteur presque invulnérable aux attaques directes.</p>",
                'picture' => 'shield_steel.png',
                'type' => 'Léger',
                'defense' => 5,
                'price' => 200,
                'reference' => 'shield_steel',
            ],

            // Enchanté
            [
                'category' => 'category_shield',
                'name' => 'Bouclier en fer de santé',
                'description' => "<p>Ce bouclier en fer est imprégné de magie curative, lui permettant de renforcer la santé de son porteur. En plus d’offrir une défense solide, il renforce la vitalité de son utilisateur, lui permettant de tenir plus longtemps sur le champ de bataille.</p>",
                'picture' => 'shield_iron.png',
                'type' => 'Magique',
                'defense' => 3,
                'target' => 'health',
                'amount' => 5,
                'price' => 1000,
                'reference' => 'shield_iron_health',
            ],
            [
                'category' => 'category_shield',
                'name' => 'Bouclier en fer de défense',
                'description' => "<p>Ce bouclier en fer est imprégné de magie, lui permettant de renforcer la défense de son porteur. En plus d’offrir une défense solide, il renforce la robustesse de son utilisateur, lui permettant de tenir plus longtemps sur le champ de bataille.</p>",
                'picture' => 'shield_iron.png',
                'type' => 'Magique',
                'defense' => 3,
                'target' => 'defense',
                'amount' => 5,
                'price' => 1000,
                'reference' => 'shield_iron_defense',
            ],
        ];

        foreach($shields as $data) {
            $shield = new Shield();
            $shield->setCategory($this->getReference($data['category'], Category::class))
                ->setName($data['name'])
                ->setDescription($data['description'])
                ->setPicture($data['picture'])
                ->setType($data['type'])
                ->setDefense($data['defense'])
                ->setTarget($data['target'] ?? null)
                ->setEffect($data['effect'] ?? null)
                ->setAmount($data['amount'] ?? null)
                ->setPrice($data['price']);
            $manager->persist($shield);
            $this->addReference($data['reference'], $shield);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 7;
    }
}
