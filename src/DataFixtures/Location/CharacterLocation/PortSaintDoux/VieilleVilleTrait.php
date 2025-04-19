<?php

namespace App\DataFixtures\Location\CharacterLocation\PortSaintDoux;

use App\Entity\Character\Npc;

trait VieilleVilleTrait
{
    const VIEILLE_VILLE_NPCS = [
        [
            'character' => 'npc_grand_pretre_de_port_saint_doux',
            'characterClass' => Npc::class,
            'location' => 'location_building_temple_de_port_saint_doux',
            'reference' => 'location_building_temple_de_port_saint_doux_grand_pretre_de_port_saint_doux',
        ],
        [
            'character' => 'npc_gart_le_forgeron',
            'characterClass' => Npc::class,
            'location' => 'location_building_forge_de_port_saint_doux',
            'reference' => 'location_building_forge_de_port_saint_doux_gart_le_forgeron',
        ],
    ];
}
