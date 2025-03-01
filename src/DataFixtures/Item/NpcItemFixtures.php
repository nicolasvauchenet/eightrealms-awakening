<?php

namespace App\DataFixtures\Item;

use App\Entity\Character\Npc;
use App\Entity\Item\Armor;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Food;
use App\Entity\Item\Gift;
use App\Entity\Item\Map;
use App\Entity\Item\Shield;
use App\Entity\Item\Weapon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class NpcItemFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $characterItems = [
            // Sophie La Marchande
            [
                'character' => 'npc_sophie_la_marchande',
                'item' => 'food_fish',
                'class' => Food::class,
            ],
            [
                'character' => 'npc_sophie_la_marchande',
                'item' => 'gift_flowers',
                'class' => Gift::class,
            ],
            [
                'character' => 'npc_sophie_la_marchande',
                'item' => 'ring_copper',
                'class' => Gift::class,
            ],
            [
                'character' => 'npc_sophie_la_marchande',
                'item' => 'ring_silver',
                'class' => Gift::class,
            ],
            [
                'character' => 'npc_sophie_la_marchande',
                'item' => 'ring_gold',
                'class' => Gift::class,
            ],
            [
                'character' => 'npc_sophie_la_marchande',
                'item' => 'map_port_saint_doux',
                'class' => Map::class,
            ],

            // Jarrod le Tavernier
            [
                'character' => 'npc_jarrod_le_tavernier',
                'item' => 'food_beer',
                'class' => Food::class,
            ],
            [
                'character' => 'npc_jarrod_le_tavernier',
                'item' => 'food_wine',
                'class' => Food::class,
            ],
            [
                'character' => 'npc_jarrod_le_tavernier',
                'item' => 'food_bread',
                'class' => Food::class,
            ],
            [
                'character' => 'npc_jarrod_le_tavernier',
                'item' => 'food_cheese',
                'class' => Food::class,
            ],
            [
                'character' => 'npc_jarrod_le_tavernier',
                'item' => 'food_chicken',
                'class' => Food::class,
            ],
            [
                'character' => 'npc_jarrod_le_tavernier',
                'item' => 'food_meat',
                'class' => Food::class,
            ],

            // Gart le Forgeron
            [
                'character' => 'npc_gart_le_forgeron',
                'item' => 'armor_leather',
                'class' => Armor::class,
            ],
            [
                'character' => 'npc_gart_le_forgeron',
                'item' => 'armor_iron',
                'class' => Armor::class,
            ],
            [
                'character' => 'npc_gart_le_forgeron',
                'item' => 'armor_steel',
                'class' => Armor::class,
            ],
            [
                'character' => 'npc_gart_le_forgeron',
                'item' => 'shield_wooden',
                'class' => Shield::class,
            ],
            [
                'character' => 'npc_gart_le_forgeron',
                'item' => 'shield_iron',
                'class' => Shield::class,
            ],
            [
                'character' => 'npc_gart_le_forgeron',
                'item' => 'shield_steel',
                'class' => Shield::class,
            ],
            [
                'character' => 'npc_gart_le_forgeron',
                'item' => 'weapon_dagger',
                'class' => Weapon::class,
            ],
            [
                'character' => 'npc_gart_le_forgeron',
                'item' => 'weapon_shortsword',
                'class' => Weapon::class,
            ],
            [
                'character' => 'npc_gart_le_forgeron',
                'item' => 'weapon_longsword',
                'class' => Weapon::class,
            ],
            [
                'character' => 'npc_gart_le_forgeron',
                'item' => 'weapon_warax',
                'class' => Weapon::class,
            ],
            [
                'character' => 'npc_gart_le_forgeron',
                'item' => 'weapon_warhammer',
                'class' => Weapon::class,
            ],
            [
                'character' => 'npc_gart_le_forgeron',
                'item' => 'weapon_shortbow',
                'class' => Weapon::class,
            ],
            [
                'character' => 'npc_gart_le_forgeron',
                'item' => 'weapon_longbow',
                'class' => Weapon::class,
            ],
        ];

        foreach($characterItems as $data) {
            $characterItem = new CharacterItem();
            $characterItem->setCharacter($this->getReference($data['character'], Npc::class))
                ->setItem($this->getReference($data['item'], $data['class']))
                ->setEquipped(false)
                ->setQuestItem(false);
            $manager->persist($characterItem);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 34;
    }
}
