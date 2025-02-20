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
            // Royaume
            [
                'name' => "Royaume de l'Île du Nord",
                'type' => 'realm',
                'picture' => 'royaume-de-l-ile-du-nord.webp',
                'map' => 'map_royaume_de_l-ile_du_nord.png',
                'description' => "<p>L'Île du Nord est un royaume prospère, dirigé par le roi Alaric. Les terres fertiles et les mines d'or font la richesse de ce petit royaume, qui attire commerçants et aventuriers en quête de fortune. Les habitants, fiers de leur patrie, sont réputés pour leur hospitalité et leur sens de l'honneur.</p>",
                'reference' => 'location_royaume_de_l_ile_du_nord',
            ],

            // Lieu
            [
                'name' => 'Port Saint-Doux',
                'type' => 'location',
                'picture' => 'port-saint-doux.webp',
                'map' => 'map_port_saint_doux.png',
                'description' => "<p>Port Saint-Doux est la capitale de l'Île du Nord, un port prospère où se croisent marchands, aventuriers et marins en quête de fortune. La ville est dirigée par le maire, un homme autoritaire mais juste, qui veille à maintenir l'ordre et la sécurité dans les rues animées de la cité.</p>",
                'parent' => 'location_royaume_de_l_ile_du_nord',
                'reference' => 'location_port_saint_doux',
            ],

            // Zone
            [
                'name' => 'Place du Marché',
                'type' => 'zone',
                'picture' => 'place-du-marche.webp',
                'description' => "<p>La Place du Marché est le cœur battant de Port Saint-Doux, où se retrouvent marchands, artisans et aventuriers en quête de marchandises rares et précieuses. Les étals colorés débordent de fruits, de légumes et d'épices exotiques, tandis que les marchands crient leurs offres dans une cacophonie bon enfant.</p>",
                'parent' => 'location_port_saint_doux',
                'reference' => 'location_place_du_marche',
            ],
        ];

        foreach($locations as $data) {
            $location = new Location();
            $location->setName($data['name'])
                ->setType($data['type'])
                ->setPicture($data['picture'] ?? null)
                ->setMap($data['map'] ?? null)
                ->setDescription($data['description'])
                ->setParent(isset($data['parent']) ? $this->getReference($data['parent'], Location::class) : null);
            $manager->persist($location);
            $this->addReference($data['reference'], $location);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 21;
    }
}
