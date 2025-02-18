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
                'name' => 'Armures',
                'position' => 1,
                'reference' => 'category_armor',
            ],
            [
                'name' => 'Boucliers',
                'position' => 2,
                'reference' => 'category_shield',
            ],
            [
                'name' => 'Armes',
                'position' => 3,
                'reference' => 'category_weapon',
            ],
            [
                'name' => 'Anneaux',
                'position' => 4,
                'reference' => 'category_ring',
            ],
            [
                'name' => 'Amulettes',
                'position' => 5,
                'reference' => 'category_amulet',
            ],
            [
                'name' => 'Parchemins',
                'position' => 6,
                'reference' => 'category_scroll',
            ],
            [
                'name' => 'Potions',
                'position' => 7,
                'reference' => 'category_potion',
            ],
            [
                'name' => 'Nourriture',
                'position' => 8,
                'reference' => 'category_food',
            ],
            [
                'name' => 'Cartes',
                'position' => 9,
                'reference' => 'category_map',
            ],
            [
                'name' => 'Objets de Quête',
                'position' => 10,
                'reference' => 'category_quest',
            ],
            [
                'name' => 'Cadeaux',
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
        return 5;
    }
}
