<?php

namespace App\DataFixtures\Item;

use App\DataFixtures\Item\Misc\QuestTrait;
use App\Entity\Item\Misc;
use App\Entity\Item\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MiscFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $allMiscs = [

        ];

        foreach($allMiscs as $miscs) {
            foreach($miscs as $data) {
                $misc = new Misc();
                $misc->setName($data['name'])
                    ->setPicture($data['picture'])
                    ->setDescription($data['description'])
                    ->setType($data['type'])
                    ->setPrice($data['price'])
                    ->setCategory($this->getReference($data['category'], Category::class));
                $manager->persist($misc);
                $this->addReference($data['reference'], $misc);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 23;
    }
}
