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
                'any' => [
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 4,
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 8,
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'quest_step_status' => [
                            'quest' => 'les-disparus-du-donjon',
                            'quest_step' => 10,
                            'status' => 'progress',
                        ],
                    ],
                    [
                        'has_item' => 'amulette-du-cercle',
                    ],
                ],
            ],
            'reference' => 'location_zone_bosquet_des_druides_grand_druide',
        ],
    ];
}
