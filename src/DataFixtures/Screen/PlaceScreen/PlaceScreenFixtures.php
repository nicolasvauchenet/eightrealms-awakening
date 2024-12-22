<?php

namespace App\DataFixtures\Screen\PlaceScreen;

use App\Entity\Character\Npc;
use App\Entity\Location\Place;
use App\Entity\Screen\PlaceScreen;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PlaceScreenFixtures extends Fixture implements OrderedFixtureInterface
{
    use QuartierDuMarcheTrait;

    public function load(ObjectManager $manager): void
    {
        $screens = [
            self::QUARTIER_DU_MARCHE,
        ];

        foreach($screens as $data) {
            $screen = new PlaceScreen();
            $screen->setName($data['name'])
                ->setPlace($this->getReference($data['place'], Place::class));
            foreach($data['npcs'] as $npc) {
                $screen->addNpc($this->getReference($npc, Npc::class));
            }
            $manager->persist($screen);
            $this->addReference($data['reference'], $screen);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 41;
    }
}
