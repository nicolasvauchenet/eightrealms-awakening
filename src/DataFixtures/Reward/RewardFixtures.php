<?php

namespace App\DataFixtures\Reward;

use App\Entity\Item\Food;
use App\Entity\Item\Gift;
use App\Entity\Reward\Reward;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RewardFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $allRewards = [
            // Introduction
            [
                'items' => [
                    [
                        'item' => 'food_bread',
                        'itemClass' => Food::class,
                    ],
                    [
                        'item' => 'food_beer',
                        'itemClass' => Food::class,
                    ],
                    [
                        'item' => 'gift_flowers',
                        'itemClass' => Gift::class,
                    ],
                ],
                'reference' => 'reward_introduction',
            ],

            // Quêtes
            [
                'items' => [
                    [
                        'item' => 'food_meat_rat',
                        'itemClass' => Food::class,
                    ],
                    [
                        'item' => 'food_meat_rat',
                        'itemClass' => Food::class,
                    ],
                ],
                'crowns' => 10,
                'experience' => 50,
                'reference' => 'reward_combat_port_saint_doux_des_rats_sur_les_docks',
            ],

            // Rencontres
            [
                'items' => [
                    [
                        'item' => 'food_meat_rat',
                        'itemClass' => Food::class,
                    ],
                    [
                        'item' => 'food_meat_rat',
                        'itemClass' => Food::class,
                    ],
                ],
                'crowns' => 100,
                'experience' => 20,
                'reference' => 'reward_combat_port_saint_doux_une_bande_de_rats_sur_les_docks',
            ],
        ];

        foreach($allRewards as $data) {
            $reward = new Reward();
            if(isset($data['items'])) {
                foreach($data['items'] as $rewardItem) {
                    $item = $this->getReference($rewardItem['item'], $rewardItem['itemClass']);
                    $reward->addItem($item);
                }
            }
            $manager->persist($reward);
            $this->addReference($data['reference'], $reward);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 29;
    }
}
