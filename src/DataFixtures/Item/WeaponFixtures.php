<?php

namespace App\DataFixtures\Item;

use App\DataFixtures\Item\Weapon\CreatureTrait;
use App\DataFixtures\Item\Weapon\EnchantedTrait;
use App\DataFixtures\Item\Weapon\MeleeTrait;
use App\DataFixtures\Item\Weapon\RangedTrait;
use App\Entity\Item\Category;
use App\Entity\Item\Weapon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class WeaponFixtures extends Fixture implements OrderedFixtureInterface
{
    use CreatureTrait;
    use EnchantedTrait;
    use MeleeTrait;
    use RangedTrait;

    public function load(ObjectManager $manager): void
    {
        $allWeapons = [
            // Mêlée
            self::MELEE_WEAPONS,

            // Distance
            self::RANGED_WEAPONS,

            // Enchantée
            self::ENCHANTED_WEAPONS,

            // Créatures
            self::CREATURE_WEAPONS,
        ];

        foreach($allWeapons as $weapons) {
            foreach($weapons as $data) {
                $weapon = new Weapon();
                $weapon->setName($data['name'])
                    ->setPicture($data['picture'])
                    ->setDescription($data['description'])
                    ->setType($data['type'])
                    ->setPrice($data['price'])
                    ->setCategory($this->getReference($data['category'], Category::class))
                    ->setHealthMax($data['healthMax'])
                    ->setDamage($data['damage'])
                    ->setRange($data['range'])
                    ->setTarget($data['target'] ?? null)
                    ->setEffect($data['effect'] ?? null)
                    ->setAmount($data['amount'] ?? null)
                    ->setMagical($data['magical']);
                $manager->persist($weapon);
                $this->addReference($data['reference'], $weapon);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 18;
    }
}
