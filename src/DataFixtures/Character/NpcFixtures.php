<?php

namespace App\DataFixtures\Character;

use App\Entity\Character\Npc;
use App\Entity\Character\Profession;
use App\Entity\Character\Race;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class NpcFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $characters = [
            [
                'name' => 'Sophie La Marchande',
                'picture' => 'sophie-la-marchande.png',
                'health' => 100,
                'mana' => 50,
                'damage' => 4,
                'defense' => 2,
                'fortune' => 500,
                'strength' => 8,
                'dexterity' => 13,
                'constitution' => 10,
                'intelligence' => 15,
                'charisma' => 12,
                'race' => 'race_humain',
                'profession' => 'profession_marchand',
                'level' => 3,
                'reference' => 'npc_sophie_la_marchande',
            ],
            [
                'name' => 'Robert Le Garde',
                'picture' => 'robert-le-garde.png',
                'health' => 150,
                'mana' => 0,
                'damage' => 10,
                'defense' => 8,
                'fortune' => 100,
                'strength' => 12,
                'dexterity' => 11,
                'constitution' => 14,
                'intelligence' => 8,
                'charisma' => 7,
                'race' => 'race_humain',
                'profession' => 'profession_garde',
                'level' => 5,
                'reference' => 'npc_robert_le_garde',
            ],
            [
                'name' => 'Bilo le Passant',
                'picture' => 'bilo-le-passant.png',
                'health' => 50,
                'mana' => 10,
                'damage' => 4,
                'defense' => 2,
                'fortune' => 30,
                'strength' => 7,
                'dexterity' => 10,
                'constitution' => 10,
                'intelligence' => 12,
                'charisma' => 10,
                'race' => 'race_halfelin',
                'level' => 1,
                'reference' => 'npc_bilo_le_passant',
            ],
        ];

        foreach($characters as $data) {
            $character = new Npc();
            $character->setName($data['name'])
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
            if(isset($data['profession'])) {
                $character->setProfession($this->getReference($data['profession'], Profession::class));
            }
            $manager->persist($character);
            $this->addReference($data['reference'], $character);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 5;
    }
}
