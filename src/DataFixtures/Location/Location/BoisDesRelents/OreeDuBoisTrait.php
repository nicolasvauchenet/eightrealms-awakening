<?php

namespace App\DataFixtures\Location\Location\BoisDesRelents;

trait OreeDuBoisTrait
{
    const OREE_DU_BOIS_LOCATIONS = [
        [
            'name' => 'Orée du Bois',
            'picture' => 'img/chapter1/location/oree-du-bois.webp',
            'description' => "<p>Ici, les champs mal entretenus de Plouc s'effilochent peu à peu pour laisser place à une végétation plus anarchique. Les buissons sont griffus, les arbres penchent comme s’ils chuchotaient des secrets nauséabonds, et l’air devient plus lourd à chaque pas.</p><p>Un vieux panneau à moitié mangé par les termites porte l’inscription &laquo;Attention aux relents&raquo;, maladroitement repeinte par une main anonyme. Le sol est encore sec, mais une humidité étrange s’infiltre déjà dans les bottes.</p><p>Ce n’est que le début, et pourtant, on comprend vite que le cœur du bois ne sera pas accueillant.</p>",
            'type' => 'zone',
            'parent' => 'location_bois_des_relents',
            'reference' => 'location_zone_oree_du_bois',
        ],
    ];
}
