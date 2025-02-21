<?php

namespace App\DataFixtures\Location;

use App\Entity\Character\Npc;
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
                'reference' => 'location_realm_royaume_de_l_ile_du_nord',
            ],

            // Lieu
            [
                'name' => 'Port Saint-Doux',
                'type' => 'location',
                'picture' => 'port-saint-doux.webp',
                'map' => 'map_port_saint_doux.png',
                'description' => "<p>Port Saint-Doux est la capitale de l'Île du Nord, un port prospère où se croisent marchands, aventuriers et marins en quête de fortune. La ville est dirigée par le maire, un homme autoritaire mais juste, qui veille à maintenir l'ordre et la sécurité dans les rues animées de la cité.</p>",
                'parent' => 'location_realm_royaume_de_l_ile_du_nord',
                'reference' => 'location_port_saint_doux',
            ],

            // Zone
            [
                'name' => 'Place du Marché',
                'type' => 'zone',
                'picture' => 'place-du-marche.webp',
                'description' => "<p>Au cœur de Port Saint-Doux, la Place du Marché bourdonne d’activité. Les étals en bois, parfois bancals, débordent de marchandises variées. Les marchands crient leurs offres dans une cacophonie bon enfant, tandis que des gamins courent entre les jambes des passants, sous l'œil attentif des gardes de la ville.</p><p>Un parfum de sel marin flotte dans l’air, mélangé à celui, plus suspect, des poissons oubliés sous le soleil. Les habitants, vêtus de tuniques simples mais pratiques, se croisent en échangeant nouvelles et rumeurs.</p><p>À proximité de vous se trouvent une marchande, un garde et un étrange petit homme qui vous regarde curieusement…</p>",
                'parent' => 'location_port_saint_doux',
                'reference' => 'location_zone_place_du_marche',
            ],
            [
                'name' => 'Anciens Docks',
                'type' => 'zone',
                'picture' => 'anciens-docks.webp',
                'description' => "<p>Les anciens docks sont quasiment abandonnés. Les rats y ont élu domicile et se faufilent entre les planches de bois à la recherche de nourriture. Les marchands ont déserté les lieux, laissant derrière eux des caisses vides et des tonneaux éventrés. Les gardes, eux, n'ont pas l'habitude de s'aventurer dans ce quartier mal famé. Les passants évitent soigneusement de s'y aventurer, préférant emprunter les ruelles plus sûres de la ville.</p>",
                'parent' => 'location_port_saint_doux',
                'reference' => 'location_zone_anciens_docks',
            ],
            [
                'name' => "Docks de l'Ouest",
                'type' => 'zone',
                'picture' => 'docks-de-l-ouest.webp',
                'description' => "<p>Les Docks de l'Ouest de Port Saint-Doux sont le cœur vibrant du port, où pêcheurs, marchands et passants animent la scène parmi les quais neufs et les bateaux amarrés. On y trouve la taverne de la Flûte Moisie, un lieu bruyant et chaleureux, idéal pour se détendre, boire une bière et observer l'agitation des docks.</p>",
                'parent' => 'location_port_saint_doux',
                'reference' => 'location_zone_docks-de-l-ouest',
            ],
            [
                'name' => 'Vieille Ville',
                'type' => 'zone',
                'picture' => 'vieille-ville.webp',
                'description' => "<p>Le quartie de la Vieille Ville est le cœur historique de Port Saint-Doux. Les ruelles étroites et tortueuses serpentent entre les maisons de pierre. Le Temple de la Capitale occupe la place principale, et on distingue quelques enseignes de commerçants. Les habitants, fiers de leur patrimoine, entretiennent les vieilles bâtisses avec amour, veillant à préserver l'âme de la cité.</p>",
                'parent' => 'location_port_saint_doux',
                'reference' => 'location_zone_vieille-ville',
            ],

            // Bâtiment
            [
                'name' => 'Temple de Port Saint-Doux',
                'type' => 'building',
                'picture' => 'temple.webp',
                'description' => "<p>Le Temple de Port Saint-Doux est un édifice imposant, construit en pierre blanche. Les colonnes doriques soutiennent un fronton sculpté, représentant les dieux du panthéon local. À l'intérieur, les fidèles se recueillent devant les autels, déposant offrandes et prières aux pieds des statues divines. Le Grand Prêtre ne semble pas très occupé…</p>",
                'parent' => 'location_zone_vieille-ville',
                'reference' => 'location_building_temple_de_port_saint_doux',
            ],
            [
                'name' => 'Forge de Port Saint-Doux',
                'type' => 'building',
                'picture' => 'forge.webp',
                'description' => "<p>La Forge est un bâtiment en pierre, surmonté d'une haute cheminée d'où s'échappe une épaisse fumée noire. À l'intérieur, le forgeron travaille le métal avec adresse, martelant et polissant les armes et armures des guerriers de passage. Le bruit des enclumes résonne dans la pièce, couvrant à peine les jurons du forgeron…</p>",
                'parent' => 'location_zone_vieille-ville',
                'reference' => 'location_building_forge_de_port_saint_doux',
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
