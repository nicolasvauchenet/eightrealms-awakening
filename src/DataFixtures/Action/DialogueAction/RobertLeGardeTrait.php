<?php

namespace App\DataFixtures\Action\DialogueAction;

use App\Entity\Scene\DialogueScene;
use App\Entity\Scene\PlaceScene;
use App\Entity\Screen\DialogueScreen;
use App\Entity\Screen\PlaceScreen;

trait RobertLeGardeTrait
{
    const ROBERT_LE_GARDE_HISTORY = [
        'label' => 'Discuter avec Robert',
        'picture' => 'history.png',
        'scene' => 'scene_dialogue_robert_le_garde',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_dialogue_robert_le_garde',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_robert_le_garde',
        'targetScreenClass' => DialogueScreen::class,
        'reference' => 'action_dialogue_robert_le_garde_history',
    ];

    const ROBERT_LE_GARDE_RUMORS = [
        'label' => 'Écouter les ragots',
        'picture' => 'rumors.png',
        'scene' => 'scene_dialogue_robert_le_garde',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_dialogue_robert_le_garde',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_robert_le_garde',
        'targetScreenClass' => DialogueScreen::class,
        'reference' => 'action_dialogue_robert_le_garde_rumors',
    ];

    const ROBERT_LE_GARDE_EXIT = [
        'label' => 'Revenir sur la place',
        'picture' => 'exit.png',
        'scene' => 'scene_dialogue_robert_le_garde',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_place_quartier_du_marche',
        'targetSceneClass' => PlaceScene::class,
        'targetScreen' => 'screen_place_quartier_du_marche',
        'targetScreenClass' => PlaceScreen::class,
        'reference' => 'action_dialogue_robert_le_garde_exit',
    ];
}
