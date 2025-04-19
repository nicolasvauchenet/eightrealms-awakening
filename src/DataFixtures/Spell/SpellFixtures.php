<?php

namespace App\DataFixtures\Spell;

use App\DataFixtures\Spell\Spell\DefensiveTrait;
use App\DataFixtures\Spell\Spell\OffensiveTrait;
use App\DataFixtures\Spell\Spell\UtileTrait;
use App\Entity\Spell\Category;
use App\Entity\Spell\Spell;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SpellFixtures extends Fixture implements OrderedFixtureInterface
{
    use DefensiveTrait;
    use OffensiveTrait;
    use UtileTrait;

    public function load(ObjectManager $manager): void
    {
        $allSpells = [
            // Défensif
            self::DEFENSIVE_SPELLS,

            // Offensif
            self::OFFENSIVE_SPELLS,

            // Utile
            self::UTILE_SPELLS,
        ];

        foreach($allSpells as $spells) {
            foreach($spells as $data) {
                $spell = new Spell();
                $spell->setName($data['name'])
                    ->setDescription($data['description'])
                    ->setType($data['type'])
                    ->setManaCost($data['manaCost'])
                    ->setTarget($data['target'] ?? null)
                    ->setEffect($data['effect'] ?? null)
                    ->setAmount($data['amount'] ?? null)
                    ->setArea($data['area'] ?? null)
                    ->setDuration($data['duration'] ?? null)
                    ->setCategory($this->getReference($data['category'], Category::class));
                $manager->persist($spell);
                $this->addReference($data['reference'], $spell);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 23;
    }
}
