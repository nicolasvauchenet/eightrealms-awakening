<?php

namespace App\DataFixtures\Character\Player;

use App\Entity\Character\Player;
use App\Entity\Character\Profession;
use App\Entity\Character\Race;
use App\Entity\Item\Amulet;
use App\Entity\Item\Armor;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\MagicalWeapon;
use App\Entity\Item\Potion;
use App\Entity\Item\Scroll;
use App\Entity\Item\Shield;
use App\Entity\Item\Weapon;
use App\Entity\Location\Location;
use App\Entity\Spell\CharacterSpell;
use App\Entity\Spell\Spell;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ElandraFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $characters = [
            [
                'name' => 'Elandra la Sage',
                'picture' => 'elandra-la-sage.png',
                'description' => "<p>Originaire de <strong>Port Saint-Doux</strong>, Elandra la Sage est une <strong>mage</strong> respectée, célèbre pour sa maîtrise des <strong>arts arcanes</strong> et sa profonde <strong>sagesse</strong>. Née dans une famille de marchands, elle s’est rapidement démarquée par son <strong>intelligence</strong> et sa <strong>curiosité</strong> insatiable. Enfant, elle passait des heures à explorer les bibliothèques de la ville, fascinée par les <strong>légendes</strong> anciennes et les secrets de la <strong>magie</strong>. Son talent exceptionnel l’a conduite à étudier auprès des meilleurs érudits du royaume, mais c’est à Port Saint-Doux qu’elle revient toujours, puisant dans l’énergie mystique des flots pour alimenter ses <strong>sorts</strong>. Elandra est connue pour sa <strong>robe élégante</strong> et son <strong>bâton</strong> lumineux, symbole de sa connexion avec les <strong>forces élémentaires</strong>. Bien que <strong>sage</strong> et réfléchie, elle est aussi une <strong>conseillère</strong> attentive pour les habitants de Port Saint-Doux, les guidant à travers les défis par son <strong>savoir</strong> et sa <strong>bienveillance</strong>.</p>",
                'level' => 1,
                'experience' => 0,
                'strength' => 8,
                'dexterity' => 12,
                'constitution' => 9,
                'wisdom' => 14,
                'intelligence' => 16,
                'charisma' => 10,
                'healthMax' => 90,
                'health' => 90,
                'manaMax' => 80,
                'mana' => 80,
                'fortune' => 200,
                'race' => 'race_elfe',
                'profession' => 'profession_mage',
                'owner' => 'user_player',
                'reference' => 'character_elandra',
            ],
        ];

        $characterItems = [
            [
                'isEquipped' => true,
                'slot' => 'righthand',
                'character' => 'character_elandra',
                'item' => 'magical_firestick',
                'class' => MagicalWeapon::class,
            ],
            [
                'isEquipped' => false,
                'character' => 'character_elandra',
                'item' => 'armor_mage_apprentice',
                'class' => Armor::class,
            ],
            [
                'isEquipped' => true,
                'slot' => 'potion',
                'character' => 'character_elandra',
                'item' => 'potion_lightmana',
                'class' => Potion::class,
            ],
            [
                'isEquipped' => false,
                'character' => 'character_elandra',
                'item' => 'potion_lightmana',
                'class' => Potion::class,
            ],
            [
                'isEquipped' => false,
                'character' => 'character_elandra',
                'item' => 'potion_lightmana',
                'class' => Potion::class,
            ],
            [
                'isEquipped' => false,
                'character' => 'character_elandra',
                'item' => 'amulet_mana',
                'class' => Amulet::class,
            ],
            [
                'isEquipped' => false,
                'character' => 'character_elandra',
                'item' => 'armor_iron',
                'class' => Armor::class,
            ],
            [
                'isEquipped' => true,
                'slot' => 'lefthand',
                'character' => 'character_elandra',
                'item' => 'weapon_dagger',
                'class' => Weapon::class,
            ],
            [
                'isEquipped' => true,
                'slot' => 'scroll',
                'character' => 'character_elandra',
                'item' => 'scroll_heal',
                'class' => Scroll::class,
            ],
        ];

        $characterSpells = [
            [
                'character' => 'character_elandra',
                'spell' => 'spell_fireball',
                'level' => 2,
                'manaCost' => 5,
                'amountBonus' => 5,
                'areaBonus' => 1,
                'durationBonus' => 0,
            ],
            [
                'character' => 'character_elandra',
                'spell' => 'spell_iceball',
                'level' => 1,
                'manaCost' => 0,
                'amountBonus' => 0,
                'areaBonus' => 0,
                'durationBonus' => 0,
            ],
            [
                'character' => 'character_elandra',
                'spell' => 'spell_arcane_nova',
                'level' => 1,
                'manaCost' => 0,
                'amountBonus' => 0,
                'areaBonus' => 0,
                'durationBonus' => 0,
            ],
            [
                'character' => 'character_elandra',
                'spell' => 'spell_shield',
                'level' => 1,
                'manaCost' => 0,
                'amountBonus' => 0,
                'areaBonus' => 0,
                'durationBonus' => 0,
            ],
            [
                'character' => 'character_elandra',
                'spell' => 'spell_invisibility',
                'level' => 1,
                'manaCost' => 0,
                'amountBonus' => 0,
                'areaBonus' => 0,
                'durationBonus' => 0,
            ],
            [
                'character' => 'character_elandra',
                'spell' => 'spell_ice_wall',
                'level' => 1,
                'manaCost' => 0,
                'amountBonus' => 0,
                'areaBonus' => 0,
                'durationBonus' => 0,
            ],
        ];

        foreach($characters as $data) {
            $character = new Player();
            $character->setName($data['name'])
                ->setPicture($data['picture'])
                ->setDescription($data['description'])
                ->setLevel($data['level'])
                ->setExperience($data['experience'])
                ->setStrength($data['strength'])
                ->setDexterity($data['dexterity'])
                ->setConstitution($data['constitution'])
                ->setWisdom($data['wisdom'])
                ->setIntelligence($data['intelligence'])
                ->setCharisma($data['charisma'])
                ->setHealthMax($data['healthMax'])
                ->setHealth($data['health'])
                ->setManaMax($data['manaMax'])
                ->setMana($data['mana'])
                ->setFortune($data['fortune'])
                ->setRace($this->getReference($data['race'], Race::class))
                ->setProfession($this->getReference($data['profession'], Profession::class))
                ->setCurrentLocation(isset($data['location']) ? $this->getReference($data['location'], Location::class) : null)
                ->setOwner($this->getReference($data['owner'], User::class));
            $manager->persist($character);
            $this->addReference($data['reference'], $character);
        }

        foreach($characterItems as $data) {
            $item = $this->getReference($data['item'], $data['class']);
            if($item instanceof Armor || $item instanceof Shield) {
                $itemHealth = $item->getHealthMax();
                $itemCharge = null;
            } else if($item instanceof Weapon) {
                $itemHealth = $item->getHealthMax();
                $itemCharge = null;
            } else if($item instanceof MagicalWeapon) {
                $itemHealth = null;
                $itemCharge = $item->getChargeMax();
            } else {
                $itemHealth = null;
                $itemCharge = null;
            }
            $characterItem = (new CharacterItem())
                ->setCharacter($this->getReference($data['character'], Player::class))
                ->setItem($item)
                ->setEquipped($data['isEquipped'])
                ->setHealth($itemHealth ?? null)
                ->setCharge($itemCharge ?? null)
                ->setSlot($data['slot'] ?? null)
                ->setQuestItem(false);
            $manager->persist($characterItem);
        }

        foreach($characterSpells as $data) {
            $characterSpell = (new CharacterSpell())
                ->setCharacter($this->getReference($data['character'], Player::class))
                ->setSpell($this->getReference($data['spell'], Spell::class))
                ->setLevel($data['level'])
                ->setManaCost($data['manaCost'])
                ->setAmountBonus($data['amountBonus'])
                ->setAreaBonus($data['areaBonus'])
                ->setDurationBonus($data['durationBonus']);
            $manager->persist($characterSpell);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 91;
    }
}
