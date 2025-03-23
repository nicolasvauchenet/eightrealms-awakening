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
                'picture' => 'royaume-de-lile-du-nord.webp',
                'map' => 'map-royaume-de-lile-du-nord.png',
                'description' => "<p>L'Île du Nord est un royaume prospère, dirigé par le roi Alaric. Les terres fertiles et les mines d'or font la richesse de ce petit royaume, qui attire commerçants et aventuriers en quête de fortune. Les habitants, fiers de leur patrie, sont réputés pour leur hospitalité et leur sens de l'honneur.</p>",
                'reference' => 'location_realm_royaume_de_l_ile_du_nord',
            ],

            // Lieu
            [
                'name' => 'Port Saint-Doux',
                'type' => 'location',
                'picture' => 'port-saint-doux.webp',
                'map' => 'map-port-saint-doux.png',
                'description' => "<p>Port Saint-Doux est la capitale de l'Île du Nord, un port prospère où se croisent marchands, aventuriers et marins en quête de fortune. La ville est dirigée par le maire, un homme autoritaire mais juste, qui veille à maintenir l'ordre et la sécurité dans les rues animées de la cité.</p>",
                'parent' => 'location_realm_royaume_de_l_ile_du_nord',
                'reference' => 'location_port_saint_doux',
            ],
            [
                'name' => 'Plouc',
                'type' => 'location',
                'picture' => 'plouc.webp',
                'map' => 'map-plouc.png',
                'description' => "<p>Le village de pêcheurs de Plouc est un endroit reculé, situé à quelques lieues de Port Saint-Doux. Les habitants, simples et rustiques, vivent de la pêche et de la chasse, loin de l'agitation de la capitale. Les maisons en bois et en torchis s'alignent le long de la côte, où un semblant d'embarcadère semble servir de port de pêche. Les villageois vous regardent d'un air méfiant, et s'en remettent à leurs occupations.</p>",
                'parent' => 'location_realm_royaume_de_l_ile_du_nord',
                'reference' => 'location_plouc',
            ],

            // Zone
            [
                'name' => 'Quartier du Marché',
                'type' => 'zone',
                'picture' => 'quartier-du-marche.webp',
                'description' => "<p>Au cœur de Port Saint-Doux, le Quartier du Marché bourdonne d’activité. Les étals en bois, parfois bancals, débordent de marchandises variées. Les marchands crient leurs offres dans une cacophonie bon enfant, tandis que des gamins courent entre les jambes des passants, sous l'œil attentif des gardes de la ville.</p><p>Un parfum de sel marin flotte dans l’air, mélangé à celui, plus suspect, des poissons oubliés sous le soleil. Les habitants, vêtus de tuniques simples mais pratiques, se croisent en échangeant nouvelles et rumeurs.</p><p>À proximité de vous se trouvent une marchande, un garde et un étrange petit homme qui vous regarde curieusement…</p>",
                'parent' => 'location_port_saint_doux',
                'reference' => 'location_zone_quartier_du_marche',
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
                'picture' => 'docks-de-louest.webp',
                'description' => "<p>Les Docks de l'Ouest de Port Saint-Doux sont le cœur vibrant du port, où pêcheurs, marchands et passants animent la scène parmi les quais neufs et les bateaux amarrés. On y trouve la taverne de la Flûte Moisie, un lieu bruyant et chaleureux, idéal pour se détendre, boire une bière et observer l'agitation des docks.</p>",
                'parent' => 'location_port_saint_doux',
                'reference' => 'location_zone_docks_de_l_ouest',
            ],
            [
                'name' => 'Vieille Ville',
                'type' => 'zone',
                'picture' => 'vieille-ville.webp',
                'description' => "<p>Le quartier de la Vieille Ville est le cœur historique de Port Saint-Doux. Les ruelles étroites et tortueuses serpentent entre les maisons de pierre. Le Temple de la Capitale occupe la place principale, et on distingue quelques enseignes de commerçants. Les habitants, fiers de leur patrimoine, entretiennent les vieilles bâtisses avec amour, veillant à préserver l'âme de la cité.</p>",
                'parent' => 'location_port_saint_doux',
                'reference' => 'location_zone_vieille_ville',
            ],
            [
                'name' => 'Quartier des Ploucs',
                'type' => 'zone',
                'picture' => 'quartier-des-ploucs.webp',
                'description' => "<p>Le quartier des Ploucs s'appelle ainsi parce qu'il a été bâti par les pêcheurs du village de Plouc, qui ont émigré à Port Saint-Doux pour fuir la misère. Les maisons sont modestes, construites en bois et en torchis, et les ruelles sont étroites et mal entretenues. Les habitants, pas toujours très richement vêtus, se pressent autour des étals des marchands, cherchant à troquer leur maigre pêche contre quelques pièces d'argent.</p>",
                'parent' => 'location_port_saint_doux',
                'reference' => 'location_zone_quartier_des_ploucs',
            ],

            // Bâtiment
            [
                'name' => 'Temple de Port Saint-Doux',
                'type' => 'building',
                'picture' => 'temple.webp',
                'thumb' => 'temple_thumb.webp',
                'description' => "<p>Le Temple de Port Saint-Doux est un édifice imposant, construit en pierre blanche. Les colonnes doriques soutiennent un fronton sculpté, représentant les dieux du panthéon local. À l'intérieur, les fidèles se recueillent devant les autels, déposant offrandes et prières aux pieds des statues divines. Le Grand Prêtre ne semble pas très occupé…</p>",
                'parent' => 'location_zone_vieille_ville',
                'reference' => 'location_building_temple_de_port_saint_doux',
            ],
            [
                'name' => 'Forge de Port Saint-Doux',
                'type' => 'building',
                'picture' => 'forge.webp',
                'thumb' => 'forge_thumb.webp',
                'description' => "<p>La Forge est un bâtiment en pierre, surmonté d'une haute cheminée d'où s'échappe une épaisse fumée noire. À l'intérieur, le forgeron travaille le métal avec adresse, martelant et polissant les armes et armures des guerriers de passage. Le bruit des enclumes résonne dans la pièce, couvrant à peine les jurons du forgeron…</p>",
                'parent' => 'location_zone_vieille_ville',
                'reference' => 'location_building_forge_de_port_saint_doux',
            ],
            [
                'name' => 'Arcanes de Port Saint-Doux',
                'type' => 'building',
                'picture' => 'arcanes.webp',
                'thumb' => 'arcanes_thumb.webp',
                'description' => "<p>Les arcanes de Port Saint-Doux sont un lieu mystérieux, où les arcanistes étudient les secrets de la magie. Les étagères croulent sous les grimoires et les fioles d'élixirs, tandis que les apprentis s'entraînent à lancer des sorts. L'Arcaniste a toujours l'air affairé, et qu'il s'adresse à vous ou pas, il a un souvent sourire malicieux aux lèvres…</p>",
                'parent' => 'location_zone_quartier_des_ploucs',
                'reference' => 'location_building_arcanes_de_port_saint_doux',
            ],
            [
                'name' => 'Taverne de la Flûte Moisie',
                'type' => 'building',
                'picture' => 'taverne.webp',
                'thumb' => 'taverne_thumb.webp',
                'description' => "<p>La Taverne de la Flûte Moisie est un lieu bruyant et chaleureux, où les marins et les aventuriers viennent se détendre après une longue journée de travail. Les tables en bois massif sont couvertes de chopes de bière et de plats fumants, et l'odeur de la soupe au poisson flotte dans l'air. Le Tavernier vous adresse un sourire cordial…</p>",
                'parent' => 'location_zone_docks_de_l_ouest',
                'reference' => 'location_building_taverne_de_la_flute_moisie',
            ],
            [
                'name' => 'Maison de Gérard le Pêcheur',
                'type' => 'building',
                'picture' => 'maison-pecheur.webp',
                'thumb' => 'maison_thumb.png',
                'description' => "<p>Cette bicoque en bois est la maison de Gérard, un pêcheur du village de Plouc. Les murs sont couverts de filets de pêche et de trophées de pêche, et une odeur de poisson rance flotte dans l'air. Gérard vous accueille avec un sourire timide, et vous invite à entrer…</p>",
                'parent' => 'location_plouc',
                'reference' => 'location_building_maison_de_gerard_le_pecheur',
            ],

            // Zone extérieure
            [
                'name' => 'Plaine',
                'type' => 'plain',
                'picture' => 'plain.webp',
                'description' => "<p>Une vaste plaine s'étend à perte de vue, couverte d'herbes hautes et de fleurs sauvages. Au loin, on distingue une forêt sombre, où les arbres se dressent comme des sentinelles. Le vent souffle doucement, faisant onduler les hautes herbes, et le soleil brille dans un ciel sans nuages.</p>",
                'parent' => 'location_realm_royaume_de_l_ile_du_nord',
                'reference' => 'location_plain',
            ],
        ];

        foreach($locations as $data) {
            $location = new Location();
            $location->setName($data['name'])
                ->setType($data['type'])
                ->setPicture($data['picture'] ?? null)
                ->setThumb($data['thumb'] ?? null)
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
