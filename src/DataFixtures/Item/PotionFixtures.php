<?php

namespace App\DataFixtures\Item;

use App\DataFixtures\Item\Potion\DefensiveTrait;
use App\DataFixtures\Item\Potion\QuestTrait;
use App\DataFixtures\Item\Potion\UtileTrait;
use App\Entity\Item\Category;
use App\Entity\Item\Potion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PotionFixtures extends Fixture implements OrderedFixtureInterface
{
    use DefensiveTrait;
    use UtileTrait;
    use QuestTrait;

    public function load(ObjectManager $manager): void
    {
        $allPotions = [
            // Défensif
            self::DEFENSIVE_POTIONS,

            // Utile
            self::UTILE_POTIONS,

            // Quête
            self::QUEST_POTIONS,
        ];

        foreach($allPotions as $potions) {
            foreach($potions as $data) {
                $potion = new Potion();
                $potion->setName($data['name'])
                    ->setPicture($data['picture'])
                    ->setDescription($data['description'])
                    ->setType($data['type'])
                    ->setPrice($data['price'])
                    ->setCategory($this->getReference($data['category'], Category::class))
                    ->setTarget($data['target'] ?? null)
                    ->setEffect($data['effect'] ?? null)
                    ->setAmount($data['amount'] ?? null)
                    ->setDuration($data['duration'] ?? null);
                $manager->persist($potion);
                $this->addReference($data['reference'], $potion);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 14;
    }
}
