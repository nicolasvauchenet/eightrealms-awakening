<?php

namespace App\DataFixtures\Action\DialogueAction;

use App\Entity\Scene\CinematicScene;
use App\Entity\Scene\DialogueScene;
use App\Entity\Scene\PlaceScene;
use App\Entity\Screen\CinematicScreen;
use App\Entity\Screen\DialogueScreen;
use App\Entity\Screen\PlaceScreen;

trait RobertLeGardeTrait
{
    const ROBERT_LE_GARDE_HISTORY = [
        'label' => 'Discuter avec Robert',
        'picture' => 'history.png',
        'scene' => 'scene_dialogue_robert_le_garde',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_dialogue_robert_le_garde_history_rumors',
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
        'targetScene' => 'scene_dialogue_robert_le_garde_history_rumors',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_robert_le_garde',
        'targetScreenClass' => DialogueScreen::class,
        'reference' => 'action_dialogue_robert_le_garde_rumors',
    ];

    const ROBERT_LE_GARDE_HISTORY_RUMORS_EXIT = [
        'label' => 'Robert Le Garde',
        'picture' => 'exit.png',
        'scene' => 'scene_dialogue_robert_le_garde_history_rumors',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_dialogue_robert_le_garde',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_robert_le_garde',
        'targetScreenClass' => DialogueScreen::class,
        'reference' => 'action_dialogue_robert_le_garde_history_rumors_exit',
    ];

    const ROBERT_LE_GARDE_ATTACK = [
        'label' => 'Insulter Robert',
        'picture' => 'attack.png',
        'scene' => 'scene_dialogue_robert_le_garde_history_rumors',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_cinematic_jail',
        'targetSceneClass' => CinematicScene::class,
        'targetScreen' => 'screen_cinematic_jail',
        'targetScreenClass' => CinematicScreen::class,
        'reference' => 'action_dialogue_robert_le_garde_history_attack',
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
