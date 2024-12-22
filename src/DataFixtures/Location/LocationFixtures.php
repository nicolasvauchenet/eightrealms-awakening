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
                'picture' => 'port-saint-doux.webp',
                'map' => 'map_port-saint-doux.png',
                'reference' => 'location_port_saint_doux',
            ],
            [
                'name' => 'Plouc',
                'type' => 'Ville',
                'map' => 'map_plouc.png',
                'reference' => 'location_plouc',
            ],
            [
                'name' => 'Sables Chauds',
                'type' => 'Plage',
                'picture' => 'sables-chauds.png',
                'map' => 'map_sables-chauds.png',
                'reference' => 'location_sables-chauds',
            ],
            [
                'name' => 'Bois du Pendu',
                'type' => 'Bois',
                'picture' => 'bois-du-pendu.png',
                'map' => 'map_bois-du-pendu.png',
                'reference' => 'location_bois-du-pendu',
            ],
            [
                'name' => 'Monts Terribles',
                'type' => 'Montagne',
                'picture' => 'monts-terribles.png',
                'map' => 'map_monts-terribles.png',
                'reference' => 'location_monts-terribles',
            ],
            [
                'name' => "Donjon de l'Âme",
                'type' => 'Donjon',
                'picture' => 'donjon-de-lame.png',
                'map' => 'map_donjon-de-lame.png',
                'reference' => 'location_donjon-de-lame',
            ],
        ];

        foreach($locations as $data) {
            $location = new Location();
            $location->setName($data['name'])
                ->setType($data['type'])
                ->setPicture($data['picture'] ?? null)
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
