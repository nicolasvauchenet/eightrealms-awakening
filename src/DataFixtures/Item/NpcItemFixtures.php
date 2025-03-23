<?php

namespace App\DataFixtures\Item;

use App\Entity\Character\Npc;
use App\Entity\Item\Amulet;
use App\Entity\Item\Armor;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Food;
use App\Entity\Item\Gift;
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
            [
                'character' => 'npc_gart_le_forgeron',
                'item' => 'ring_copper',
                'class' => Gift::class,
            ],
            [
                'character' => 'npc_gart_le_forgeron',
                'item' => 'ring_silver',
                'class' => Gift::class,
            ],
            [
                'character' => 'npc_gart_le_forgeron',
                'item' => 'ring_gold',
                'class' => Gift::class,
            ],
            [
                'character' => 'npc_gart_le_forgeron',
                'item' => 'map_plouc',
                'class' => Map::class,
            ],

            // Wilbert l'Arcaniste
            [
                'character' => 'npc_wilbert_larcaniste',
                'item' => 'magical_firewand',
                'class' => Magical::class,
            ],
            [
                'character' => 'npc_wilbert_larcaniste',
                'item' => 'magical_icewand',
                'class' => Magical::class,
            ],
            [
                'character' => 'npc_wilbert_larcaniste',
                'item' => 'magical_stormwand',
                'class' => Magical::class,
            ],
            [
                'character' => 'npc_wilbert_larcaniste',
                'item' => 'magical_firestick',
                'class' => Magical::class,
            ],
            [
                'character' => 'npc_wilbert_larcaniste',
                'item' => 'magical_icestick',
                'class' => Magical::class,
            ],
            [
                'character' => 'npc_wilbert_larcaniste',
                'item' => 'magical_stormstick',
                'class' => Magical::class,
            ],
            [
                'character' => 'npc_wilbert_larcaniste',
                'item' => 'magical_healstick',
                'class' => Magical::class,
            ],
            [
                'character' => 'npc_wilbert_larcaniste',
                'item' => 'magical_protectionstick',
                'class' => Magical::class,
            ],
            [
                'character' => 'npc_wilbert_larcaniste',
                'item' => 'ring_health',
                'class' => Ring::class,
            ],
            [
                'character' => 'npc_wilbert_larcaniste',
                'item' => 'ring_mana',
                'class' => Ring::class,
            ],
            [
                'character' => 'npc_wilbert_larcaniste',
                'item' => 'ring_protection',
                'class' => Ring::class,
            ],
            [
                'character' => 'npc_wilbert_larcaniste',
                'item' => 'ring_knight',
                'class' => Ring::class,
            ],
            [
                'character' => 'npc_wilbert_larcaniste',
                'item' => 'ring_night_vision',
                'class' => Ring::class,
            ],
            [
                'character' => 'npc_wilbert_larcaniste',
                'item' => 'amulet_health',
                'class' => Amulet::class,
            ],
            [
                'character' => 'npc_wilbert_larcaniste',
                'item' => 'amulet_mana',
                'class' => Amulet::class,
            ],
            [
                'character' => 'npc_wilbert_larcaniste',
                'item' => 'amulet_protection',
                'class' => Amulet::class,
            ],
            [
                'character' => 'npc_wilbert_larcaniste',
                'item' => 'scroll_fireball',
                'class' => Scroll::class,
            ],
            [
                'character' => 'npc_wilbert_larcaniste',
                'item' => 'scroll_deconcentration',
                'class' => Scroll::class,
            ],
            [
                'character' => 'npc_wilbert_larcaniste',
                'item' => 'scroll_heal',
                'class' => Scroll::class,
            ],
            [
                'character' => 'npc_wilbert_larcaniste',
                'item' => 'scroll_concentration',
                'class' => Scroll::class,
            ],
            [
                'character' => 'npc_wilbert_larcaniste',
                'item' => 'scroll_power',
                'class' => Scroll::class,
            ],
            [
                'character' => 'npc_wilbert_larcaniste',
                'item' => 'scroll_barrier',
                'class' => Scroll::class,
            ],
            [
                'character' => 'npc_wilbert_larcaniste',
                'item' => 'scroll_invisibility',
                'class' => Scroll::class,
            ],
            [
                'character' => 'npc_wilbert_larcaniste',
                'item' => 'scroll_lockpick',
                'class' => Scroll::class,
            ],
            [
                'character' => 'npc_wilbert_larcaniste',
                'item' => 'potion_lighthealing',
                'class' => Potion::class,
            ],
            [
                'character' => 'npc_wilbert_larcaniste',
                'item' => 'potion_healing',
                'class' => Potion::class,
            ],
            [
                'character' => 'npc_wilbert_larcaniste',
                'item' => 'potion_lightmana',
                'class' => Potion::class,
            ],
            [
                'character' => 'npc_wilbert_larcaniste',
                'item' => 'potion_mana',
                'class' => Potion::class,
            ],
            [
                'character' => 'npc_wilbert_larcaniste',
                'item' => 'potion_invisibility',
                'class' => Potion::class,
            ],
            [
                'character' => 'npc_wilbert_larcaniste',
                'item' => 'map_royaume_de_lile_du_nord',
                'class' => Map::class,
            ],
            [
                'character' => 'npc_wilbert_larcaniste',
                'item' => 'map_port_saint_doux',
                'class' => Map::class,
            ],

            // Pêcheur
            [
                'character' => 'npc_pecheur',
                'item' => 'food_fish',
                'class' => Food::class,
            ],
            [
                'character' => 'npc_gerard_le_pecheur',
                'item' => 'food_fish',
                'class' => Food::class,
            ],

            // Malfrat
            [
                'character' => 'npc_malfrat',
                'item' => 'armor_leather',
                'class' => Armor::class,
                'isEquipped' => true,
                'slot' => 'armor',
            ],
            [
                'character' => 'npc_malfrat',
                'item' => 'weapon_longsword',
                'class' => Weapon::class,
                'isEquipped' => true,
                'slot' => 'righthand',
            ],

            // Sbire
            [
                'character' => 'npc_sbire',
                'item' => 'armor_leather',
                'class' => Armor::class,
                'isEquipped' => true,
                'slot' => 'armor',
            ],
            [
                'character' => 'npc_sbire',
                'item' => 'weapon_shortsword',
                'class' => Weapon::class,
                'isEquipped' => true,
                'slot' => 'righthand',
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
            $characterItem->setCharacter($this->getReference($data['character'], Npc::class))
                ->setItem($item)
                ->setEquipped($data['isEquipped'] ?? false)
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
        return 34;
    }
}
