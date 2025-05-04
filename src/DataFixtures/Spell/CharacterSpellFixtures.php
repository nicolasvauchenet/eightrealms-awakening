<?php

namespace App\DataFixtures\Spell;

use App\DataFixtures\Spell\CharacterSpell\CreatureTrait;
use App\DataFixtures\Spell\CharacterSpell\NpcTrait;
use App\Entity\Spell\CharacterSpell;
use App\Entity\Spell\Spell;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CharacterSpellFixtures extends Fixture implements OrderedFixtureInterface
{
    use CreatureTrait;
    use NpcTrait;

    public function load(ObjectManager $manager): void
    {
        $allCharacterSpells = [
            // Creatures
            self::CREATURES_SPELLS,

            // Druides
            self::NPC_SPELLS,
        ];

        foreach($allCharacterSpells as $characterSpell) {
            foreach($characterSpell as $data) {
                $characterSpell = new CharacterSpell();
                $characterSpell->setCharacter($this->getReference($data['character'], $data['characterClass']))
                    ->setSpell($this->getReference($data['spell'], Spell::class))
                    ->setLevel($data['level'])
                    ->setManaCost($data['manaCost'])
                    ->setAmountBonus($data['amountBonus'] ?? null)
                    ->setAreaBonus($data['areaBonus'] ?? null)
                    ->setDurationBonus($data['durationBonus'] ?? null);
                $manager->persist($characterSpell);
            }
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 35;
    }
}
