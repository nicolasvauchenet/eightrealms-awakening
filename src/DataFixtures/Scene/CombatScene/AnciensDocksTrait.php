<?php

namespace App\DataFixtures\Scene\CombatScene;

trait AnciensDocksTrait
{
    const RATS = [
        'name' => 'Gros rats',
        'position' => 1,
        'picture' => 'anciens-docks-rats.webp',
        'description' => "<p>Trois gros rats vous ont repéré et vous attaquent. Vous êtes encerclé. Vous devez vous battre pour vous en sortir.</p>",
        'screen' => 'screen_combat_anciens_docks_rats',
        'questStep' => 'step_deratisation',
        'creatures' => [
            [
                'creature' => 'creature_rat',
                'crownReward' => 5,
                'xpReward' => 10,
            ],
            [
                'creature' => 'creature_rat',
                'xpReward' => 10,
            ],
            [
                'creature' => 'creature_rat',
                'crownReward' => 5,
                'xpReward' => 10,
            ],
        ],
        'reference' => 'scene_combat_anciens_docks_rats',
    ];
}
