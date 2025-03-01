<?php

namespace App\DataFixtures\Item;

use App\Entity\Item\Category;
use App\Entity\Item\Map;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MapFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $maps = [
            // Royaume
            [
                'category' => 'category_map',
                'name' => "Royaume de l'Île du Nord",
                'description' => "<p>Cette carte finement tracée dévoile les secrets du petit Royaume de l'Île du Nord. Très pratique pour quiconque souhaite percer les mystères de l'île.</p>",
                'picture' => 'map.png',
                'type' => 'realm',
                'map' => 'royaume-de-l-ile-du-nord.png',
                'price' => 100,
                'reference' => 'map_royaume_de_lile_du_nord',
            ],

            // Lieu
            [
                'category' => 'category_map',
                'name' => 'Port Saint-Doux',
                'description' => "<p>Ce parchemin révèle les moindres détails de la capitale Port Saint-Doux, ses quais animés, ses marchés colorés et ses ruelles labyrinthiques. Un indispensable pour quiconque souhaite explorer ses richesses ou éviter ses pièges.</p>",
                'picture' => 'map.png',
                'type' => 'location',
                'map' => 'port-saint-doux.png',
                'price' => 75,
                'reference' => 'map_port_saint_doux',
            ],
            [
                'category' => 'category_map',
                'name' => 'Plouc',
                'description' => "<p>Cette carte montre les quelques maisons de Plouc, un village perdu à l'ouest de l'Île du Nord. Un endroit idéal pour se reposer et se ressourcer. Ou pour pêcher…</p>",
                'picture' => 'map.png',
                'type' => 'location',
                'map' => 'plouc.png',
                'price' => 75,
                'reference' => 'map_plouc',
            ],
        ];

        foreach($maps as $data) {
            $map = new Map();
            $map->setCategory($this->getReference($data['category'], Category::class))
                ->setName($data['name'])
                ->setDescription($data['description'])
                ->setPicture($data['picture'])
                ->setType($data['type'])
                ->setMap($data['map'])
                ->setPrice($data['price']);
            $manager->persist($map);
            $this->addReference($data['reference'], $map);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 15;
    }
}
