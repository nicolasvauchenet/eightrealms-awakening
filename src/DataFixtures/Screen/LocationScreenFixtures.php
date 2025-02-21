<?php

namespace App\DataFixtures\Screen;

use App\Entity\Location\Location;
use App\Entity\Screen\LocationScreen;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class LocationScreenFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $screens = [
            // Port Saint-Doux
            [
                'name' => 'Quartier du Marché',
                'location' => 'location_zone_quartier_du_marche',
                'reference' => 'screen_location_quartier_du_marche',
            ],
            [
                'name' => 'Anciens Docks',
                'location' => 'location_zone_anciens_docks',
                'reference' => 'screen_location_anciens_docks',
            ],
            [
                'name' => "Docks de l'Ouest",
                'location' => 'location_zone_docks_de_l_ouest',
                'reference' => 'screen_location_docks_de_l_ouest',
            ],
            [
                'name' => 'Temple de Port Saint-Doux',
                'location' => 'location_building_temple_de_port_saint_doux',
                'reference' => 'screen_location_temple_de_port_saint_doux',
            ],
            [
                'name' => 'Forge de Port Saint-Doux',
                'location' => 'location_building_forge_de_port_saint_doux',
                'reference' => 'screen_location_forge_de_port_saint_doux',
            ],
        ];

        foreach($screens as $data) {
            $screen = new LocationScreen();
            $screen->setName($data['name'])
                ->setLocation($this->getReference($data['location'], Location::class));
            $manager->persist($screen);
            $this->addReference($data['reference'], $screen);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 24;
    }
}
