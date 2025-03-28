<?php

namespace App\DataFixtures\Item;

use App\Entity\Character\PreGenerated;
use App\Entity\Item\Amulet;
use App\Entity\Item\Armor;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Food;
use App\Entity\Item\Magical;
use App\Entity\Item\Map;
use App\Entity\Item\Potion;
use App\Entity\Item\Ring;
use App\Entity\Item\Scroll;
use App\Entity\Item\Shield;
use App\Entity\Item\Weapon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PreGeneratedItemFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $characterItems = [
            // Aldrin le Brave
            [
                'character' => 'character_aldrin',
                'item' => 'weapon_longsword',
                'isEquipped' => true,
                'slot' => 'righthand',
                'class' => Weapon::class,
            ],
            [
                'character' => 'character_aldrin',
                'item' => 'armor_iron',
                'isEquipped' => true,
                'slot' => 'armor',
                'class' => Armor::class,
            ],
            [
                'character' => 'character_aldrin',
                'item' => 'shield_iron',
                'isEquipped' => true,
                'slot' => 'shield',
                'class' => Shield::class,
            ],
            [
                'character' => 'character_aldrin',
                'item' => 'potion_lighthealing',
                'isEquipped' => true,
                'slot' => 'potion',
                'class' => Potion::class,
            ],
            [
                'character' => 'character_aldrin',
                'item' => 'potion_lighthealing',
                'isEquipped' => false,
                'class' => Potion::class,
            ],
            [
                'character' => 'character_aldrin',
                'item' => 'potion_lighthealing',
                'isEquipped' => false,
                'class' => Potion::class,
            ],
            [
                'character' => 'character_aldrin',
                'item' => 'food_meat',
                'isEquipped' => false,
                'class' => Food::class,
            ],
            [
                'character' => 'character_aldrin',
                'item' => 'map_port_saint_doux',
                'isEquipped' => false,
                'class' => Map::class,
            ],
            [
                'character' => 'character_aldrin',
                'item' => 'weapon_shortbow',
                'isEquipped' => false,
                'class' => Weapon::class,
            ],
            [
                'character' => 'character_aldrin',
                'item' => 'ring_knight',
                'isEquipped' => true,
                'slot' => 'ring',
                'class' => Ring::class,
            ],
            [
                'character' => 'character_aldrin',
                'item' => 'ring_health',
                'isEquipped' => false,
                'class' => Ring::class,
            ],
            [
                'character' => 'character_aldrin',
                'item' => 'ring_night_vision',
                'isEquipped' => false,
                'class' => Ring::class,
            ],
            [
                'character' => 'character_aldrin',
                'item' => 'scroll_fireball',
                'isEquipped' => false,
                'class' => Scroll::class,
            ],
            [
                'character' => 'character_aldrin',
                'item' => 'scroll_barrier',
                'isEquipped' => true,
                'slot' => 'scroll',
                'class' => Scroll::class,
            ],
            [
                'character' => 'character_aldrin',
                'item' => 'scroll_lockpick',
                'isEquipped' => false,
                'class' => Scroll::class,
            ],
            [
                'character' => 'character_aldrin',
                'item' => 'potion_mana',
                'isEquipped' => false,
                'class' => Potion::class,
            ],
            [
                'character' => 'character_aldrin',
                'item' => 'potion_invisibility',
                'isEquipped' => false,
                'class' => Potion::class,
            ],
            [
                'character' => 'character_aldrin',
                'item' => 'amulet_protection',
                'isEquipped' => true,
                'slot' => 'amulet',
                'class' => Amulet::class,
            ],
            [
                'character' => 'character_aldrin',
                'item' => 'magical_firewand',
                'isEquipped' => false,
                'class' => Magical::class,
            ],
            [
                'character' => 'character_aldrin',
                'item' => 'map_royaume_de_lile_du_nord',
                'isEquipped' => false,
                'class' => Map::class,
            ],
            [
                'character' => 'character_aldrin',
                'item' => 'map_royaume_de_lile_du_nord',
                'isEquipped' => false,
                'class' => Map::class,
            ],
            [
                'character' => 'character_aldrin',
                'item' => 'map_royaume_de_lile_du_nord',
                'isEquipped' => false,
                'class' => Map::class,
            ],
            [
                'character' => 'character_aldrin',
                'item' => 'map_plouc',
                'isEquipped' => false,
                'class' => Map::class,
            ],
            [
                'character' => 'character_aldrin',
                'item' => 'weapon_longsword_storm',
                'isEquipped' => false,
                'class' => Weapon::class,
            ],
            [
                'character' => 'character_aldrin',
                'item' => 'armor_iron_health',
                'isEquipped' => false,
                'class' => Armor::class,
            ],
            [
                'character' => 'character_aldrin',
                'item' => 'shield_iron_defense',
                'isEquipped' => false,
                'class' => Shield::class,
            ],

            // Elandra la Sage
            [
                'character' => 'character_elandra',
                'item' => 'magical_firestick',
                'isEquipped' => true,
                'slot' => 'righthand',
                'class' => Magical::class,
            ],
            [
                'character' => 'character_elandra',
                'item' => 'armor_mage_apprentice',
                'isEquipped' => true,
                'slot' => 'armor',
                'class' => Armor::class,
            ],
            [
                'character' => 'character_elandra',
                'item' => 'potion_lightmana',
                'isEquipped' => true,
                'slot' => 'potion',
                'class' => Potion::class,
            ],
            [
                'character' => 'character_elandra',
                'item' => 'potion_lightmana',
                'isEquipped' => false,
                'class' => Potion::class,
            ],
            [
                'character' => 'character_elandra',
                'item' => 'potion_lightmana',
                'isEquipped' => false,
                'class' => Potion::class,
            ],
            [
                'character' => 'character_elandra',
                'item' => 'amulet_mana',
                'isEquipped' => true,
                'slot' => 'amulet',
                'class' => Amulet::class,
            ],
            [
                'character' => 'character_elandra',
                'item' => 'armor_iron',
                'isEquipped' => false,
                'class' => Armor::class,
            ],
            [
                'character' => 'character_elandra',
                'item' => 'weapon_dagger',
                'isEquipped' => true,
                'slot' => 'lefthand',
                'class' => Weapon::class,
            ],
            [
                'character' => 'character_elandra',
                'item' => 'scroll_heal',
                'isEquipped' => true,
                'slot' => 'scroll',
                'class' => Scroll::class,
            ],

            // Eryndor le Vigilant
            [
                'character' => 'character_eryndor',
                'item' => 'weapon_longbow_storm',
                'isEquipped' => true,
                'slot' => 'bow',
                'class' => Weapon::class,
            ],
            [
                'character' => 'character_eryndor',
                'item' => 'armor_leather',
                'isEquipped' => true,
                'slot' => 'armor',
                'class' => Armor::class,
            ],
            [
                'character' => 'character_eryndor',
                'item' => 'potion_lighthealing',
                'isEquipped' => true,
                'slot' => 'potion',
                'class' => Potion::class,
            ],
            [
                'character' => 'character_eryndor',
                'item' => 'potion_lighthealing',
                'isEquipped' => false,
                'class' => Potion::class,
            ],
            [
                'character' => 'character_eryndor',
                'item' => 'potion_lighthealing',
                'isEquipped' => false,
                'class' => Potion::class,
            ],
            [
                'character' => 'character_eryndor',
                'item' => 'amulet_health',
                'isEquipped' => true,
                'slot' => 'amulet',
                'class' => Amulet::class,
            ],
            [
                'character' => 'character_eryndor',
                'item' => 'armor_iron',
                'isEquipped' => false,
                'class' => Armor::class,
            ],
            [
                'character' => 'character_eryndor',
                'item' => 'magical_firewand',
                'isEquipped' => false,
                'class' => Magical::class,
            ],

            // Lyra l’Agile
            [
                'character' => 'character_lyra',
                'item' => 'weapon_dagger',
                'isEquipped' => true,
                'slot' => 'righthand',
                'class' => Weapon::class,
            ],
            [
                'character' => 'character_lyra',
                'item' => 'armor_leather',
                'isEquipped' => true,
                'slot' => 'armor',
                'class' => Armor::class,
            ],
            [
                'character' => 'character_lyra',
                'item' => 'scroll_lockpick',
                'isEquipped' => true,
                'slot' => 'scroll',
                'class' => Scroll::class,
            ],
            [
                'character' => 'character_lyra',
                'item' => 'potion_lighthealing',
                'isEquipped' => true,
                'slot' => 'potion',
                'class' => Potion::class,
            ],
            [
                'character' => 'character_lyra',
                'item' => 'potion_lighthealing',
                'isEquipped' => false,
                'class' => Potion::class,
            ],
            [
                'character' => 'character_lyra',
                'item' => 'ring_health',
                'isEquipped' => true,
                'slot' => 'ring',
                'class' => Ring::class,
            ],
            [
                'character' => 'character_lyra',
                'item' => 'armor_iron',
                'isEquipped' => false,
                'class' => Armor::class,
            ],
            [
                'character' => 'character_lyra',
                'item' => 'magical_firewand',
                'isEquipped' => false,
                'class' => Magical::class,
            ],

            // Tharasha la Sauvage
            [
                'character' => 'character_tharasha',
                'item' => 'weapon_warhammer',
                'isEquipped' => true,
                'slot' => 'righthand',
                'class' => Weapon::class,
            ],
            [
                'character' => 'character_tharasha',
                'item' => 'armor_iron',
                'isEquipped' => true,
                'slot' => 'armor',
                'class' => Armor::class,
            ],
            [
                'character' => 'character_tharasha',
                'item' => 'magical_firewand',
                'isEquipped' => false,
                'class' => Magical::class,
            ],

            // Isilëa la Gardienne
            [
                'character' => 'character_isilea',
                'item' => 'magical_healstick',
                'isEquipped' => true,
                'slot' => 'righthand',
                'class' => Magical::class,
            ],
            [
                'character' => 'character_isilea',
                'item' => 'armor_druid',
                'quantity' => 1,
                'isEquipped' => true,
                'slot' => 'armor',
                'class' => Armor::class,
            ],
            [
                'character' => 'character_isilea',
                'item' => 'potion_lighthealing',
                'isEquipped' => true,
                'slot' => 'potion',
                'class' => Potion::class,
            ],
            [
                'character' => 'character_isilea',
                'item' => 'potion_lighthealing',
                'isEquipped' => false,
                'class' => Potion::class,
            ],
            [
                'character' => 'character_isilea',
                'item' => 'potion_lighthealing',
                'isEquipped' => false,
                'class' => Potion::class,
            ],
            [
                'character' => 'character_isilea',
                'item' => 'ring_mana',
                'isEquipped' => true,
                'slot' => 'ring',
                'class' => Ring::class,
            ],
            [
                'character' => 'character_isilea',
                'item' => 'armor_iron',
                'isEquipped' => false,
                'class' => Armor::class,
            ],

            // Thorin le Féroce
            [
                'character' => 'character_thorin',
                'item' => 'weapon_warax',
                'isEquipped' => true,
                'slot' => 'righthand',
                'class' => Weapon::class,
            ],
            [
                'character' => 'character_thorin',
                'item' => 'armor_plates',
                'isEquipped' => true,
                'slot' => 'armor',
                'class' => Armor::class,
            ],
            [
                'character' => 'character_thorin',
                'item' => 'magical_firewand',
                'isEquipped' => false,
                'class' => Magical::class,
            ],

            // Grymm le Bricoleur
            [
                'character' => 'character_grymm',
                'item' => 'weapon_gunstorm',
                'isEquipped' => true,
                'slot' => 'righthand',
                'class' => Weapon::class,
            ],
            [
                'character' => 'character_grymm',
                'item' => 'armor_leather',
                'isEquipped' => true,
                'slot' => 'armor',
                'class' => Armor::class,
            ],
            [
                'character' => 'character_grymm',
                'item' => 'potion_lighthealing',
                'isEquipped' => true,
                'slot' => 'potion',
                'class' => Potion::class,
            ],
            [
                'character' => 'character_grymm',
                'item' => 'potion_lighthealing',
                'isEquipped' => false,
                'class' => Potion::class,
            ],
            [
                'character' => 'character_grymm',
                'item' => 'potion_lighthealing',
                'isEquipped' => false,
                'class' => Potion::class,
            ],
            [
                'character' => 'character_grymm',
                'item' => 'ring_night_vision',
                'isEquipped' => true,
                'slot' => 'ring',
                'class' => Ring::class,
            ],
            [
                'character' => 'character_grymm',
                'item' => 'magical_firewand',
                'isEquipped' => true,
                'slot' => 'lefthand',
                'class' => Magical::class,
            ],
            [
                'character' => 'character_grymm',
                'item' => 'armor_iron',
                'isEquipped' => false,
                'class' => Armor::class,
            ],
        ];

        foreach($characterItems as $data) {
            $characterItem = new CharacterItem();
            $item = $this->getReference($data['item'], $data['class']);
            if($item instanceof Armor || $item instanceof Shield) {
                $itemHealth = $item->getHealth();
                $itemCharge = null;
            } else if($item instanceof Weapon) {
                $itemHealth = $item->getHealth();
                $itemCharge = $item->getCharge() ?? null;
            } else if($item instanceof Magical) {
                $itemHealth = null;
                $itemCharge = $item->getCharge();
            } else {
                $itemHealth = null;
                $itemCharge = null;
            }
            $characterItem->setCharacter($this->getReference($data['character'], PreGenerated::class))
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
        return 17;
    }
}
