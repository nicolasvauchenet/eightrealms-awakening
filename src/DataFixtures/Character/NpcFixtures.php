<?php

namespace App\DataFixtures\Character;

use App\Entity\Character\Npc;
use App\Entity\Character\Profession;
use App\Entity\Character\Race;
use App\Entity\Location\Location;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class NpcFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $characters = [
            // Port Saint-Doux
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
                'location' => 'location_zone_quartier_du_marche',
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
                'location' => 'location_zone_quartier_du_marche',
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
                'location' => 'location_zone_quartier_du_marche',
                'reference' => 'npc_bilo_le_passant',
            ],
            [
                'name' => 'Grand Prêtre de Port Saint-Doux',
                'picture' => 'pretre.png',
                'description' => "<p>Le Grand Prêtre de Port Saint-Doux semble plongé dans ses pensées. Il relève la tête en vous voyant vous approcher, et vous regarde avec un sourire bienveillant.</p><p><em>Bienvenue, mon enfant. Que puis-je faire pour vous aider&nbsp;?</em></p>",
                'strength' => 10,
                'dexterity' => 10,
                'constitution' => 10,
                'wisdom' => 16,
                'intelligence' => 13,
                'charisma' => 12,
                'healthMax' => 100,
                'health' => 100,
                'manaMax' => 65,
                'mana' => 65,
                'fortune' => 100,
                'level' => 2,
                'race' => 'race_humain',
                'profession' => 'profession_pretre',
                'location' => 'location_building_temple_de_port_saint_doux',
                'reference' => 'npc_grand_pretre_de_port_saint_doux',
            ],
            [
                'name' => 'Gart le Forgeron',
                'picture' => 'forgeron.png',
                'description' => "<p>Vous êtes face à un homme plutôt baraqué. Il est en train de travailler sur une épée, la sueur perlant sur son front couvert de suie. Il vous regarde avec un sourire chaleureux.</p><p><em>Bonjour&nbsp;! Vous cherchez une arme&nbsp;? Une armure&nbsp;? Un bouclier&nbsp;? Je peux vous forger une épée digne des plus grands héros&nbsp;!</em></p>",
                'strength' => 15,
                'dexterity' => 15,
                'constitution' => 16,
                'wisdom' => 10,
                'intelligence' => 8,
                'charisma' => 8,
                'healthMax' => 160,
                'health' => 160,
                'manaMax' => 40,
                'mana' => 40,
                'fortune' => 2000,
                'level' => 2,
                'race' => 'race_humain',
                'profession' => 'profession_forgeron',
                'location' => 'location_building_forge_de_port_saint_doux',
                'reference' => 'npc_gart_le_forgeron',
            ],
            [
                'name' => "Wilbert l'Arcaniste",
                'picture' => 'arcaniste.png',
                'description' => "<p>Vous êtes face à un homme plutôt maigre, vêtu d'une robe de mage. Il est en train de lire un vieux grimoire, plongé dans ses pensées. Il vous regarde avec un sourire bienveillant.</p><p><em>Bienvenue, aventurier. Que puis-je faire pour vous aider&nbsp;?</em></p>",
                'strength' => 9,
                'dexterity' => 11,
                'constitution' => 9,
                'wisdom' => 14,
                'intelligence' => 16,
                'charisma' => 13,
                'healthMax' => 90,
                'health' => 90,
                'manaMax' => 80,
                'mana' => 80,
                'fortune' => 2000,
                'level' => 2,
                'race' => 'race_gnome',
                'profession' => 'profession_arcaniste',
                'location' => 'location_building_arcanes_de_port_saint_doux',
                'reference' => 'npc_wilbert_larcaniste',
            ],
            [
                'name' => 'Jarrod le Tavernier',
                'picture' => 'tavernier.png',
                'description' => "<p>Le Tavernier de la Flûte Moisie est un homme jovial, toujours prêt à servir une bonne bière à ses clients. Il vous regarde avec un sourire chaleureux.</p><p><em>Bienvenue à la Flûte Moisie, aventurier. Que puis-je vous servir&nbsp;?</em></p>",
                'strength' => 11,
                'dexterity' => 12,
                'constitution' => 11,
                'wisdom' => 14,
                'intelligence' => 10,
                'charisma' => 10,
                'healthMax' => 110,
                'health' => 110,
                'manaMax' => 50,
                'mana' => 50,
                'fortune' => 500,
                'level' => 2,
                'race' => 'race_humain',
                'profession' => 'profession_tavernier',
                'location' => 'location_building_taverne_de_la_flute_moisie',
                'reference' => 'npc_jarrod_le_tavernier',
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
                ->setProfession($this->getReference($data['profession'], Profession::class))
                ->setLocation($this->getReference($data['location'], Location::class));
            $manager->persist($character);
            $this->addReference($data['reference'], $character);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 22;
    }
}
