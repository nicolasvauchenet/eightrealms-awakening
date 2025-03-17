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
                'damage' => 12,
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
                'damage' => 15,
                'defense' => 5,
                'reference' => 'creature_rat_geant',
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
