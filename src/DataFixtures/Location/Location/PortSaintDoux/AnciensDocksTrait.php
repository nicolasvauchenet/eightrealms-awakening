<?php

namespace App\DataFixtures\Location\Location\PortSaintDoux;

trait AnciensDocksTrait
{
    const ANCIENS_DOCKS_LOCATIONS = [
        [
            'name' => 'Anciens Docks',
            'picture' => 'img/chapter1/location/anciens-docks.webp',
            'description' => "<p>Les anciens docks sont quasiment abandonnés. Les rats y ont élu domicile et se faufilent entre les planches de bois à la recherche de nourriture. Les marchands ont déserté les lieux, laissant derrière eux des caisses vides et des tonneaux éventrés. Les gardes, eux, n'ont pas l'habitude de s'aventurer dans ce quartier mal famé. Les passants évitent soigneusement de s'y aventurer, préférant emprunter les ruelles plus sûres de la ville.</p>",
            'type' => 'zone',
            'parent' => 'location_port_saint_doux',
            'reference' => 'location_zone_anciens_docks',
        ],
    ];
}
