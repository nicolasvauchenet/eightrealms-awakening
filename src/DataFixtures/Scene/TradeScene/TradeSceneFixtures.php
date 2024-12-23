<?php

namespace App\DataFixtures\Scene\TradeScene;

use App\Entity\Character\Npc;
use App\Entity\Scene\TradeScene;
use App\Entity\Screen\TradeScreen;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TradeSceneFixtures extends Fixture implements OrderedFixtureInterface
{
    use QuartierDuMarcheTrait;

    public function load(ObjectManager $manager): void
    {
        $scenes = [
            self::SOPHIE_LA_MARCHANDE_TRADE,
        ];

        foreach($scenes as $data) {
            $scene = new TradeScene();
            $scene->setName($data['name'])
                ->setPicture($data['picture'] ?? null)
                ->setDescription($data['description'] ?? null)
                ->setPosition($data['position'] ?? null)
                ->setScreen($this->getReference($data['screen'], TradeScreen::class))
                ->setSellableItems($data['sellableItems'])
                ->setNpc($this->getReference($data['npc'], Npc::class));
            $manager->persist($scene);
            $this->addReference($data['reference'], $scene);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 53;
    }
}
