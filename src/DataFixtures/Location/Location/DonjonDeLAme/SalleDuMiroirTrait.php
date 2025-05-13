<?php

namespace App\DataFixtures\Location\Location\DonjonDeLAme;

trait SalleDuMiroirTrait
{
    const SALLE_DU_MIROIR_LOCATIONS = [
        [
            'name' => 'Salle du Miroir',
            'picture' => 'img/chapter1/location/salle-du-miroir.webp',
            'description' => "<p>Au centre de cette pièce austère se dresse un grand miroir ancien, terni par les ans, ses bords noircis par le temps. Il ne reflète que partiellement votre silhouette, comme si une autre réalité y sommeillait. Sur le mur du fond, une porte trône, hermétique, sans serrure ni poignée. L’ambiance y est glaciale, presque inquisitrice.</p>",
            'type' => 'zone',
            'parent' => 'location_donjon_de_l_ame',
            'reference' => 'location_zone_salle_du_miroir',
        ],
    ];
}
