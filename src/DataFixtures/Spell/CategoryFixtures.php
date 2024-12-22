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
                'name' => 'Offensif',
                'position' => 1,
                'reference' => 'category_offensive',
            ],
            [
                'name' => 'Défensif',
                'position' => 2,
                'reference' => 'category_defensive',
            ],
            [
                'name' => 'Utile',
                'position' => 3,
                'reference' => 'category_utility',
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
        return 16;
    }
}
