<?php

namespace App\DataFixtures\Item;

use App\Entity\Character\Npc;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Food;
use App\Entity\Item\Gift;
use App\Entity\Item\Map;
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
                'item' => 'food_beer',
                'class' => Food::class,
            ],
            [
                'character' => 'npc_sophie_la_marchande',
                'item' => 'food_wine',
                'class' => Food::class,
            ],
            [
                'character' => 'npc_sophie_la_marchande',
                'item' => 'food_bread',
                'class' => Food::class,
            ],
            [
                'character' => 'npc_sophie_la_marchande',
                'item' => 'food_cheese',
                'class' => Food::class,
            ],
            [
                'character' => 'npc_sophie_la_marchande',
                'item' => 'food_chicken',
                'class' => Food::class,
            ],
            [
                'character' => 'npc_sophie_la_marchande',
                'item' => 'food_fish',
                'class' => Food::class,
            ],
            [
                'character' => 'npc_sophie_la_marchande',
                'item' => 'food_meat',
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
        ];

        foreach($characterItems as $data) {
            $characterItem = new CharacterItem();
            $characterItem->setCharacter($this->getReference($data['character'], Npc::class))
                ->setItem($this->getReference($data['item'], $data['class']))
                ->setEquipped(false);
            $manager->persist($characterItem);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 34;
    }
}
