<?php

namespace App\DataFixtures\Item;

use App\DataFixtures\Item\Shield\ClassicalTrait;
use App\DataFixtures\Item\Shield\EnchantedTrait;
use App\Entity\Item\Category;
use App\Entity\Item\Shield;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ShieldFixtures extends Fixture implements OrderedFixtureInterface
{
    use ClassicalTrait;
    use EnchantedTrait;

    public function load(ObjectManager $manager): void
    {
        $allShields = [
            // Classique
            self::CLASSICAL_SHIELDS,

            // Enchanté
            self::ENCHANTED_SHIELDS,
        ];

        foreach($allShields as $shields) {
            foreach($shields as $data) {
                $shield = new Shield();
                $shield->setName($data['name'])
                    ->setPicture($data['picture'])
                    ->setDescription($data['description'])
                    ->setType($data['type'])
                    ->setPrice($data['price'])
                    ->setCategory($this->getReference($data['category'], Category::class))
                    ->setHealthMax($data['healthMax'])
                    ->setDefense($data['defense'])
                    ->setTarget($data['target'] ?? null)
                    ->setEffect($data['effect'] ?? null)
                    ->setAmount($data['amount'] ?? null)
                    ->setMagical($data['magical']);
                $manager->persist($shield);
                $this->addReference($data['reference'], $shield);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 17;
    }
}
