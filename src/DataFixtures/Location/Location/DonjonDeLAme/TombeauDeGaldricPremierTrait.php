<?php

namespace App\DataFixtures\Location\Location\DonjonDeLAme;

trait TombeauDeGaldricPremierTrait
{
    const TOMBEAU_DE_GALDRIC_PREMIER_LOCATIONS = [
        [
            'name' => 'Tombeau de Galdric 1er',
            'picture' => 'img/chapter1/location/tombeau-de-galdric-premier.webp',
            'description' => "<p>Cette pièce solennelle est baignée d’une lumière surnaturelle. Le véritable tombeau du roi Galdric Ier repose là, majestueux et silencieux. Devant lui, une silhouette se dresse, sombre, presque irréelle. Nashoré. Il vous observe avec une intensité glaciale, comme s’il avait attendu ce moment depuis un siècle.</p>",
            'type' => 'zone',
            'parent' => 'location_donjon_de_l_ame',
            'reference' => 'location_zone_tombeau_de_galdric_premier',
        ],
    ];
}
