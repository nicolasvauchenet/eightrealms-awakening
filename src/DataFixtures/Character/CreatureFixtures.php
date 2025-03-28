<?php

namespace App\DataFixtures\Character;

use App\Entity\Character\Creature;
use App\Entity\Location\CreatureLocation;
use App\Entity\Location\Location;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CreatureFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $creatures = [
            // Rats
            [
                'name' => 'Gros rat',
                'picture' => 'rat.png',
                'thumb' => 'rat_thumb.png',
                'description' => "<p>Le rat est un animal nuisible qui se reproduit rapidement. Il est capable de transmettre des maladies et de causer des dégâts matériels. Il est important de s'en débarrasser rapidement.</p>",
                'strength' => 9,
                'dexterity' => 9,
                'constitution' => 8,
                'wisdom' => 7,
                'intelligence' => 10,
                'charisma' => 4,
                'healthMax' => 50,
                'manaMax' => 0,
                'fortune' => 0,
                'damage' => 10,
                'defense' => 3,
                'reference' => 'creature_gros_rat',
            ],
            [
                'name' => 'Rat géant',
                'picture' => 'rat-geant.png',
                'thumb' => 'rat-geant_thumb.png',
                'description' => "<p>Le rat est un animal nuisible qui se reproduit rapidement. Il est capable de transmettre des maladies et de causer des dégâts matériels. Il est important de s'en débarrasser rapidement.</p>",
                'strength' => 10,
                'dexterity' => 9,
                'constitution' => 10,
                'wisdom' => 7,
                'intelligence' => 12,
                'charisma' => 4,
                'healthMax' => 100,
                'manaMax' => 0,
                'fortune' => 0,
                'damage' => 12,
                'defense' => 5,
                'reference' => 'creature_rat_geant',
            ],

            // Gobelins
            [
                'name' => 'Éclaireur gobelin',
                'picture' => 'gobelineclaireur.png',
                'thumb' => 'gobelin-eclaireur_thumb.png',
                'description' => "<p>L'éclaireur gobelin est rapide et agile, mais manque de résistance physique. Il est souvent envoyé en avant-garde pour surveiller les alentours et rapporter des informations au groupe.</p>",
                'strength' => 8,
                'dexterity' => 13,
                'constitution' => 8,
                'wisdom' => 8,
                'intelligence' => 9,
                'charisma' => 6,
                'healthMax' => 60,
                'manaMax' => 10,
                'fortune' => 5,
                'damage' => 9,
                'defense' => 4,
                'reference' => 'creature_eclaireur_gobelin',
            ],
            [
                'name' => 'Guerrier gobelin',
                'picture' => 'gobelin-guerrier.png',
                'thumb' => 'gobelin-guerrier_thumb.png',
                'description' => "<p>Le guerrier gobelin représente la force de frappe moyenne des gobelins. Équipé d'armes rudimentaires mais efficaces, il n'hésitera pas à engager directement le combat.</p>",
                'strength' => 12,
                'dexterity' => 10,
                'constitution' => 12,
                'wisdom' => 9,
                'intelligence' => 8,
                'charisma' => 6,
                'healthMax' => 110,
                'manaMax' => 15,
                'fortune' => 10,
                'damage' => 14,
                'defense' => 7,
                'reference' => 'creature_guerrier_gobelin',
            ],
            [
                'name' => 'Chef gobelin',
                'picture' => 'gobelin-chef.png',
                'thumb' => 'gobelin-chef_thumb.png',
                'description' => "<p>Le chef gobelin est redouté pour sa férocité et ses capacités au combat. Plus intelligent et charismatique que ses semblables, il coordonne les attaques de ses subordonnés et représente une menace réelle.</p>",
                'strength' => 15,
                'dexterity' => 12,
                'constitution' => 15,
                'wisdom' => 12,
                'intelligence' => 11,
                'charisma' => 10,
                'healthMax' => 180,
                'manaMax' => 30,
                'fortune' => 20,
                'damage' => 20,
                'defense' => 10,
                'reference' => 'creature_chef_gobelin',
            ],
        ];

        foreach($creatures as $data) {
            $creature = new Creature();
            $creature->setName($data['name'])
                ->setPicture($data['picture'])
                ->setThumb($data['thumb'])
                ->setDescription($data['description'])
                ->setStrength($data['strength'])
                ->setDexterity($data['dexterity'])
                ->setConstitution($data['constitution'])
                ->setWisdom($data['wisdom'])
                ->setIntelligence($data['intelligence'])
                ->setCharisma($data['charisma'])
                ->setHealthMax($data['healthMax'])
                ->setManaMax($data['manaMax'])
                ->setFortune($data['fortune'])
                ->setDamage($data['damage'])
                ->setDefense($data['defense']);
            $manager->persist($creature);
            $this->addReference($data['reference'], $creature);

            if(isset($data['locations'])) {
                foreach($data['locations'] as $location) {
                    $creatureLocation = (new CreatureLocation())
                        ->setCreature($creature)
                        ->setLocation($this->getReference($location, Location::class));
                    $manager->persist($creatureLocation);
                }
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 27;
    }
}
