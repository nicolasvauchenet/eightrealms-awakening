<?php

namespace App\DataFixtures\Spell;

use App\Entity\Spell\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $categories = [
            [
                'name' => 'Feu',
                'picture' => 'fire.png',
                'position' => 1,
                'reference' => 'category_fire',
            ],
            [
                'name' => 'Eau',
                'picture' => 'water.png',
                'position' => 2,
                'reference' => 'category_water',
            ],
            [
                'name' => 'Foudre',
                'picture' => 'storm.png',
                'position' => 3,
                'reference' => 'category_storm',
            ],
            [
                'name' => 'Mana',
                'picture' => 'mana.png',
                'position' => 4,
                'reference' => 'category_mana',
            ],
            [
                'name' => 'Bouclier',
                'picture' => 'shield.png',
                'position' => 5,
                'reference' => 'category_shield',
            ],
            [
                'name' => 'Restauration',
                'picture' => 'restoration.png',
                'position' => 6,
                'reference' => 'category_restoration',
            ],
            [
                'name' => 'Illusion',
                'picture' => 'illusion.png',
                'position' => 7,
                'reference' => 'category_illusion',
            ],
            [
                'name' => 'Nature',
                'picture' => 'nature.png',
                'position' => 8,
                'reference' => 'category_nature',
            ],
            [
                'name' => 'Métamorphose',
                'picture' => 'metamorphosis.png',
                'position' => 9,
                'reference' => 'category_metamorphosis',
            ],
        ];

        foreach($categories as $data) {
            $category = new Category();
            $category->setName($data['name'])
                ->setPicture($data['picture'])
                ->setPosition($data['position']);
            $manager->persist($category);
            $this->addReference($data['reference'], $category);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 22;
    }
}
