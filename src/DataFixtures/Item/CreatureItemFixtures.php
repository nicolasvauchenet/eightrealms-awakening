<?php

namespace App\DataFixtures\Item;

use App\Entity\Character\Creature;
use App\Entity\Item\CreatureItem;
use App\Entity\Item\Food;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CreatureItemFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $creatureItems = [
            [
                'creature' => 'creature_gros_rat',
                'item' => 'food_rat',
                'class' => Food::class,
            ],
        ];

        foreach($creatureItems as $data) {
            $creatureItem = new CreatureItem();
            $creatureItem->setCreature($this->getReference($data['creature'], Creature::class))
                ->setItem($this->getReference($data['item'], $data['class']));
            $manager->persist($creatureItem);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 28;
    }
}
