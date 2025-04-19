<?php

namespace App\DataFixtures\Character;

use App\DataFixtures\Character\Profession\FightTrait;
use App\DataFixtures\Character\Profession\MagicTrait;
use App\DataFixtures\Character\Profession\SpecialTrait;
use App\DataFixtures\Character\Profession\StealthTrait;
use App\DataFixtures\Character\Profession\TradeTrait;
use App\Entity\Character\Profession;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProfessionFixtures extends Fixture implements OrderedFixtureInterface
{
    use FightTrait;
    use MagicTrait;
    use SpecialTrait;
    use StealthTrait;
    use TradeTrait;

    public function load(ObjectManager $manager): void
    {
        $allProfessions = [
            // Classes de combat physique
            self::FIGHT_PROFESSIONS,

            // Classes magiques
            self::MAGIC_PROFESSIONS,

            // Classes spécialisées
            self::SPECIAL_PROFESSIONS,

            // Classes furtives
            self::STEALTH_PROFESSIONS,

            // Classes de commerce
            self::TRADE_PROFESSIONS,
        ];

        foreach($allProfessions as $professions) {
            foreach($professions as $data) {
                $profession = new Profession();
                $profession->setName($data['name'])
                    ->setType($data['type'])
                    ->setPlayable($data['playable']);
                $manager->persist($profession);
                $this->addReference($data['reference'], $profession);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 3;
    }
}
