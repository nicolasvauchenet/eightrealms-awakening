<?php

namespace App\DataFixtures\Scene;

use App\Entity\Location\Place;
use App\Entity\Scene\PlaceScene;
use App\Entity\Screen\PlaceScreen;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PlaceSceneFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $scenes = [
            [
                'name' => 'Place du Marché',
                'position' => 1,
                'place' => 'place_place_du_marche',
                'screen' => 'screen_place_place_du_marche',
                'reference' => 'scene_place_place_du_marche',
            ],
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
        return 23;
    }
}
