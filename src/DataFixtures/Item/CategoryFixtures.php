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
                'folder' => 'armor',
                'position' => 1,
                'reference' => 'category_armor',
            ],
            [
                'name' => 'Bouclier',
                'folder' => 'shield',
                'position' => 2,
                'reference' => 'category_shield',
            ],
            [
                'name' => 'Arme Magique',
                'folder' => 'weapon',
                'position' => 3,
                'reference' => 'category_magical',
            ],
            [
                'name' => 'Arme',
                'folder' => 'weapon',
                'position' => 4,
                'reference' => 'category_weapon',
            ],
            [
                'name' => 'Anneau',
                'folder' => 'ring',
                'position' => 5,
                'reference' => 'category_ring',
            ],
            [
                'name' => 'Amulette',
                'folder' => 'amulet',
                'position' => 6,
                'reference' => 'category_amulet',
            ],
            [
                'name' => 'Parchemin',
                'folder' => 'scroll',
                'position' => 7,
                'reference' => 'category_scroll',
            ],
            [
                'name' => 'Potion',
                'folder' => 'potion',
                'position' => 8,
                'reference' => 'category_potion',
            ],
            [
                'name' => 'Nourriture',
                'folder' => 'food',
                'position' => 9,
                'reference' => 'category_food',
            ],
            [
                'name' => 'Carte',
                'folder' => 'map',
                'position' => 10,
                'reference' => 'category_map',
            ],
            [
                'name' => 'Livres',
                'folder' => 'book',
                'position' => 11,
                'reference' => 'category_book',
            ],
            [
                'name' => 'Cadeau',
                'folder' => 'gift',
                'position' => 12,
                'reference' => 'category_gift',
            ],
        ];

        foreach($categories as $data) {
            $category = new Category();
            $category->setName($data['name'])
                ->setFolder($data['folder'])
                ->setPosition($data['position']);
            $manager->persist($category);
            $this->addReference($data['reference'], $category);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 7;
    }
}
