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
                'position' => 1,
                'picture' => 'fire.png',
                'reference' => 'category_fire',
            ],
            [
                'name' => 'Eau',
                'position' => 2,
                'picture' => 'water.png',
                'reference' => 'category_water',
            ],
            [
                'name' => 'Foudre',
                'position' => 3,
                'picture' => 'storm.png',
                'reference' => 'category_storm',
            ],
            [
                'name' => 'Mana',
                'position' => 4,
                'picture' => 'mana.png',
                'reference' => 'category_mana',
            ],
            [
                'name' => 'Bouclier',
                'position' => 5,
                'picture' => 'shield.png',
                'reference' => 'category_shield',
            ],
            [
                'name' => 'Restauration',
                'position' => 6,
                'picture' => 'restoration.png',
                'reference' => 'category_restoration',
            ],
            [
                'name' => 'Illusion',
                'position' => 7,
                'picture' => 'illusion.png',
                'reference' => 'category_illusion',
            ],
            [
                'name' => 'Nature',
                'position' => 8,
                'picture' => 'nature.png',
                'reference' => 'category_nature',
            ],
            [
                'name' => 'Métamorphose',
                'position' => 9,
                'picture' => 'metamorphosis.png',
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
        return 18;
    }
}
