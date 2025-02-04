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
                'level' => 1,
            ],
            [
                'character' => 'character_elandra',
                'spell' => 'spell_lightning',
                'level' => 1,
            ],
            [
                'character' => 'character_elandra',
                'spell' => 'spell_invisibility',
                'level' => 1,
            ],
            [
                'character' => 'character_elandra',
                'spell' => 'spell_shield',
                'level' => 1,
            ],

            // Isilëa la Gardienne
            [
                'character' => 'character_isilea',
                'spell' => 'spell_heal',
                'level' => 1,
            ],
            [
                'character' => 'character_isilea',
                'spell' => 'spell_ice_wall',
                'level' => 1,
            ],
            [
                'character' => 'character_isilea',
                'spell' => 'spell_entangling_roots',
                'level' => 1,
            ],
            [
                'character' => 'character_isilea',
                'spell' => 'spell_summon_wolf',
                'level' => 1,
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
