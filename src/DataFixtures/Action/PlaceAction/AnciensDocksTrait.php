<?php

namespace App\DataFixtures\Action\PlaceAction;

use App\Entity\Scene\PlaceScene;

trait AnciensDocksTrait
{
    const RATS_ATTACK = [
        'label' => 'Attaquer les rats',
        'picture' => 'core/creature/rat.png',
        'scene' => 'scene_place_anciens_docks',
        'sceneClass' => PlaceScene::class,
        'targetScene' => 'scene_combat_anciens_docks_rats',
        'targetSceneClass' => CombatScene::class,
        'targetScreen' => 'screen_combat_anciens_docks_rats',
        'targetScreenClass' => CombatScreen::class,
        'reference' => 'action_place_anciens_docks_rats_attack',
    ];
}
