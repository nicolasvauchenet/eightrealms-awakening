<?php

namespace App\DataFixtures\Location\Location\DonjonDeLAme;

trait SalleDesChainesTrait
{
    const SALLE_DES_CHAINES_LOCATIONS = [
        [
            'name' => 'Salle des Chaînes',
            'picture' => 'img/chapter1/location/salle-des-chaines.webp',
            'description' => "<p>L’air est plus lourd ici. Des chaînes rouillées pendent des murs, certaines brisées, d’autres encore attachées à des menottes ou à des anneaux scellés dans la pierre. On devine des armes anciennes, éparpillées au sol, tordues ou fichées dans les murs comme si elles avaient été jetées là avec rage. Tout semble figé dans une attente oppressante.</p>",
            'type' => 'zone',
            'parent' => 'location_donjon_de_l_ame',
            'reference' => 'location_zone_salle_des_chaines',
        ],
    ];
}
