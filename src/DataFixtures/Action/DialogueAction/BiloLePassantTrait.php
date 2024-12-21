<?php

namespace App\DataFixtures\Action\DialogueAction;

use App\Entity\Scene\CinematicScene;
use App\Entity\Scene\DialogueScene;
use App\Entity\Scene\PlaceScene;
use App\Entity\Screen\CinematicScreen;
use App\Entity\Screen\DialogueScreen;
use App\Entity\Screen\PlaceScreen;

trait BiloLePassantTrait
{
    const BILO_LE_PASSANT_HISTORY = [
        'label' => 'Discuter avec Bilo',
        'picture' => 'history.png',
        'scene' => 'scene_dialogue_bilo_le_passant',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_dialogue_bilo_le_passant',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_bilo_le_passant',
        'targetScreenClass' => DialogueScreen::class,
        'reference' => 'action_dialogue_bilo_le_passant_history',
    ];

    const BILO_LE_PASSANT_RUMORS = [
        'label' => 'Écouter les ragots',
        'picture' => 'rumors.png',
        'scene' => 'scene_dialogue_bilo_le_passant',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_dialogue_bilo_le_passant',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_bilo_le_passant',
        'targetScreenClass' => DialogueScreen::class,
        'reference' => 'action_dialogue_bilo_le_passant_rumors',
    ];

    const BILO_LE_PASSANT_STEAL = [
        'label' => 'Voler Bilo',
        'picture' => 'steal.png',
        'scene' => 'scene_dialogue_bilo_le_passant',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_cinematic_jail',
        'targetSceneClass' => CinematicScene::class,
        'targetScreen' => 'screen_cinematic_jail',
        'targetScreenClass' => CinematicScreen::class,
        'reference' => 'action_dialogue_bilo_le_passant_steal',
    ];

    const BILO_LE_PASSANT_ATTACK = [
        'label' => 'Attaquer Bilo',
        'picture' => 'attack.png',
        'scene' => 'scene_dialogue_bilo_le_passant',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_cinematic_jail',
        'targetSceneClass' => CinematicScene::class,
        'targetScreen' => 'screen_cinematic_jail',
        'targetScreenClass' => CinematicScreen::class,
        'reference' => 'action_dialogue_bilo_le_passant_attack',
    ];

    const BILO_LE_PASSANT_EXIT = [
        'label' => 'Revenir sur la place',
        'picture' => 'exit.png',
        'scene' => 'scene_dialogue_bilo_le_passant',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_place_quartier_du_marche',
        'targetSceneClass' => PlaceScene::class,
        'targetScreen' => 'screen_place_quartier_du_marche',
        'targetScreenClass' => PlaceScreen::class,
        'reference' => 'action_dialogue_bilo_le_passant_exit',
    ];
}
