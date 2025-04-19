<?php

namespace App\DataFixtures\Item;

use App\DataFixtures\Item\Scroll\DefensiveTrait;
use App\DataFixtures\Item\Scroll\OffensiveTrait;
use App\DataFixtures\Item\Scroll\UtileTrait;
use App\Entity\Item\Category;
use App\Entity\Item\Scroll;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ScrollFixtures extends Fixture implements OrderedFixtureInterface
{
    use DefensiveTrait;
    use OffensiveTrait;
    use UtileTrait;

    public function load(ObjectManager $manager): void
    {
        $allScrolls = [
            // Défensif
            self::DEFENSIVE_SCROLLS,

            // Offensif
            self::OFFENSIVE_SCROLLS,

            // Utile
            self::UTILE_SCROLLS,
        ];

        foreach($allScrolls as $scrolls) {
            foreach($scrolls as $data) {
                $scroll = new Scroll();
                $scroll->setName($data['name'])
                    ->setPicture($data['picture'])
                    ->setDescription($data['description'])
                    ->setType($data['type'])
                    ->setPrice($data['price'])
                    ->setCategory($this->getReference($data['category'], Category::class))
                    ->setTarget($data['target'] ?? null)
                    ->setEffect($data['effect'] ?? null)
                    ->setAmount($data['amount'] ?? null)
                    ->setArea($data['area'] ?? null)
                    ->setDuration($data['duration'] ?? null);
                $manager->persist($scroll);
                $this->addReference($data['reference'], $scroll);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 16;
    }
}
