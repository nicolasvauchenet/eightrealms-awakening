<?php

namespace App\DataFixtures\Item;

use App\DataFixtures\Item\Food\AlcoholTrait;
use App\DataFixtures\Item\Food\ClassicalTrait;
use App\DataFixtures\Item\Food\CreatureTrait;
use App\Entity\Item\Category;
use App\Entity\Item\Food;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class FoodFixtures extends Fixture implements OrderedFixtureInterface
{
    use AlcoholTrait;
    use ClassicalTrait;
    use CreatureTrait;

    public function load(ObjectManager $manager): void
    {
        $allFoods = [
            // Alcool
            self::ALCOHOL_FOOD,

            // Classique
            self::CLASSICAL_FOOD,

            // Créatures
            self::CREATURE_FOOD,
        ];

        foreach($allFoods as $foods) {
            foreach($foods as $data) {
                $food = new Food();
                $food->setName($data['name'])
                    ->setPicture($data['picture'])
                    ->setDescription($data['description'])
                    ->setType($data['type'])
                    ->setPrice($data['price'])
                    ->setCategory($this->getReference($data['category'], Category::class))
                    ->setTarget($data['target'])
                    ->setEffect($data['effect'] ?? null)
                    ->setAmount($data['amount'])
                    ->setDuration($data['duration'] ?? null);
                $manager->persist($food);
                $this->addReference($data['reference'], $food);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 10;
    }
}
