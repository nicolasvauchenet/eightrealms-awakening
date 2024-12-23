<?php

namespace App\DataFixtures\Item;

use App\Entity\Item\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $categories = [
            [
                'name' => 'armor',
                'position' => 1,
                'reference' => 'category_armor',
            ],
            [
                'name' => 'shield',
                'position' => 2,
                'reference' => 'category_shield',
            ],
            [
                'name' => 'weapon',
                'position' => 3,
                'reference' => 'category_weapon',
            ],
            [
                'name' => 'ring',
                'position' => 4,
                'reference' => 'category_ring',
            ],
            [
                'name' => 'amulet',
                'position' => 5,
                'reference' => 'category_amulet',
            ],
            [
                'name' => 'scroll',
                'position' => 6,
                'reference' => 'category_scroll',
            ],
            [
                'name' => 'potion',
                'position' => 7,
                'reference' => 'category_potion',
            ],
            [
                'name' => 'food',
                'position' => 8,
                'reference' => 'category_food',
            ],
            [
                'name' => 'map',
                'position' => 9,
                'reference' => 'category_map',
            ],
            [
                'name' => 'quest',
                'position' => 10,
                'reference' => 'category_quest',
            ],
            [
                'name' => 'gift',
                'position' => 11,
                'reference' => 'category_gift',
            ],
        ];

        foreach($categories as $data) {
            $category = new Category();
            $category->setName($data['name'])
                ->setPosition($data['position']);
            $manager->persist($category);
            $this->addReference($data['reference'], $category);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 6;
    }
}
