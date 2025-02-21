<?php

namespace App\DataFixtures\Item;

use App\Entity\Item\Category;
use App\Entity\Item\Food;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class FoodFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $foods = [
            // Avec effet
            [
                'category' => 'category_food',
                'name' => 'Bouteille de vin',
                'description' => "<p>Une bouteille de vin rouge, parfaite pour accompagner un repas ou trinquer entre amis.</p>",
                'picture' => 'food_wine.png',
                'type' => 'food',
                'target' => 'health',
                'effect' => 'Ivresse',
                'amount' => 1,
                'duration' => 5,
                'price' => 5,
                'reference' => 'food_wine',
            ],
            [
                'category' => 'category_food',
                'name' => 'Chope de bière',
                'description' => "<p>Une chope débordante de bière fraîche, idéale pour étancher la soif après une longue journée.</p>",
                'picture' => 'food_beer.png',
                'type' => 'food',
                'target' => 'health',
                'effect' => 'Ivresse',
                'amount' => 1,
                'duration' => 2,
                'price' => 2,
                'reference' => 'food_beer',
            ],

            // Sans effet
            [
                'category' => 'category_food',
                'name' => 'Miche de pain',
                'description' => "<p>Une miche de pain dorée, incontournable pour un repas simple mais savoureux.</p>",
                'picture' => 'food_bread.png',
                'type' => 'food',
                'target' => 'health',
                'amount' => 3,
                'price' => 2,
                'reference' => 'food_bread',
            ],
            [
                'category' => 'category_food',
                'name' => 'Fromage de chèvre',
                'description' => "<p>Un fromage de chèvre crémeux et savoureux, parfait pour compléter un repas.</p>",
                'picture' => 'food_cheese.png',
                'type' => 'food',
                'target' => 'health',
                'amount' => 3,
                'price' => 3,
                'reference' => 'food_cheese',
            ],
            [
                'category' => 'category_food',
                'name' => 'Cuisse de poulet',
                'description' => "<p>Une cuisse de poulet rôtie, croustillante à l'extérieur et juteuse à l'intérieur.</p>",
                'picture' => 'food_chicken.png',
                'type' => 'food',
                'target' => 'health',
                'amount' => 5,
                'price' => 3,
                'reference' => 'food_chicken',
            ],
            [
                'category' => 'category_food',
                'name' => 'Poisson grillé',
                'description' => "<p>Ce poisson grillé est un délice pour les amateurs de saveurs marines.</p>",
                'picture' => 'food_fish.png',
                'type' => 'food',
                'target' => 'health',
                'amount' => 7,
                'price' => 4,
                'reference' => 'food_fish',
            ],
            [
                'category' => 'category_food',
                'name' => "Gigot d'agneau",
                'description' => "<p>Un gigot d'agneau tendre et savoureux, idéal pour un festin généreux.</p>",
                'picture' => 'food_meat.png',
                'type' => 'food',
                'target' => 'health',
                'amount' => 8,
                'price' => 5,
                'reference' => 'food_meat',
            ],

            // Récolte
            [
                'category' => 'category_food',
                'name' => 'Viande de rat',
                'description' => "<p>De la viande de rat fraîche, à cuire pour un repas simple mais nourrissant.</p>",
                'picture' => 'food_meat.png',
                'type' => 'food',
                'target' => 'health',
                'amount' => 5,
                'price' => 3,
                'reference' => 'food_rat',
            ],
        ];

        foreach($foods as $data) {
            $food = new Food();
            $food->setCategory($this->getReference($data['category'], Category::class))
                ->setName($data['name'])
                ->setDescription($data['description'])
                ->setPicture($data['picture'])
                ->setType($data['type'])
                ->setTarget($data['target'] ?? null)
                ->setEffect($data['effect'] ?? null)
                ->setAmount($data['amount'] ?? null)
                ->setDuration($data['duration'] ?? null)
                ->setPrice($data['price']);
            $manager->persist($food);
            $this->addReference($data['reference'], $food);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 14;
    }
}
