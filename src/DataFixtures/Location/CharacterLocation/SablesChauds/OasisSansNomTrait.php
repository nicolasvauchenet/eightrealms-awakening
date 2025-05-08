<?php

namespace App\DataFixtures\Location\CharacterLocation\SablesChauds;

use App\Entity\Character\Npc;

trait OasisSansNomTrait
{
    const OASIS_SANS_NOM_NPCS = [
        [
            'character' => 'npc_faux_djinn',
            'characterClass' => Npc::class,
            'location' => 'location_zone_oasis_sans_nom',
            'conditions' => [
                'quest_step_status' => [
                    'quest' => 'la-fiole-perdue',
                    'quest_step' => 2,
                    'status' => 'progress',
                ],
            ],
            'reference' => 'location_zone_oasis_sans_nom_npc_faux_djinn',
        ],
    ];
}
