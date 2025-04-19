<?php

namespace App\DataFixtures\Item;

use App\DataFixtures\Item\Ring\DefensiveTrait;
use App\DataFixtures\Item\Ring\OffensiveTrait;
use App\DataFixtures\Item\Ring\UtileTrait;
use App\Entity\Item\Category;
use App\Entity\Item\Ring;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RingFixtures extends Fixture implements OrderedFixtureInterface
{
    use DefensiveTrait;
    use OffensiveTrait;
    use UtileTrait;

    public function load(ObjectManager $manager): void
    {
        $allRings = [
            // Défensif
            self::DEFENSIVE_RINGS,

            // Offensif
            self::OFFENSIVE_RINGS,

            // Utile
            self::UTILE_RINGS,
        ];

        foreach($allRings as $rings) {
            foreach($rings as $data) {
                $ring = new Ring();
                $ring->setName($data['name'])
                    ->setPicture($data['picture'])
                    ->setDescription($data['description'])
                    ->setType($data['type'])
                    ->setPrice($data['price'])
                    ->setCategory($this->getReference($data['category'], Category::class))
                    ->setTarget($data['target'] ?? null)
                    ->setEffect($data['effect'] ?? null)
                    ->setAmount($data['amount'] ?? null);
                $manager->persist($ring);
                $this->addReference($data['reference'], $ring);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 15;
    }
}
