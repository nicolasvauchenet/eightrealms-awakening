<?php

namespace App\DataFixtures\Item;

use App\Entity\Character\Player;
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

class PlayerItemFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $characterItems = [
            // Aldrin le Brave
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
                'class' => Magical::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'map_royaume_de_lile_du_nord',
                'isEquipped' => false,
                'class' => Map::class,
            ],
            [
                'character' => 'player_aldrin',
                'item' => 'map_royaume_de_lile_du_nord',
                'isEquipped' => false,
                'class' => Map::class,
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
        return 91;
    }
}
