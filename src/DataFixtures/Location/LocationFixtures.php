<?php

namespace App\DataFixtures\Location;

use App\Entity\Location\Location;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class LocationFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $locations = [
            [
                'name' => 'Port Saint-Doux',
                'type' => 'Ville',
                'map' => 'port-saint-doux.png',
                'reference' => 'location_port_saint_doux',
            ],
        ];

        foreach($locations as $data) {
            $location = new Location();
            $location->setName($data['name'])
                ->setType($data['type'])
                ->setMap($data['map'] ?? null);
            $manager->persist($location);
            $this->addReference($data['reference'], $location);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 18;
    }
}
