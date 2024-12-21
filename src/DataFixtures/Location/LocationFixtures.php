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
            [
                'name' => 'Plouc',
                'type' => 'Ville',
                'map' => 'plouc.png',
                'reference' => 'location_plouc',
            ],
            [
                'name' => 'Sables Chauds',
                'type' => 'Plage',
                'map' => 'sables-chauds.png',
                'reference' => 'location_sables-chauds',
            ],
            [
                'name' => 'Bois du Pendu',
                'type' => 'Bois',
                'map' => 'bois-du-pendu.png',
                'reference' => 'location_bois-du-pendu',
            ],
            [
                'name' => 'Monts Terribles',
                'type' => 'Montagne',
                'map' => 'monts-terribles.png',
                'reference' => 'location_monts-terribles',
            ],
            [
                'name' => "Donjon de l'Âme",
                'type' => 'Donjon',
                'map' => 'donjon-de-lame.png',
                'reference' => 'location_donjon-de-lame',
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
