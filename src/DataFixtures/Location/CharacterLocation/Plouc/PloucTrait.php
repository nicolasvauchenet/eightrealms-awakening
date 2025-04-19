<?php

namespace App\DataFixtures\Location\CharacterLocation\Plouc;

use App\Entity\Character\Npc;

trait PloucTrait
{
    const PLOUC_NPCS = [
        [
            'character' => 'npc_gerard_le_pecheur',
            'characterClass' => Npc::class,
            'location' => 'location_building_maison_de_gerard_le_pecheur',
            'reference' => 'location_building_maison_de_gerard_le_pecheur_gerard_le_pecheur',
        ],
    ];
}
