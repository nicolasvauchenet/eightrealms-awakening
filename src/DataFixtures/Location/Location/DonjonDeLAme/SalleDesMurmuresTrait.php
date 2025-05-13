<?php

namespace App\DataFixtures\Location\Location\DonjonDeLAme;

trait SalleDesMurmuresTrait
{
    const SALLE_DES_MURMURES_LOCATIONS = [
        [
            'name' => 'Salle des Murmures',
            'picture' => 'img/chapter1/location/salle-des-murmures.webp',
            'description' => "<p>Une lumière vacillante provient d’une lanterne posée à même le sol. Dans le coin le plus reculé, une silhouette adossée au mur vous observe. Le Roi Galdric III, affaibli, blessé… mais vivant. Les pierres semblent elles-mêmes chuchoter des noms aussi anciens que mystérieux, et chaque pas que vous faites soulève des échos comme s’ils dérangeaient d’anciens secrets enfouis.</p>",
            'type' => 'zone',
            'parent' => 'location_donjon_de_l_ame',
            'reference' => 'location_zone_salle_des_murmures',
        ],
    ];
}
