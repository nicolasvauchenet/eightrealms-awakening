<?php

namespace App\DataFixtures\Character;

use App\DataFixtures\Character\Creature\BouquetinTrait;
use App\DataFixtures\Character\Creature\DemonTrait;
use App\DataFixtures\Character\Creature\DragonTrait;
use App\DataFixtures\Character\Creature\FantomeTrait;
use App\DataFixtures\Character\Creature\GobelinTrait;
use App\DataFixtures\Character\Creature\HarpieTrait;
use App\DataFixtures\Character\Creature\LoupTrait;
use App\DataFixtures\Character\Creature\RatTrait;
use App\DataFixtures\Character\Creature\SireneTrait;
use App\DataFixtures\Character\Creature\SqueletteTrait;
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
    use LoupTrait;
    use FantomeTrait;
    use HarpieTrait;
    use BouquetinTrait;
    use DragonTrait;
    use SqueletteTrait;
    use DemonTrait;

    public function load(ObjectManager $manager): void
    {
        $allCreatures = [
            // Rats
            self::RAT_CREATURES,

            // Gobelins
            self::GOBELIN_CREATURES,

            // Sirènes
            self::SIRENE_CREATURES,

            // Loups
            self::LOUP_CREATURES,

            // Fantômes
            self::FANTOME_CREATURES,

            // Harpies
            self::HARPIE_CREATURES,

            // Bouquetins
            self::BOUQUETIN_CREATURES,

            // Dragons
            self::DRAGON_CREATURES,

            // Squelettes
            self::SQUELETTE_CREATURES,

            // Démons
            self::DEMON_CREATURES,
        ];

        foreach($allCreatures as $creatures) {
            foreach($creatures as $data) {
                $creature = new Creature();
                $creature->setName($data['name'])
                    ->setPicture($data['picture'])
                    ->setPictureAngry($data['picture_angry'] ?? null)
                    ->setThumbnail($data['thumbnail'])
                    ->setDescription($data['description'])
                    ->setDescriptionAngry($data['description_angry'] ?? null)
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
