<?php

namespace App\DataFixtures\Location\Location\PortSaintDoux;

trait VieilleVilleTrait
{
    const VIEILLE_VILLE_LOCATIONS = [
        [
            'name' => 'Vieille Ville',
            'picture' => 'img/chapter1/location/vieille-ville.webp',
            'description' => "<p>Le quartier de la Vieille Ville est le cœur historique de Port Saint-Doux. Les ruelles étroites et tortueuses serpentent entre les maisons de pierre. Le Temple de la Capitale occupe la place principale, et on distingue quelques enseignes de commerçants. Les habitants, fiers de leur patrimoine, entretiennent les vieilles bâtisses avec amour, veillant à préserver l'âme de la cité.</p>",
            'type' => 'zone',
            'parent' => 'location_port_saint_doux',
            'reference' => 'location_zone_vieille_ville',
        ],

        // Bâtiment
        [
            'name' => 'Forge de Port Saint-Doux',
            'picture' => 'img/chapter1/location/forge-de-port-saint-doux.webp',
            'description' => "<p>La Forge est un bâtiment en pierre, surmonté d'une haute cheminée d'où s'échappe une épaisse fumée noire. À l'intérieur, le forgeron travaille le métal avec adresse, martelant et polissant les armes et armures des guerriers de passage. Le bruit de l'enclume résonne dans la pièce, couvrant à peine les jurons du forgeron…</p>",
            'type' => 'building',
            'thumbnail' => 'img/core/location/forge_thumb.webp',
            'parent' => 'location_zone_vieille_ville',
            'reference' => 'location_building_forge_de_port_saint_doux',
        ],
        [
            'name' => 'Temple de Port Saint-Doux',
            'picture' => 'img/chapter1/location/temple-de-port-saint-doux.webp',
            'description' => "<p>Le Temple de Port Saint-Doux est un édifice imposant, construit en pierre blanche. Les colonnes doriques soutiennent un fronton sculpté, représentant les dieux du panthéon local. À l'intérieur, les fidèles se recueillent devant les autels, déposant offrandes et prières aux pieds des statues divines. Le Grand Prêtre ne semble pas très occupé…</p>",
            'type' => 'building',
            'thumbnail' => 'img/core/location/temple_thumb.webp',
            'parent' => 'location_zone_vieille_ville',
            'reference' => 'location_building_temple_de_port_saint_doux',
        ],
    ];
}
