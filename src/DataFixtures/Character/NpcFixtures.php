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
                'description' => "<p>Vous êtes face à une marchande. Elle vous regarde avec un sourire bienveillant. Elle semble prête à vous aider si vous avez besoin de quelque chose.</p>",
                'strength' => 8,
                'dexterity' => 13,
                'constitution' => 10,
                'wisdom' => 10,
                'intelligence' => 15,
                'charisma' => 12,
                'healthMax' => 100,
                'health' => 100,
                'manaMax' => 50,
                'mana' => 50,
                'fortune' => 500,
                'level' => 1,
                'race' => 'race_humain',
                'profession' => 'profession_marchand',
                'reference' => 'npc_sophie_la_marchande',
            ],
            [
                'name' => 'Robert Le Garde',
                'picture' => 'robert-le-garde.png',
                'description' => "<p>Vous êtes face à un garde de la ville. Il est en armure et son arme est prête à être dégainée. Il vous regarde avec méfiance.</p><p><em>Qu'y a-t-il, citoyen&nbsp;? Un problème&nbsp;? Faites vite&nbsp;!</em></p>",
                'strength' => 12,
                'dexterity' => 11,
                'constitution' => 14,
                'wisdom' => 11,
                'intelligence' => 8,
                'charisma' => 7,
                'healthMax' => 150,
                'health' => 150,
                'manaMax' => 0,
                'mana' => 0,
                'fortune' => 100,
                'level' => 5,
                'race' => 'race_humain',
                'profession' => 'profession_garde',
                'reference' => 'npc_robert_le_garde',
            ],
            [
                'name' => 'Bilo le Passant',
                'picture' => 'bilo-le-passant.png',
                'description' => "<p>Vous croisez un passant qui semble désœuvré. Il vous regarde avec insistance, comme s'il avait quelque chose à vous dire.</p><p><em>Euh… Oui&nbsp;? Bonjour&nbsp;? Je m'appelle Bilo&nbsp;! Comment allez-vous&nbsp;?</em></p>",
                'strength' => 7,
                'dexterity' => 10,
                'constitution' => 10,
                'wisdom' => 12,
                'intelligence' => 12,
                'charisma' => 10,
                'healthMax' => 50,
                'health' => 50,
                'manaMax' => 10,
                'mana' => 10,
                'fortune' => 30,
                'level' => 1,
                'race' => 'race_halfelin',
                'profession' => 'profession_passant',
                'reference' => 'npc_bilo_le_passant',
            ],
        ];

        foreach($characters as $data) {
            $character = new Npc();
            $character->setName($data['name'])
                ->setPicture($data['picture'])
                ->setDescription($data['description'])
                ->setStrength($data['strength'])
                ->setDexterity($data['dexterity'])
                ->setConstitution($data['constitution'])
                ->setWisdom($data['wisdom'])
                ->setIntelligence($data['intelligence'])
                ->setCharisma($data['charisma'])
                ->setHealthMax($data['healthMax'])
                ->setHealth($data['health'])
                ->setManaMax($data['manaMax'])
                ->setMana($data['mana'])
                ->setFortune($data['fortune'])
                ->setLevel($data['level'])
                ->setRace($this->getReference($data['race'], Race::class))
                ->setProfession($this->getReference($data['profession'], Profession::class));
            $manager->persist($character);
            $this->addReference($data['reference'], $character);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 21;
    }
}
