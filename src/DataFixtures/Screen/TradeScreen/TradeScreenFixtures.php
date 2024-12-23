<?php

namespace App\DataFixtures\Screen\TradeScreen;

use App\Entity\Character\Npc;
use App\Entity\Screen\TradeScreen;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TradeScreenFixtures extends Fixture implements OrderedFixtureInterface
{
    use QuartierDuMarcheTrait;

    public function load(ObjectManager $manager): void
    {
        $screens = [
            self::SOPHIE_LA_MARCHANDE,
        ];

        foreach($screens as $data) {
            $screen = new TradeScreen();
            $screen->setName($data['name'])
                ->setNpc($this->getReference($data['npc'], Npc::class));
            $manager->persist($screen);
            $this->addReference($data['reference'], $screen);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 43;
    }
}
