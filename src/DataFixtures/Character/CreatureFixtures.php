<?php

namespace App\DataFixtures\Character;

use App\Entity\Character\Creature;
use App\Entity\Character\Race;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CreatureFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $creatures = [
            [
                'name' => 'Gros rat',
                'picture' => 'rat.png',
                'health' => 30,
                'mana' => 0,
                'damage' => 4,
                'defense' => 4,
                'fortune' => 0,
                'strength' => 8,
                'dexterity' => 13,
                'constitution' => 10,
                'intelligence' => 15,
                'charisma' => 12,
                'race' => 'race_rat',
                'level' => 1,
                'reference' => 'creature_rat',
            ],
        ];

        foreach($creatures as $data) {
            $creature = new Creature();
            $creature->setName($data['name'])
                ->setPicture($data['picture'])
                ->setDescription($data['description'] ?? null)
                ->setHealth($data['health'])
                ->setMana($data['mana'])
                ->setDamage($data['damage'])
                ->setDefense($data['defense'])
                ->setFortune($data['fortune'])
                ->setStrength($data['strength'])
                ->setDexterity($data['dexterity'])
                ->setConstitution($data['constitution'])
                ->setIntelligence($data['intelligence'])
                ->setCharisma($data['charisma'])
                ->setRace($this->getReference($data['race'], Race::class))
                ->setLevel($data['level']);
            $manager->persist($creature);
            $this->addReference($data['reference'], $creature);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 22;
    }
}
