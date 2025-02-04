<?php

namespace App\DataFixtures\Item;

use App\Entity\Character\Npc;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Misc;
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
                'item' => 'misc_food_beer',
                'class' => Misc::class,
            ],
            [
                'character' => 'npc_sophie_la_marchande',
                'item' => 'misc_food_wine',
                'class' => Misc::class,
            ],
            [
                'character' => 'npc_sophie_la_marchande',
                'item' => 'misc_food_bread',
                'class' => Misc::class,
            ],
            [
                'character' => 'npc_sophie_la_marchande',
                'item' => 'misc_food_cheese',
                'class' => Misc::class,
            ],
            [
                'character' => 'npc_sophie_la_marchande',
                'item' => 'misc_food_chicken',
                'class' => Misc::class,
            ],
            [
                'character' => 'npc_sophie_la_marchande',
                'item' => 'misc_food_fish',
                'class' => Misc::class,
            ],
            [
                'character' => 'npc_sophie_la_marchande',
                'item' => 'misc_food_meat',
                'class' => Misc::class,
            ],
            [
                'character' => 'npc_sophie_la_marchande',
                'item' => 'misc_gift_flowers',
                'class' => Misc::class,
            ],
            [
                'character' => 'npc_sophie_la_marchande',
                'item' => 'misc_ring_copper',
                'class' => Misc::class,
            ],
            [
                'character' => 'npc_sophie_la_marchande',
                'item' => 'misc_ring_silver',
                'class' => Misc::class,
            ],
            [
                'character' => 'npc_sophie_la_marchande',
                'item' => 'misc_ring_gold',
                'class' => Misc::class,
            ],
            [
                'character' => 'npc_sophie_la_marchande',
                'item' => 'misc_map_port_saint_doux',
                'class' => Misc::class,
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
        return 21;
    }
}
