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
