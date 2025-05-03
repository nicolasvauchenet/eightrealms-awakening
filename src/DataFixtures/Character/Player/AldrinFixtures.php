<?php

namespace App\DataFixtures\Character\Player;

use App\Entity\Character\Player;
use App\Entity\Character\Profession;
use App\Entity\Character\Race;
use App\Entity\Item\Amulet;
use App\Entity\Item\Armor;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Food;
use App\Entity\Item\MagicalWeapon;
use App\Entity\Item\Map;
use App\Entity\Item\Potion;
use App\Entity\Item\Ring;
use App\Entity\Item\Scroll;
use App\Entity\Item\Shield;
use App\Entity\Item\Weapon;
use App\Entity\Location\Location;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AldrinFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $characters = [
            [
                'name' => 'Aldrin le Brave',
                'picture' => 'aldrin-le-brave.png',
                'description' => "<p>Fils d’un simple forgeron de Port Saint-Doux, Aldrin a grandi en rêvant d’armures étincelantes et de batailles héroïques. S’il manie déjà bien l’épée, son expérience se limite aux entraînements dans la cour des gardes locales. Idéaliste et volontaire, il s’est juré de défendre les innocents… même s’il découvre encore comment lever un bouclier correctement.</p>",
                'level' => 1,
                'experience' => 0,
                'strength' => 14,
                'dexterity' => 10,
                'constitution' => 13,
                'wisdom' => 11,
                'intelligence' => 10,
                'charisma' => 12,
                'healthMax' => 130,
                'health' => 130,
                'manaMax' => 50,
                'mana' => 50,
                'fortune' => 100,
                'race' => 'race_humain',
                'profession' => 'profession_chevalier',
                /*'location' => 'location_zone_quartier_du_marche',*/
                'owner' => 'user_nicolas',
                'reference' => 'player_aldrin',
            ],
        ];

        $characterItems = [
            [
                'character' => 'player_aldrin',
                'item' => 'weapon_longsword',
                'isEquipped' => true,
                'slot' => 'righthand',
                'class' => Weapon::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'armor_iron',
                'isEquipped' => true,
                'slot' => 'armor',
                'class' => Armor::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'shield_iron',
                'isEquipped' => true,
                'slot' => 'shield',
                'class' => Shield::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'potion_lighthealing',
                'isEquipped' => true,
                'slot' => 'potion',
                'class' => Potion::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'potion_lighthealing',
                'isEquipped' => false,
                'class' => Potion::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'potion_lighthealing',
                'isEquipped' => false,
                'class' => Potion::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'food_meat',
                'isEquipped' => false,
                'class' => Food::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'map_port_saint_doux',
                'isEquipped' => false,
                'class' => Map::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'weapon_shortbow',
                'isEquipped' => false,
                'class' => Weapon::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'ring_knight',
                'isEquipped' => false,
                'class' => Ring::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'ring_health',
                'isEquipped' => false,
                'class' => Ring::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'ring_night_vision',
                'isEquipped' => false,
                'class' => Ring::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'scroll_fireball',
                'isEquipped' => false,
                'class' => Scroll::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'scroll_barrier',
                'isEquipped' => true,
                'slot' => 'scroll',
                'class' => Scroll::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'scroll_lockpick',
                'isEquipped' => false,
                'class' => Scroll::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'potion_mana',
                'isEquipped' => false,
                'class' => Potion::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'potion_invisibility',
                'isEquipped' => false,
                'class' => Potion::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'amulet_protection',
                'isEquipped' => false,
                'class' => Amulet::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'magical_firewand',
                'isEquipped' => false,
                'class' => MagicalWeapon::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'map_royaume_de_lile_du_nord',
                'isEquipped' => false,
                'class' => Map::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'map_plouc',
                'isEquipped' => false,
                'class' => Map::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'map_bois_du_pendu',
                'isEquipped' => false,
                'class' => Map::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'map_sables_chauds',
                'isEquipped' => false,
                'class' => Map::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'map_monts_terribles',
                'isEquipped' => false,
                'class' => Map::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'weapon_longsword_storm',
                'isEquipped' => false,
                'class' => Weapon::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'armor_iron_health',
                'isEquipped' => false,
                'class' => Armor::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'shield_iron_defense',
                'isEquipped' => false,
                'class' => Shield::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'scroll_deconcentration',
                'isEquipped' => false,
                'class' => Scroll::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'scroll_concentration',
                'isEquipped' => false,
                'class' => Scroll::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'scroll_power',
                'isEquipped' => false,
                'class' => Scroll::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'scroll_invisibility',
                'isEquipped' => false,
                'class' => Scroll::class,
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
            $characterItem = new CharacterItem();
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
            $characterItem->setCharacter($this->getReference($data['character'], Player::class))
                ->setItem($item)
                ->setEquipped($data['isEquipped'])
                ->setHealth($itemHealth ?? null)
                ->setCharge($itemCharge ?? null)
                ->setSlot($data['slot'] ?? null)
                ->setQuestItem(false);
            $manager->persist($characterItem);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 90;
    }
}
