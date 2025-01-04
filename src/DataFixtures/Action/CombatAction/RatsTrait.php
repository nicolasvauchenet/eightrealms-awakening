<?php

namespace App\DataFixtures\Action\CombatAction;

use App\Entity\Scene\CombatScene;
use App\Entity\Scene\PlaceScene;
use App\Entity\Screen\CombatScreen;

trait RatsTrait
{
    const ANCIENS_DOCKS_RATS_COMBAT = [
        'label' => 'Combattre les rats',
        'picture' => 'core/creature/rat.png',
        'scene' => 'scene_place_anciens_docks',
        'sceneClass' => PlaceScene::class,
        'targetScene' => 'scene_combat_anciens_docks_rats',
        'targetSceneClass' => CombatScene::class,
        'targetScreen' => 'screen_combat_anciens_docks_rats',
        'targetScreenClass' => CombatScreen::class,
        'actionEffects' => [

        ],
        'reference' => 'action_combat_anciens_docks_rats_combat',
    ];

    const ANCIENS_DOCKS_RATS_FLEE = [
        'label' => 'Fuir le combat',
        'picture' => 'core/action/flee.png',
        'scene' => 'scene_combat_anciens_docks_rats',
        'sceneClass' => CombatScene::class,
        'targetScene' => 'scene_combat_anciens_docks_rats',
        'targetSceneClass' => CombatScene::class,
        'targetScreen' => 'screen_combat_anciens_docks_rats',
        'targetScreenClass' => CombatScreen::class,
        'actionEffects' => [
            'decreaseHealth' => [
                'amount' => '5',
            ],
            'updateDescription' => 'Vous ne pouvez pas fuir le combat ! Vous devez combattre les rats pour vous en sortir. Vous avez perdu 5 points de vie.',
        ],
        'reference' => 'action_combat_anciens_docks_rats_flee',
    ];
}
