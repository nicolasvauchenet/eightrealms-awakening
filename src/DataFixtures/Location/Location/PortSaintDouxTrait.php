<?php

namespace App\DataFixtures\Location\Location;

trait PortSaintDouxTrait
{
    const PORT_SAINT_DOUX_LOCATIONS = [
        // Lieu
        [
            'name' => 'Port Saint-Doux',
            'picture' => 'img/chapter1/location/port-saint-doux.webp',
            'description' => "<p>Port Saint-Doux est la capitale de l'Île du Nord, un port prospère où se croisent marchands, aventuriers et marins en quête de fortune. La ville est dirigée par le maire, un homme autoritaire mais juste, qui veille à maintenir l'ordre et la sécurité dans les rues animées de la cité.</p>",
            'type' => 'location',
            'parent' => 'location_realm_royaume_de_l_ile_du_nord',
            'map' => 'map_port_saint_doux',
            'reference' => 'location_port_saint_doux',
        ],

        // Zone
        [
            'name' => 'Quartier du Marché',
            'picture' => 'img/chapter1/location/quartier-du-marche.webp',
            'description' => "<p>Au cœur de Port Saint-Doux, le Quartier du Marché bourdonne d’activité. Les étals en bois, parfois bancals, débordent de marchandises variées. Les marchands crient leurs offres dans une cacophonie bon enfant, tandis que des gamins courent entre les jambes des passants, sous l'œil attentif des gardes de la ville.</p><p>Un parfum de sel marin flotte dans l’air, mélangé à celui, plus suspect, des poissons oubliés sous le soleil. Les habitants, vêtus de tuniques simples mais pratiques, se croisent en échangeant nouvelles et rumeurs.</p><p>À proximité de vous se trouvent une marchande, un garde et un étrange petit homme qui vous regarde avec insistance…</p>",
            'type' => 'zone',
            'parent' => 'location_port_saint_doux',
            'reference' => 'location_zone_quartier_du_marche',
        ],
        [
            'name' => 'Anciens Docks',
            'picture' => 'img/chapter1/location/anciens-docks.webp',
            'description' => "<p>Les anciens docks sont quasiment abandonnés. Les rats y ont élu domicile et se faufilent entre les planches de bois à la recherche de nourriture. Les marchands ont déserté les lieux, laissant derrière eux des caisses vides et des tonneaux éventrés. Les gardes, eux, n'ont pas l'habitude de s'aventurer dans ce quartier mal famé. Les passants évitent soigneusement de s'y aventurer, préférant emprunter les ruelles plus sûres de la ville.</p>",
            'type' => 'zone',
            'parent' => 'location_port_saint_doux',
            'reference' => 'location_zone_anciens_docks',
        ],
        [
            'name' => "Docks de l'Ouest",
            'picture' => 'img/chapter1/location/docks-de-louest.webp',
            'description' => "<p>Les Docks de l'Ouest de Port Saint-Doux sont le cœur vibrant du port, où pêcheurs, marchands et passants animent la scène parmi les quais neufs et les bateaux amarrés. On y trouve la taverne de la Flûte Moisie, un lieu bruyant et chaleureux, idéal pour se détendre, boire une bière et observer l'agitation des docks.</p>",
            'type' => 'zone',
            'parent' => 'location_port_saint_doux',
            'reference' => 'location_zone_docks_de_l_ouest',
        ],
        [
            'name' => 'Vieille Ville',
            'picture' => 'img/chapter1/location/vieille-ville.webp',
            'description' => "<p>Le quartier de la Vieille Ville est le cœur historique de Port Saint-Doux. Les ruelles étroites et tortueuses serpentent entre les maisons de pierre. Le Temple de la Capitale occupe la place principale, et on distingue quelques enseignes de commerçants. Les habitants, fiers de leur patrimoine, entretiennent les vieilles bâtisses avec amour, veillant à préserver l'âme de la cité.</p>",
            'type' => 'zone',
            'parent' => 'location_port_saint_doux',
            'reference' => 'location_zone_vieille_ville',
        ],
        [
            'name' => 'Quartier des Ploucs',
            'picture' => 'img/chapter1/location/quartier-des-ploucs.webp',
            'description' => "<p>Le quartier des Ploucs s'appelle ainsi parce qu'il a été bâti par les pêcheurs du village de Plouc, qui ont émigré à Port Saint-Doux pour fuir la misère. Les maisons sont modestes, construites en bois et en torchis, et les ruelles sont étroites et mal entretenues. Les habitants, pas toujours très richement vêtus, se pressent autour des étals des marchands, cherchant à troquer leur maigre pêche contre quelques pièces d'argent.</p>",
            'type' => 'zone',
            'parent' => 'location_port_saint_doux',
            'reference' => 'location_zone_quartier_des_ploucs',
        ],

        // Bâtiment
        [
            'name' => 'Temple de Port Saint-Doux',
            'picture' => 'img/core/location/temple.webp',
            'description' => "<p>Le Temple de Port Saint-Doux est un édifice imposant, construit en pierre blanche. Les colonnes doriques soutiennent un fronton sculpté, représentant les dieux du panthéon local. À l'intérieur, les fidèles se recueillent devant les autels, déposant offrandes et prières aux pieds des statues divines. Le Grand Prêtre ne semble pas très occupé…</p>",
            'type' => 'building',
            'thumbnail' => 'img/core/location/temple_thumb.webp',
            'parent' => 'location_zone_vieille_ville',
            'reference' => 'location_building_temple_de_port_saint_doux',
        ],
        [
            'name' => 'Forge de Port Saint-Doux',
            'picture' => 'img/core/location/forge.webp',
            'description' => "<p>La Forge est un bâtiment en pierre, surmonté d'une haute cheminée d'où s'échappe une épaisse fumée noire. À l'intérieur, le forgeron travaille le métal avec adresse, martelant et polissant les armes et armures des guerriers de passage. Le bruit de l'enclume résonne dans la pièce, couvrant à peine les jurons du forgeron…</p>",
            'type' => 'building',
            'thumbnail' => 'img/core/location/forge_thumb.webp',
            'parent' => 'location_zone_vieille_ville',
            'reference' => 'location_building_forge_de_port_saint_doux',
        ],
        [
            'name' => 'Arcanes de Port Saint-Doux',
            'picture' => 'img/core/location/arcanes.webp',
            'description' => "<p>Les arcanes de Port Saint-Doux sont un lieu mystérieux, où les arcanistes étudient les secrets de la magie. Les étagères croulent sous les grimoires et les fioles d'élixirs, tandis que les apprentis s'entraînent à lancer des sorts. L'Arcaniste a toujours l'air affairé, et qu'il s'adresse à vous ou pas, il a un souvent sourire malicieux aux lèvres…</p>",
            'type' => 'building',
            'thumbnail' => 'img/core/location/arcanes_thumb.webp',
            'parent' => 'location_zone_quartier_des_ploucs',
            'reference' => 'location_building_arcanes_de_port_saint_doux',
        ],
        [
            'name' => 'Taverne de la Flûte Moisie',
            'picture' => 'img/core/location/taverne.webp',
            'description' => "<p>La Taverne de la Flûte Moisie est un lieu bruyant et chaleureux, où les marins et les aventuriers viennent se détendre après une longue journée de travail. Les tables en bois massif sont couvertes de chopes de bière et de plats fumants, et l'odeur de la soupe au poisson flotte dans l'air. Le Tavernier vous adresse un sourire cordial…</p>",
            'type' => 'building',
            'thumbnail' => 'img/core/location/taverne_thumb.webp',
            'parent' => 'location_zone_docks_de_l_ouest',
            'reference' => 'location_building_taverne_de_la_flute_moisie',
        ],
    ];
}
