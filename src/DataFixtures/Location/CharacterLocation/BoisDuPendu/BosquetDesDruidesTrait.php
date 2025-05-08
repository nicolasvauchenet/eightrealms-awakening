<?php

namespace App\DataFixtures\Location\CharacterLocation\BoisDuPendu;

use App\Entity\Character\Npc;

trait BosquetDesDruidesTrait
{
    const BOSQUET_DES_DRUIDES_NPCS = [
        [
            'character' => 'npc_grand_druide',
            'characterClass' => Npc::class,
            'location' => 'location_zone_bosquet_des_druides',
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'les-disparus-du-donjon',
                    'quest_step' => 2,
                    'status' => 'progress',
                ],
            ],
            'reference' => 'location_zone_bosquet_des_druides_grand_druide',
        ],
    ];
}
