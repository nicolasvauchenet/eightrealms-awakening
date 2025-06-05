<?php

namespace App\DataFixtures\Location\CharacterLocation\SablesChauds;

use App\Entity\Character\Npc;

trait CampAbandonneTrait
{
    const CAMP_ABANDONNE_NPCS = [
        [
            'character' => 'npc_farouk_le_nomade',
            'characterClass' => Npc::class,
            'location' => 'location_zone_camp_abandonne',
            'conditions' => [
                'quest_started' => 'la-fiole-perdue',
            ],
            'reference' => 'location_zone_camp_abandonne_farouk_le_nomade',
        ],
    ];
}
