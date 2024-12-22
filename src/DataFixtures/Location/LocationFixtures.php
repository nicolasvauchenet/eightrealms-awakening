<?php

namespace App\DataFixtures\Location;

use App\Entity\Item\Misc;
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
                'name' => "Royaume de l'Île du Nord",
                'type' => 'Royaume',
                'picture' => 'royaume-de-lile-du-nord.webp',
                'map' => 'misc_map_royaume_de_lile_du_nord',
                'reference' => 'location_royaume-de-lile-du-nord',
            ],
            [
                'name' => 'Port Saint-Doux',
                'type' => 'Ville',
                'picture' => 'port-saint-doux.webp',
                'map' => 'misc_map_port_saint_doux',
                'reference' => 'location_port_saint_doux',
            ],
            [
                'name' => 'Plouc',
                'type' => 'Ville',
                'reference' => 'location_plouc',
            ],
            [
                'name' => 'Sables Chauds',
                'type' => 'Plage',
                'picture' => 'sables-chauds.png',
                'reference' => 'location_sables-chauds',
            ],
            [
                'name' => 'Bois du Pendu',
                'type' => 'Bois',
                'picture' => 'bois-du-pendu.png',
                'reference' => 'location_bois-du-pendu',
            ],
            [
                'name' => 'Monts Terribles',
                'type' => 'Montagne',
                'picture' => 'monts-terribles.png',
                'reference' => 'location_monts-terribles',
            ],
            [
                'name' => "Donjon de l'Âme",
                'type' => 'Donjon',
                'picture' => 'donjon-de-lame.png',
                'reference' => 'location_donjon-de-lame',
            ],
        ];

        foreach($locations as $data) {
            $location = new Location();
            $location->setName($data['name'])
                ->setType($data['type'])
                ->setPicture($data['picture'] ?? null)
                ->setMap(isset($data['map']) ? $this->getReference($data['map'], Misc::class) : null);
            $manager->persist($location);
            $this->addReference($data['reference'], $location);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 19;
    }
}
