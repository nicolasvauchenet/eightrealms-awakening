<?php

namespace App\DataFixtures\Location\Location\MontsTerribles;

trait GouffreDAskalorTrait
{
    const GOUFFRE_D_ASKALOR_LOCATIONS = [
        // Lieu
        [
            'name' => 'Gouffre d’Askalor',
            'picture' => 'img/chapter1/location/gouffre-daskalor.webp',
            'description' => "<p>Un immense puits naturel, béant au cœur des Monts Terribles, réputé sans fond. On y jetait autrefois des offrandes, selon les superstitions et les croyances, pour calmer ce qui s'y terrait. Le vent qui remonte du gouffre ressemble à un souffle… ou à un râle.</p><p>On chuchote qu’Askalor y dort toujours, tapi dans l’obscurité.</p>",
            'type' => 'zone',
            'parent' => 'location_monts_terribles',
            'reference' => 'location_zone_gouffre_d_askalor',
        ],

        // Bâtiment
        [
            'name' => 'Le Gouffre',
            'picture' => 'img/chapter1/location/le-gouffre.webp',
            'description' => "<p>Une vaste caverne circulaire, aux parois lisses et sombres, où la lumière peine à atteindre les bords. Au fond, un tunnel qui ne semble pas très profond, d'où émane une chaleur étrange. Des traces de rituels anciens sont visibles sur les murs, des symboles gravés à la hâte. L’air est lourd, chargé d’une odeur de soufre et de poussière.</p>",
            'type' => 'building',
            'thumbnail' => 'img/core/location/grotte_thumb.webp',
            'parent' => 'location_zone_gouffre_d_askalor',
            'reference' => 'location_building_le_gouffre',
        ],

        // Room
        [
            'name' => 'La Chambre du Rituel',
            'picture' => 'img/chapter1/location/la-chambre-du-rituel.webp',
            'description' => "<p>Une petite alcôve au fond du gouffre, où les murs sont couverts de symboles étranges et de runes anciennes. Au centre, un autel de pierre noircie par le temps, entouré de bougies allumées, sur lequel repose un nain gros et gras. Il semble à demi conscient, apparemment endormi, ou drogué.</p><p>L’air est chargé d’une énergie palpable, comme si le lieu était imprégné de magie ancienne.</p><p>Tout autour de l'autel, un groupe de nains encapuchonnés murmure des incantations dans une langue oubliée, leurs visages cachés dans l’ombre. Ils semblent en transe, comme s'ils communiaient avec une puissance ancienne et terrifiante.</p><p>Vous entendez comme des murmures dans la pièce, une voix rauque et profonde qui résonne dans votre esprit, vous invitant à vous approcher de l'autel.</p>",
            'type' => 'building',
            'thumbnail' => 'img/core/location/tunnel_thumb.webp',
            'parent' => 'location_building_le_gouffre',
            'reference' => 'location_building_la_chambre_du_rituel',
        ],
    ];
}
