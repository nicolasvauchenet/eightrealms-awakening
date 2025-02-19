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
                'level' => 2,
                'mana' => 5,
                'amount' => 5,
                'area' => 1,
                'duration' => 0,
            ],
            [
                'character' => 'character_elandra',
                'spell' => 'spell_iceball',
                'level' => 1,
                'mana' => 0,
                'amount' => 0,
                'area' => 0,
                'duration' => 0,
            ],
            [
                'character' => 'character_elandra',
                'spell' => 'spell_arcane_nova',
                'level' => 1,
                'mana' => 0,
                'amount' => 0,
                'area' => 0,
                'duration' => 0,
            ],
            [
                'character' => 'character_elandra',
                'spell' => 'spell_shield',
                'level' => 1,
                'mana' => 0,
                'amount' => 0,
                'area' => 0,
                'duration' => 0,
            ],
            [
                'character' => 'character_elandra',
                'spell' => 'spell_invisibility',
                'level' => 1,
                'mana' => 0,
                'amount' => 0,
                'area' => 0,
                'duration' => 0,
            ],
            [
                'character' => 'character_elandra',
                'spell' => 'spell_ice_wall',
                'level' => 1,
                'mana' => 0,
                'amount' => 0,
                'area' => 0,
                'duration' => 0,
            ],

            // Isilëa la Gardienne
            [
                'character' => 'character_isilea',
                'spell' => 'spell_healrestore',
                'level' => 1,
                'mana' => 0,
                'amount' => 0,
                'area' => 0,
                'duration' => 0,
            ],
            [
                'character' => 'character_isilea',
                'spell' => 'spell_manarestore',
                'level' => 1,
                'mana' => 0,
                'amount' => 0,
                'area' => 0,
                'duration' => 0,
            ],
            [
                'character' => 'character_isilea',
                'spell' => 'spell_entangling_roots',
                'level' => 1,
                'mana' => 0,
                'amount' => 0,
                'area' => 0,
                'duration' => 0,
            ],
            [
                'character' => 'character_isilea',
                'spell' => 'spell_metamorphosis_wolf',
                'level' => 2,
                'mana' => 5,
                'amount' => 0,
                'area' => 0,
                'duration' => 1,
            ],
        ];

        foreach($characterSpells as $data) {
            $characterSpell = new CharacterSpell();
            $characterSpell->setCharacter($this->getReference($data['character'], PreGenerated::class))
                ->setSpell($this->getReference($data['spell'], Spell::class))
                ->setLevel($data['level'])
                ->setMana($data['mana'])
                ->setAmount($data['amount'])
                ->setArea($data['area'])
                ->setDuration($data['duration']);
            $manager->persist($characterSpell);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 20;
    }
}
