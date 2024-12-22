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
        'picture' => 'core/action/history.png',
        'scene' => 'scene_dialogue_robert_le_garde',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_dialogue_robert_le_garde_history',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_robert_le_garde',
        'targetScreenClass' => DialogueScreen::class,
        'reference' => 'action_dialogue_robert_le_garde_history',
    ];

    const ROBERT_LE_GARDE_HISTORY_RETURN = [
        'label' => 'Robert Le Garde',
        'picture' => 'chapter1/npc/thumb_robert-le-garde.png',
        'scene' => 'scene_dialogue_robert_le_garde_history',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_dialogue_robert_le_garde',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_robert_le_garde',
        'targetScreenClass' => DialogueScreen::class,
        'reference' => 'action_dialogue_robert_le_garde_history_return',
    ];

    const ROBERT_LE_GARDE_HISTORY_EXIT = [
        'label' => 'Revenir sur la place',
        'picture' => 'core/action/exit.png',
        'scene' => 'scene_dialogue_robert_le_garde_history',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_place_quartier_du_marche',
        'targetSceneClass' => PlaceScene::class,
        'targetScreen' => 'screen_place_quartier_du_marche',
        'targetScreenClass' => PlaceScreen::class,
        'reference' => 'action_dialogue_robert_le_garde_history_exit',
    ];

    const ROBERT_LE_GARDE_RUMORS = [
        'label' => 'Écouter les ragots',
        'picture' => 'core/action/rumors.png',
        'scene' => 'scene_dialogue_robert_le_garde',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_dialogue_robert_le_garde_rumors',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_robert_le_garde',
        'targetScreenClass' => DialogueScreen::class,
        'reference' => 'action_dialogue_robert_le_garde_rumors',
    ];

    const ROBERT_LE_GARDE_RUMORS_2 = [
        'label' => 'Où se trouve cet endroit ?',
        'scene' => 'scene_dialogue_robert_le_garde_rumors',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_dialogue_robert_le_garde_rumors_2',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_robert_le_garde',
        'targetScreenClass' => DialogueScreen::class,
        'actionEffects' => [
            'addPlace' => 'docks-de-louest',
        ],
        'reference' => 'action_dialogue_robert_le_garde_rumors_2',
    ];

    const ROBERT_LE_GARDE_RUMORS_2_ACCEPT = [
        'label' => 'Je vais aller voir ça',
        'scene' => 'scene_dialogue_robert_le_garde_rumors_2',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_dialogue_robert_le_garde_rumors_2_accept',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_robert_le_garde',
        'targetScreenClass' => DialogueScreen::class,
        'reference' => 'action_dialogue_robert_le_garde_rumors_2_accept',
    ];

    const ROBERT_LE_GARDE_RUMORS_2_ACCEPT_RETURN = [
        'label' => 'Robert Le Garde',
        'picture' => 'chapter1/npc/thumb_robert-le-garde.png',
        'scene' => 'scene_dialogue_robert_le_garde_rumors_2_accept',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_dialogue_robert_le_garde',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_robert_le_garde',
        'targetScreenClass' => DialogueScreen::class,
        'reference' => 'action_dialogue_robert_le_garde_rumors_2_accept_return',
    ];

    const ROBERT_LE_GARDE_RUMORS_2_ACCEPT_EXIT = [
        'label' => 'Revenir sur la place',
        'picture' => 'core/action/exit.png',
        'scene' => 'scene_dialogue_robert_le_garde_rumors_2_accept',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_place_quartier_du_marche',
        'targetSceneClass' => PlaceScene::class,
        'targetScreen' => 'screen_place_quartier_du_marche',
        'targetScreenClass' => PlaceScreen::class,
        'reference' => 'action_dialogue_robert_le_garde_rumors_2_accept_exit',
    ];

    const ROBERT_LE_GARDE_RUMORS_2_DECLINE = [
        'label' => "Ça ne m'intéresse pas",
        'scene' => 'scene_dialogue_robert_le_garde_rumors_2',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_dialogue_robert_le_garde_rumors_2_decline',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_robert_le_garde',
        'targetScreenClass' => DialogueScreen::class,
        'reference' => 'action_dialogue_robert_le_garde_rumors_2_decline',
    ];

    const ROBERT_LE_GARDE_RUMORS_2_DECLINE_RETURN = [
        'label' => 'Robert Le Garde',
        'picture' => 'chapter1/npc/thumb_robert-le-garde.png',
        'scene' => 'scene_dialogue_robert_le_garde_rumors_2_decline',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_dialogue_robert_le_garde',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_robert_le_garde',
        'targetScreenClass' => DialogueScreen::class,
        'reference' => 'action_dialogue_robert_le_garde_rumors_2_decline_return',
    ];

    const ROBERT_LE_GARDE_RUMORS_2_DECLINE_EXIT = [
        'label' => 'Revenir sur la place',
        'picture' => 'core/action/exit.png',
        'scene' => 'scene_dialogue_robert_le_garde_rumors_2_decline',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_place_quartier_du_marche',
        'targetSceneClass' => PlaceScene::class,
        'targetScreen' => 'screen_place_quartier_du_marche',
        'targetScreenClass' => PlaceScreen::class,
        'reference' => 'action_dialogue_robert_le_garde_rumors_2_decline_exit',
    ];

    const ROBERT_LE_GARDE_RUMORS_RETURN = [
        'label' => 'Robert Le Garde',
        'picture' => 'chapter1/npc/thumb_robert-le-garde.png',
        'scene' => 'scene_dialogue_robert_le_garde_rumors',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_dialogue_robert_le_garde',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_robert_le_garde',
        'targetScreenClass' => DialogueScreen::class,
        'reference' => 'action_dialogue_robert_le_garde_rumors_return',
    ];

    const ROBERT_LE_GARDE_RUMORS_EXIT = [
        'label' => 'Revenir sur la place',
        'picture' => 'core/action/exit.png',
        'scene' => 'scene_dialogue_robert_le_garde_rumors',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_place_quartier_du_marche',
        'targetSceneClass' => PlaceScene::class,
        'targetScreen' => 'screen_place_quartier_du_marche',
        'targetScreenClass' => PlaceScreen::class,
        'reference' => 'action_dialogue_robert_le_garde_rumors_exit',
    ];

    const ROBERT_LE_GARDE_ATTACK = [
        'label' => 'Insulter Robert',
        'picture' => 'core/action/angry.png',
        'scene' => 'scene_dialogue_robert_le_garde_history',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_cinematic_jail',
        'targetSceneClass' => CinematicScene::class,
        'targetScreen' => 'screen_cinematic_jail',
        'targetScreenClass' => CinematicScreen::class,
        'actionEffects' => [
            'decreaseFortune' => '50',
        ],
        'reference' => 'action_dialogue_robert_le_garde_history_attack',
    ];

    const ROBERT_LE_GARDE_EXIT = [
        'label' => 'Revenir sur la place',
        'picture' => 'core/action/exit.png',
        'scene' => 'scene_dialogue_robert_le_garde',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_place_quartier_du_marche',
        'targetSceneClass' => PlaceScene::class,
        'targetScreen' => 'screen_place_quartier_du_marche',
        'targetScreenClass' => PlaceScreen::class,
        'reference' => 'action_dialogue_robert_le_garde_exit',
    ];
}
