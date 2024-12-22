<?php

namespace App\DataFixtures\Spell;

use App\Entity\Character\PreGenerated;
use App\Entity\Spell\CharacterSpell;
use App\Entity\Spell\Spell;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PreGeneratedSpellFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $characterSpells = [
            // Elandra la Sage
            [
                'character' => 'character_elandra',
                'spell' => 'spell_fireball',
                'level' => 3,
                'amountBonus' => 10,
                'areaBonus' => 3,
            ],
            [
                'character' => 'character_elandra',
                'spell' => 'spell_lightning',
                'level' => 2,
                'amountBonus' => 6,
                'areaBonus' => 2,
            ],
            [
                'character' => 'character_elandra',
                'spell' => 'spell_invisibility',
                'level' => 3,
                'durationBonus' => 3,
            ],
            [
                'character' => 'character_elandra',
                'spell' => 'spell_shield',
                'level' => 3,
                'amountBonus' => 18,
                'durationBonus' => 3,
            ],

            // Isilëa la Gardienne
            [
                'character' => 'character_isilea',
                'spell' => 'spell_heal',
                'level' => 4,
                'amountBonus' => 5,
            ],
            [
                'character' => 'character_isilea',
                'spell' => 'spell_ice_wall',
                'level' => 3,
                'durationBonus' => 3,
            ],
            [
                'character' => 'character_isilea',
                'spell' => 'spell_entangling_roots',
                'level' => 2,
                'durationBonus' => 2,
                'areaBonus' => 2,
            ],
            [
                'character' => 'character_isilea',
                'spell' => 'spell_summon_wolf',
                'level' => 3,
                'amountBonus' => 5,
                'durationBonus' => 3,
            ],
        ];

        foreach($characterSpells as $data) {
            $characterSpell = new CharacterSpell();
            $characterSpell->setCharacter($this->getReference($data['character'], PreGenerated::class))
                ->setSpell($this->getReference($data['spell'], Spell::class))
                ->setLevel($data['level'])
                ->setAmountBonus($data['amountBonus'] ?? null)
                ->setDurationBonus($data['durationBonus'] ?? null)
                ->setAreaBonus($data['areaBonus'] ?? null);
            $manager->persist($characterSpell);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 18;
    }
}
