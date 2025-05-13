<?php

namespace App\DataFixtures\Location\CharacterLocation\DonjonDeLAme;

use App\Entity\Character\Npc;

trait SalleDesMurmuresTrait
{
    const SALLE_DES_MURMURES_NPCS = [
        [
            'character' => 'npc_roi_galdric',
            'characterClass' => Npc::class,
            'location' => 'location_zone_salle_des_murmures',
            'conditions' => [
                'quest_status' => [
                    'quest' => 'les-disparus-du-donjon',
                    'status' => 'progress',
                ],
            ],
            'reference' => 'location_zone_salle_des_murmures_roi_galdric',
        ],
    ];
}
