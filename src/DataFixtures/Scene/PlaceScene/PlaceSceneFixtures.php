<?php

namespace App\DataFixtures\Scene\PlaceScene;

use App\Entity\Location\Place;
use App\Entity\Scene\PlaceScene;
use App\Entity\Screen\PlaceScreen;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PlaceSceneFixtures extends Fixture implements OrderedFixtureInterface
{
    use PlaceDuMarcheTrait;
    use AnciensDocksTrait;

    public function load(ObjectManager $manager): void
    {
        $scenes = [
            self::QUARTIER_DU_MARCHE,
            self::ANCIENS_DOCKS,
        ];

        foreach($scenes as $data) {
            $scene = new PlaceScene();
            $scene->setName($data['name'])
                ->setPicture($data['picture'] ?? null)
                ->setDescription($data['description'] ?? null)
                ->setPosition($data['position'] ?? null)
                ->setPlace($this->getReference($data['place'], Place::class))
                ->setScreen($this->getReference($data['screen'], PlaceScreen::class));
            $manager->persist($scene);
            $this->addReference($data['reference'], $scene);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 51;
    }
}
