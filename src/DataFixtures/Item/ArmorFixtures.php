<?php

namespace App\DataFixtures\Item;

use App\DataFixtures\Item\Armor\ClassicalTrait;
use App\DataFixtures\Item\Armor\CreatureTrait;
use App\DataFixtures\Item\Armor\EnchantedTrait;
use App\Entity\Item\Armor;
use App\Entity\Item\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ArmorFixtures extends Fixture implements OrderedFixtureInterface
{
    use ClassicalTrait;
    use CreatureTrait;
    use EnchantedTrait;

    public function load(ObjectManager $manager): void
    {
        $allArmors = [
            // Classiques
            self::CLASSICAL_ARMORS,

            // Enchantées
            self::ENCHANTED_ARMORS,

            // Créatures
            self::CREATURE_ARMORS,
        ];

        foreach($allArmors as $armors) {
            foreach($armors as $data) {
                $armor = new Armor();
                $armor->setName($data['name'])
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
                $manager->persist($armor);
                $this->addReference($data['reference'], $armor);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 9;
    }
}
