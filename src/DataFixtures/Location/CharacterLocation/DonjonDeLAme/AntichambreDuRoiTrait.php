<?php

namespace App\DataFixtures\Location\CharacterLocation\DonjonDeLAme;

use App\Entity\Character\Npc;

trait AntichambreDuRoiTrait
{
    const ANTICHAMBRE_DU_ROI_NPCS = [
        [
            'character' => 'npc_prince_alaric',
            'characterClass' => Npc::class,
            'location' => 'location_zone_antichambre_du_roi',
            'conditions' => [
                'quest_status' => [
                    'quest' => 'les-disparus-du-donjon',
                    'status' => 'progress',
                ],
            ],
            'reference' => 'location_zone_antichambre_du_roi_prince_alaric',
        ],
    ];
}
