<?php

namespace App\DataFixtures\Spell;

use App\DataFixtures\Spell\PreGeneratedSpell\ElandraTrait;
use App\DataFixtures\Spell\PreGeneratedSpell\IsileaTrait;
use App\Entity\Character\PreGenerated;
use App\Entity\Spell\CharacterSpell;
use App\Entity\Spell\Spell;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PreGeneratedSpellFixtures extends Fixture implements OrderedFixtureInterface
{
    use ElandraTrait;
    use IsileaTrait;

    public function load(ObjectManager $manager): void
    {
        $allCharacterSpells = [
            // Elandra la Sage
            self::ELANDRA_SPELLS,

            // Isilëa la Gardienne
            self::ISILEA_SPELLS,
        ];

        foreach($allCharacterSpells as $characterSpell) {
            foreach($characterSpell as $data) {
                $characterSpell = new CharacterSpell();
                $characterSpell->setCharacter($this->getReference($data['character'], PreGenerated::class))
                    ->setSpell($this->getReference($data['spell'], Spell::class))
                    ->setLevel($data['level'])
                    ->setManaCost($data['manaCost'])
                    ->setAmountBonus($data['amountBonus'])
                    ->setAreaBonus($data['areaBonus'])
                    ->setDurationBonus($data['durationBonus']);
                $manager->persist($characterSpell);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 25;
    }
}
