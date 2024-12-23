<?php

namespace App\DataFixtures\Item;

use App\Entity\Item\Category;
use App\Entity\Item\Misc;
use App\Entity\Item\Weapon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MiscFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $miscs = [
            // Non quest items
            [
                'category' => 'category_map',
                'name' => "Royaume de l'Île du Nord",
                'type' => 'map',
                'description' => "<p>Cette carte finement tracée dévoile les secrets du petit Royaume de l'Île du Nord. Très pratique pour quiconque souhaite percer les mystères de l'île.</p>",
                'picture' => 'map_royaume-de-lile-du-nord.png',
                'buyPrice' => 100,
                'mandatory' => true,
                'reference' => 'misc_map_royaume_de_lile_du_nord',
            ],
            [
                'category' => 'category_map',
                'name' => 'Port Saint-Doux',
                'type' => 'map',
                'description' => "<p>Ce parchemin révèle les moindres détails de la capitale Port Saint-Doux, ses quais animés, ses marchés colorés et ses ruelles labyrinthiques. Un indispensable pour quiconque souhaite explorer ses richesses ou éviter ses pièges.</p>",
                'picture' => 'map_port-saint-doux.png',
                'buyPrice' => 75,
                'mandatory' => true,
                'reference' => 'misc_map_port_saint_doux',
            ],
            [
                'category' => 'category_gift',
                'name' => 'Bouquet de fleurs',
                'type' => 'gift',
                'description' => "<p>Un charmant bouquet parfumé, parfait pour offrir ou égayer une journée.</p>",
                'picture' => 'flowers.png',
                'buyPrice' => 10,
                'mandatory' => false,
                'reference' => 'misc_gift_flowers',
            ],
            [
                'category' => 'category_ring',
                'name' => 'Anneau de cuivre',
                'type' => 'gift',
                'description' => "<p>Simple et modeste, cet anneau en cuivre est un bijou abordable au charme rustique.</p>",
                'picture' => 'ring_copper.png',
                'buyPrice' => 10,
                'mandatory' => false,
                'reference' => 'misc_ring_copper',
            ],
            [
                'category' => 'category_ring',
                'name' => "Anneau d'argent",
                'type' => 'gift',
                'description' => "<p>Raffiné et élégant, cet anneau en argent ajoute une touche de classe.</p>",
                'picture' => 'ring_silver.png',
                'buyPrice' => 100,
                'mandatory' => false,
                'reference' => 'misc_ring_silver',
            ],
            [
                'category' => 'category_ring',
                'name' => 'Anneau en or',
                'type' => 'gift',
                'description' => "<p>Symbole de richesse et de prestige, cet anneau en or brille d’élégance.</p>",
                'picture' => 'ring_gold.png',
                'buyPrice' => 200,
                'mandatory' => false,
                'reference' => 'misc_ring_gold',
            ],
            [
                'category' => 'category_food',
                'name' => 'Bouteille de vin',
                'type' => 'food',
                'description' => "<p>Une bouteille de vin rouge, parfaite pour accompagner un repas ou trinquer entre amis.</p>",
                'picture' => 'food_wine.png',
                'buyPrice' => 5,
                'target' => 'health',
                'amount' => 1,
                'mandatory' => false,
                'reference' => 'misc_food_wine',
            ],
            [
                'category' => 'category_food',
                'name' => 'Chope de bière',
                'type' => 'food',
                'description' => "<p>Une chope débordante de bière fraîche, idéale pour étancher la soif après une longue journée.</p>",
                'picture' => 'food_beer.png',
                'buyPrice' => 2,
                'target' => 'health',
                'amount' => 1,
                'mandatory' => false,
                'reference' => 'misc_food_beer',
            ],
            [
                'category' => 'category_food',
                'name' => 'Miche de pain',
                'type' => 'food',
                'description' => "<p>Une miche de pain dorée, incontournable pour un repas simple mais savoureux.</p>",
                'picture' => 'food_bread.png',
                'buyPrice' => 2,
                'target' => 'health',
                'amount' => 3,
                'mandatory' => false,
                'reference' => 'misc_food_bread',
            ],
            [
                'category' => 'category_food',
                'name' => 'Fromage de chèvre',
                'type' => 'food',
                'description' => "<p>Un fromage de chèvre crémeux et savoureux, parfait pour compléter un repas.</p>",
                'picture' => 'food_cheese.png',
                'buyPrice' => 3,
                'target' => 'health',
                'amount' => 3,
                'mandatory' => false,
                'reference' => 'misc_food_cheese',
            ],
            [
                'category' => 'category_food',
                'name' => 'Cuisse de poulet',
                'type' => 'food',
                'description' => "<p>Une cuisse de poulet rôtie, croustillante à l'extérieur et juteuse à l'intérieur.</p>",
                'picture' => 'food_chicken.png',
                'buyPrice' => 3,
                'target' => 'health',
                'amount' => 5,
                'mandatory' => false,
                'reference' => 'misc_food_chicken',
            ],
            [
                'category' => 'category_food',
                'name' => 'Poisson grillé',
                'type' => 'food',
                'description' => "<p>Ce poisson grillé est un délice pour les amateurs de saveurs marines.</p>",
                'picture' => 'food_fish.png',
                'buyPrice' => 4,
                'target' => 'health',
                'amount' => 7,
                'mandatory' => false,
                'reference' => 'misc_food_fish',
            ],
            [
                'category' => 'category_food',
                'name' => "Gigot d'agneau",
                'type' => 'food',
                'description' => "<p>Un gigot d'agneau tendre et savoureux, idéal pour un festin généreux.</p>",
                'picture' => 'food_meat.png',
                'buyPrice' => 5,
                'target' => 'health',
                'amount' => 8,
                'mandatory' => false,
                'reference' => 'misc_food_meat',
            ],
            // Quest items
        ];

        foreach($miscs as $data) {
            $misc = new Misc();
            $misc->setCategory($this->getReference($data['category'], Category::class))
                ->setName($data['name'])
                ->setType($data['type'])
                ->setDescription($data['description'])
                ->setPicture($data['picture'])
                ->setBuyPrice($data['buyPrice'])
                ->setTarget($data['target'] ?? null)
                ->setAmount($data['amount'] ?? null)
                ->setMandatory($data['mandatory']);
            $manager->persist($misc);
            $this->addReference($data['reference'], $misc);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 14;
    }
}
