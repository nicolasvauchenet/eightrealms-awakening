<?php

namespace App\DataFixtures\Location;

use App\Entity\Location\Location;
use App\Entity\Location\Place;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PlaceFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $places = [
            [
                'name' => 'Place du Marché',
                'type' => 'Place',
                'picture' => 'place-du-marche.webp',
                'description' => "<p>Au cœur de Port Saint-Doux, la Place du Marché bourdonne d’activité dès les premières lueurs du jour. Les étals en bois, parfois bancals, débordent de marchandises variées. Les marchands crient leurs offres dans une cacophonie bon enfant, tandis que des enfants courent entre les jambes des passants, sous l'œil attentif des gardes de la ville.</p><p>Un parfum de sel marin flotte dans l’air, mélangé à celui, plus suspect, des poissons oubliés sous le soleil. Les habitants de Port Saint-Doux, vêtus de tuniques simples mais pratiques, se croisent en échangeant nouvelles et rumeurs.</p><p>À proximité de vous se trouvent une marchande, un garde et un étrange petit homme qui vous regarde curieusement…</p>",
                'location' => 'location_port_saint_doux',
                'reference' => 'place_place_du_marche',
            ],
        ];

        foreach($places as $data) {
            $place = new Place();
            $place->setName($data['name'])
                ->setType($data['type'])
                ->setPicture($data['picture'])
                ->setDescription($data['description'])
                ->setLocation($this->getReference($data['location'], Location::class));
            $manager->persist($place);
            $this->addReference($data['reference'], $place);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 19;
    }
}