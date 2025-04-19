<?php

namespace App\DataFixtures\Character;

use App\DataFixtures\Character\Creature\GobelinTrait;
use App\DataFixtures\Character\Creature\RatTrait;
use App\DataFixtures\Character\Creature\SireneTrait;
use App\Entity\Character\Creature;
use App\Entity\Character\Race;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CreatureFixtures extends Fixture implements OrderedFixtureInterface
{
    use GobelinTrait;
    use RatTrait;
    use SireneTrait;

    public function load(ObjectManager $manager): void
    {
        $allCreatures = [
            // Rats
            self::RAT_CREATURES,

            // Gobelins
            self::GOBELIN_CREATURES,

            // Sirènes
            self::SIRENE_CREATURES,
        ];

        foreach($allCreatures as $creatures) {
            foreach($creatures as $data) {
                $creature = new Creature();
                $creature->setName($data['name'])
                    ->setPicture($data['picture'])
                    ->setThumbnail($data['thumbnail'])
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
                    ->setRace($this->getReference($data['race'], Race::class))
                    ->setLevel($data['level']);
                $manager->persist($creature);
                $this->addReference($data['reference'], $creature);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 6;
    }
}
