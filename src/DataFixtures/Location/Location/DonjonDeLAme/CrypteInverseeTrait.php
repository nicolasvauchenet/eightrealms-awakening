<?php

namespace App\DataFixtures\Location\Location\DonjonDeLAme;

trait CrypteInverseeTrait
{
    const CRYPTE_INVERSEE_LOCATIONS = [
        [
            'name' => 'Crypte Inversée',
            'picture' => 'img/chapter1/location/crypte-inversee.webp',
            'description' => "<p>Les murs de cette crypte défient toute logique : les voûtes semblent pencher vers le sol, et les ombres se déplacent contre la lumière. Un grand sarcophage occupe le centre, son couvercle gravé à l’effigie du premier roi, Galdric Ier. Pourtant… quelque chose ne colle pas. L’air est trop froid, le silence trop parfait, même le gisant ne ressemble pas tellement au souvenir du Roi antique que vous avez aperçu dans vos pérégrinations.</p>",
            'type' => 'zone',
            'parent' => 'location_donjon_de_l_ame',
            'reference' => 'location_zone_crypte_inversee',
        ],
    ];
}
