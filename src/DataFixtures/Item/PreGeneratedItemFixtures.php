<?php

namespace App\DataFixtures\Item;

use App\Entity\Character\PreGenerated;
use App\Entity\Item\Amulet;
use App\Entity\Item\Armor;
use App\Entity\Item\CharacterItem;
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
                'health' => 30,
                'slot' => 'righthand',
                'class' => Weapon::class,
            ],
            [
                'character' => 'character_aldrin',
                'item' => 'armor_iron',
                'isEquipped' => true,
                'health' => 50,
                'slot' => 'armor',
                'class' => Armor::class,
            ],
            [
                'character' => 'character_aldrin',
                'item' => 'shield_iron',
                'isEquipped' => true,
                'health' => 50,
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
                'item' => 'magical_firewand',
                'isEquipped' => false,
                'health' => 20,
                'charge' => 10,
                'class' => Weapon::class,
            ],

            // Elandra la Sage
            [
                'character' => 'character_elandra',
                'item' => 'magical_firestick',
                'isEquipped' => true,
                'health' => 30,
                'charge' => 20,
                'slot' => 'righthand',
                'class' => Weapon::class,
            ],
            [
                'character' => 'character_elandra',
                'item' => 'armor_mage',
                'quantity' => 1,
                'isEquipped' => true,
                'health' => 10,
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

            // Eryndor le Vigilant
            [
                'character' => 'character_eryndor',
                'item' => 'weapon_longbow',
                'isEquipped' => true,
                'health' => 20,
                'slot' => 'bow',
                'class' => Weapon::class,
            ],
            [
                'character' => 'character_eryndor',
                'item' => 'armor_leather',
                'isEquipped' => true,
                'health' => 30,
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

            // Lyra l’Agile
            [
                'character' => 'character_lyra',
                'item' => 'weapon_dagger',
                'isEquipped' => true,
                'health' => 20,
                'slot' => 'righthand',
                'class' => Weapon::class,
            ],
            [
                'character' => 'character_lyra',
                'item' => 'armor_leather',
                'isEquipped' => true,
                'health' => 30,
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

            // Tharasha la Sauvage
            [
                'character' => 'character_tharasha',
                'item' => 'weapon_warhammer',
                'isEquipped' => true,
                'health' => 90,
                'slot' => 'righthand',
                'class' => Weapon::class,
            ],
            [
                'character' => 'character_tharasha',
                'item' => 'armor_iron',
                'isEquipped' => true,
                'health' => 50,
                'slot' => 'armor',
                'class' => Armor::class,
            ],

            // Isilëa la Gardienne
            [
                'character' => 'character_isilea',
                'item' => 'magical_healstick',
                'isEquipped' => true,
                'health' => 30,
                'charge' => 20,
                'slot' => 'righthand',
                'class' => Weapon::class,
            ],
            [
                'character' => 'character_isilea',
                'item' => 'armor_druid',
                'quantity' => 1,
                'isEquipped' => true,
                'health' => 10,
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

            // Thorin le Féroce
            [
                'character' => 'character_thorin',
                'item' => 'weapon_warax',
                'isEquipped' => true,
                'health' => 90,
                'slot' => 'righthand',
                'class' => Weapon::class,
            ],
            [
                'character' => 'character_thorin',
                'item' => 'armor_plates',
                'isEquipped' => true,
                'health' => 90,
                'slot' => 'armor',
                'class' => Armor::class,
            ],

            // Grymm le Bricoleur
            [
                'character' => 'character_grymm',
                'item' => 'weapon_gunstorm',
                'isEquipped' => true,
                'health' => 50,
                'slot' => 'righthand',
                'class' => Weapon::class,
            ],
            [
                'character' => 'character_grymm',
                'item' => 'armor_leather',
                'isEquipped' => true,
                'health' => 30,
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
        ];

        foreach($characterItems as $data) {
            $characterItem = new CharacterItem();
            $characterItem->setCharacter($this->getReference($data['character'], PreGenerated::class))
                ->setItem($this->getReference($data['item'], $data['class']))
                ->setEquipped($data['isEquipped'])
                ->setHealth($data['health'] ?? null)
                ->setCharge($data['charge'] ?? null)
                ->setSlot($data['slot'] ?? null);
            $manager->persist($characterItem);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 15;
    }
}
