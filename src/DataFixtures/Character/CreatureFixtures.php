<?php

namespace App\DataFixtures\Character;

use App\DataFixtures\Character\Creature\InfernalTrait;
use App\DataFixtures\Character\Creature\LegendaireTrait;
use App\DataFixtures\Character\Creature\RevenantTrait;
use App\DataFixtures\Character\Creature\MonstreTrait;
use App\DataFixtures\Character\Creature\SauvageTrait;
use App\DataFixtures\Character\Creature\AquatiqueTrait;
use App\Entity\Character\Creature;
use App\Entity\Character\Race;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CreatureFixtures extends Fixture implements OrderedFixtureInterface
{
    use SauvageTrait;
    use AquatiqueTrait;
    use RevenantTrait;
    use MonstreTrait;
    use LegendaireTrait;
    use InfernalTrait;

    public function load(ObjectManager $manager): void
    {
        $allCreatures = [
            // Bêtes sauvages
            self::WILD_CREATURES,

            // Créatures aquatiques
            self::AQUATIC_CREATURES,

            // Créatures monstrueuses
            self::MONSTROUS_CREATURES,

            // Âmes revenantes
            self::GHOST_CREATURES,

            // Créatures légendaires
            self::LEGENDARY_CREATURES,

            // Entités infernales
            self::INFERNAL_CREATURES,
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
