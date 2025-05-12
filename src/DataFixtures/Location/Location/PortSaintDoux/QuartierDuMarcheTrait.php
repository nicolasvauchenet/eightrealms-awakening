<?php

namespace App\DataFixtures\Location\Location\PortSaintDoux;

trait QuartierDuMarcheTrait
{
    const QUARTIER_DU_MARCHE_LOCATIONS = [
        [
            'name' => 'Quartier du Marché',
            'picture' => 'img/chapter1/location/quartier-du-marche.webp',
            'description' => "<p>Au cœur de Port Saint-Doux, le Quartier du Marché bourdonne d’activité. Les étals en bois, parfois bancals, débordent de marchandises variées. Les marchands crient leurs offres dans une cacophonie bon enfant, tandis que des gamins courent entre les jambes des passants, sous l'œil attentif des gardes de la ville.</p><p>Un parfum de sel marin flotte dans l’air, mélangé à celui, plus suspect, des poissons oubliés sous le soleil. Les habitants, vêtus de tuniques simples mais pratiques, se croisent en échangeant nouvelles et rumeurs.</p><p>À proximité de vous se trouvent une marchande, un garde et un étrange petit homme qui vous regarde avec insistance…</p>",
            'type' => 'zone',
            'parent' => 'location_port_saint_doux',
            'reference' => 'location_zone_quartier_du_marche',
        ],
    ];
}
