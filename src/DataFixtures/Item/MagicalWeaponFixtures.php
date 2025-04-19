<?php

namespace App\DataFixtures\Item;

use App\DataFixtures\Item\MagicalWeapon\DefensiveTrait;
use App\DataFixtures\Item\MagicalWeapon\OffensiveTrait;
use App\Entity\Item\Category;
use App\Entity\Item\MagicalWeapon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MagicalWeaponFixtures extends Fixture implements OrderedFixtureInterface
{
    use DefensiveTrait;
    use OffensiveTrait;

    public function load(ObjectManager $manager): void
    {
        $allMagicalWeapons = [
            // Défensif
            self::DEFENSIVE_MAGICAL_WEAPONS,

            // Offensif
            self::OFFENSIVE_MAGICAL_WEAPONS,
        ];

        foreach($allMagicalWeapons as $magicalWeapons) {
            foreach($magicalWeapons as $data) {
                $magicalWeapon = new MagicalWeapon();
                $magicalWeapon->setName($data['name'])
                    ->setDescription($data['description'])
                    ->setPicture($data['picture'])
                    ->setType($data['type'])
                    ->setPrice($data['price'])
                    ->setCategory($this->getReference($data['category'], Category::class))
                    ->setChargeMax($data['chargeMax'])
                    ->setTarget($data['target'])
                    ->setEffect($data['effect'] ?? null)
                    ->setAmount($data['amount'])
                    ->setArea($data['area'] ?? null)
                    ->setDuration($data['duration'] ?? null);
                $manager->persist($magicalWeapon);
                $this->addReference($data['reference'], $magicalWeapon);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 12;
    }
}
