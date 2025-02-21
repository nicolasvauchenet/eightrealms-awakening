<?php

namespace App\DataFixtures\Screen;

use App\Entity\Screen\TradeScreen;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TradeScreenFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $screens = [
            [
                'name' => 'Commercer avec un PNJ',
                'reference' => 'screen_trade',
            ],
            [
                'name' => 'Réparer avec un PNJ',
                'reference' => 'screen_trade_repair',
            ],
            [
                'name' => 'Recharger avec un PNJ',
                'reference' => 'screen_trade_reload',
            ],
        ];

        foreach($screens as $data) {
            $screen = new TradeScreen();
            $screen->setName($data['name']);
            $manager->persist($screen);
            $this->addReference($data['reference'], $screen);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 26;
    }
}
