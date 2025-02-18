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
                'name' => 'Armure',
                'position' => 1,
                'folder' => 'armor',
                'reference' => 'category_armor',
            ],
            [
                'name' => 'Bouclier',
                'position' => 2,
                'folder' => 'shield',
                'reference' => 'category_shield',
            ],
            [
                'name' => 'Arme',
                'position' => 3,
                'folder' => 'weapon',
                'reference' => 'category_weapon',
            ],
            [
                'name' => 'Arme Magique',
                'position' => 4,
                'folder' => 'weapon',
                'reference' => 'category_magical',
            ],
            [
                'name' => 'Anneau',
                'position' => 5,
                'folder' => 'ring',
                'reference' => 'category_ring',
            ],
            [
                'name' => 'Amulette',
                'position' => 6,
                'folder' => 'amulet',
                'reference' => 'category_amulet',
            ],
            [
                'name' => 'Parchemin',
                'position' => 7,
                'folder' => 'scroll',
                'reference' => 'category_scroll',
            ],
            [
                'name' => 'Potion',
                'position' => 8,
                'folder' => 'potion',
                'reference' => 'category_potion',
            ],
            [
                'name' => 'Nourriture',
                'position' => 9,
                'folder' => 'food',
                'reference' => 'category_food',
            ],
            [
                'name' => 'Carte',
                'position' => 10,
                'folder' => 'map',
                'reference' => 'category_map',
            ],
            [
                'name' => 'Cadeau',
                'position' => 11,
                'folder' => 'gift',
                'reference' => 'category_gift',
            ],
        ];

        foreach($categories as $data) {
            $category = new Category();
            $category->setName($data['name'])
                ->setPosition($data['position'])
                ->setFolder($data['folder']);
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
