<?php

namespace App\DataFixtures\Location\Location\MontsTerribles;

trait GrotteDesEchosTrait
{
    const GROTTE_DES_ECHOS_LOCATIONS = [
        // Lieu
        [
            'name' => 'Grotte des Échos',
            'picture' => 'img/chapter1/location/grotte-des-echos.webp',
            'description' => "<p>Creusée dans la roche noire, la Grotte des Échos renvoie les moindres sons avec un étrange décalage, comme si d'autres voix répétaient vos paroles dans une langue oubliée. Les anciens mineurs disent qu’elle mène à un réseau souterrain encore inexploré, mais nul n’a osé aller au-delà des premiers boyaux.</p>",
            'type' => 'zone',
            'parent' => 'location_monts_terribles',
            'reference' => 'location_zone_grotte_des_echos',
        ],

        // Bâtiment
        [
            'name' => 'La Grotte',
            'picture' => 'img/chapter1/location/la-grotte.webp',
            'description' => "<p>Une vaste caverne aux parois noires, où la lumière peine à percer. Des stalactites pendent comme des crocs menaçants, et le sol est jonché de débris minéraux. Au centre, un feu de camp éteint, entouré de quelques outils rouillés et usés. Des traces de pas dans la poussière indiquent que d’autres sont passés par ici, et des bruits de pioche résonnent au fond, comme si quelqu’un continuait à travailler dans l’obscurité.</p>",
            'type' => 'building',
            'thumbnail' => 'img/core/location/grotte_thumb.webp',
            'parent' => 'location_zone_grotte_des_echos',
            'reference' => 'location_building_la_grotte',
        ],

        // Room
        [
            'name' => 'Le Tunnel de Bardin',
            'picture' => 'img/chapter1/location/le-tunnel-de-bardin.webp',
            'description' => "<p>Un tunnel étroit creusé à la hâte, avec des marques de pioche récentes sur les parois. Le sol est jonché de débris minéraux et de morceaux de bois.</p><p>Au fond du tunnel, un nain solitaire creuse, le visage marqué par l’effort et la fatigue. Il semble agité par une frénésie inquiétante, murmurant des mots incompréhensibles, comme s’il parlait à la pierre elle-même.</p>",
            'type' => 'building',
            'thumbnail' => 'img/core/location/tunnel_thumb.webp',
            'parent' => 'location_building_la_grotte',
            'reference' => 'location_building_le_tunnel_de_bardin',
        ],
    ];
}
