<?php

namespace App\DataFixtures\Item;

use App\DataFixtures\Item\Amulet\DefensiveTrait;
use App\DataFixtures\Item\Amulet\QuestTrait;
use App\Entity\Item\Amulet;
use App\Entity\Item\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AmuletFixtures extends Fixture implements OrderedFixtureInterface
{
    use DefensiveTrait;
    use QuestTrait;

    public function load(ObjectManager $manager): void
    {
        $allAmulets = [
            // Défensif
            self::DEFENSIVE_AMULETS,

            // Quête
            self::QUEST_AMULETS,
        ];

        foreach($allAmulets as $amulets) {
            foreach($amulets as $data) {
                $amulet = new Amulet();
                $amulet->setName($data['name'])
                    ->setPicture($data['picture'])
                    ->setDescription($data['description'])
                    ->setType($data['type'])
                    ->setPrice($data['price'])
                    ->setCategory($this->getReference($data['category'], Category::class))
                    ->setTarget($data['target'] ?? null)
                    ->setEffect($data['effect'] ?? null)
                    ->setAmount($data['amount'] ?? null);
                $manager->persist($amulet);
                $this->addReference($data['reference'], $amulet);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 8;
    }
}
