<?php

namespace App\DataFixtures\Location\CharacterLocation\PortSaintDoux;

use App\Entity\Character\Npc;

trait QuartierDesChauvesTrait
{
    const QUARTIER_DES_CHAUVES_NPCS = [
        [
            'character' => 'npc_garde_du_quartier_des_chauves',
            'characterClass' => Npc::class,
            'location' => 'location_zone_quartier_des_chauves',
            'reference' => 'location_zone_quartier_des_chauves_garde_du_quartier_des_chauves',
        ],
        [
            'character' => 'npc_servante_du_palais',
            'characterClass' => Npc::class,
            'location' => 'location_building_palais_royal',
            'reference' => 'location_building_palais_royal_servante_du_palais',
        ],
        [
            'character' => 'npc_garde_du_palais',
            'characterClass' => Npc::class,
            'location' => 'location_building_palais_royal',
            'reference' => 'location_building_palais_royal_garde_du_palais',
        ],
        [
            'character' => 'npc_maire_de_port_saint_doux',
            'characterClass' => Npc::class,
            'location' => 'location_building_hotel_de_ville',
            'reference' => 'location_building_hotel_de_ville_maire_de_port_saint_doux',
        ],
    ];
}
