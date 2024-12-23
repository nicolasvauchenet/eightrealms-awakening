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
        'picture' => 'core/action/history.png',
        'scene' => 'scene_dialogue_bilo_le_passant',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_dialogue_bilo_le_passant_history',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_bilo_le_passant',
        'targetScreenClass' => DialogueScreen::class,
        'actionEffects' => [
            'startQuest' => [
                'quest' => 'les-disparus-du-donjon',
                'step' => 'dans-le-wai',
                'location' => 'port-saint-doux',
            ],
        ],
        'reference' => 'action_dialogue_bilo_le_passant_history',
    ];

    const BILO_LE_PASSANT_HISTORY_RETURN = [
        'label' => 'Bilo Le Passant',
        'picture' => 'chapter1/npc/thumb_bilo-le-passant.png',
        'scene' => 'scene_dialogue_bilo_le_passant_history',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_dialogue_bilo_le_passant',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_bilo_le_passant',
        'targetScreenClass' => DialogueScreen::class,
        'reference' => 'action_dialogue_bilo_le_passant_history_return',
    ];

    const BILO_LE_PASSANT_HISTORY_EXIT = [
        'label' => 'Revenir sur la place',
        'picture' => 'core/action/exit.png',
        'scene' => 'scene_dialogue_bilo_le_passant_history',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_place_quartier_du_marche',
        'targetSceneClass' => PlaceScene::class,
        'targetScreen' => 'screen_place_quartier_du_marche',
        'targetScreenClass' => PlaceScreen::class,
        'reference' => 'action_dialogue_bilo_le_passant_history_exit',
    ];

    const BILO_LE_PASSANT_RUMORS = [
        'label' => 'Écouter les ragots',
        'picture' => 'core/action/rumors.png',
        'scene' => 'scene_dialogue_bilo_le_passant',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_dialogue_bilo_le_passant_rumors',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_bilo_le_passant',
        'targetScreenClass' => DialogueScreen::class,
        'actionRequirements' => [
            'hasNoQuest' => 'des-rats-sur-les-docks',
        ],
        'reference' => 'action_dialogue_bilo_le_passant_rumors',
    ];

    const BILO_LE_PASSANT_RUMORS_2 = [
        'label' => 'Où se trouve cet endroit ?',
        'scene' => 'scene_dialogue_bilo_le_passant_rumors',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_dialogue_bilo_le_passant_rumors_2',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_bilo_le_passant',
        'targetScreenClass' => DialogueScreen::class,
        'actionEffects' => [
            'addPlace' => 'anciens-docks',
        ],
        'reference' => 'action_dialogue_bilo_le_passant_rumors_2',
    ];

    const BILO_LE_PASSANT_RUMORS_2_ACCEPT = [
        'label' => 'Je vais aller voir ça',
        'scene' => 'scene_dialogue_bilo_le_passant_rumors_2',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_dialogue_bilo_le_passant_rumors_2_accept',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_bilo_le_passant',
        'targetScreenClass' => DialogueScreen::class,
        'actionEffects' => [
            'startQuest' => [
                'quest' => 'des-rats-sur-les-docks',
                'step' => 'deratisation',
                'location' => 'port-saint-doux',
            ],
            'increaseLocationReputation' => [
                'amount' => '1',
                'location' => 'port-saint-doux',
            ],
        ],
        'reference' => 'action_dialogue_bilo_le_passant_rumors_2_accept',
    ];

    const BILO_LE_PASSANT_RUMORS_2_ACCEPT_RETURN = [
        'label' => 'Bilo Le Passant',
        'picture' => 'chapter1/npc/thumb_bilo-le-passant.png',
        'scene' => 'scene_dialogue_bilo_le_passant_rumors_2_accept',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_dialogue_bilo_le_passant',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_bilo_le_passant',
        'targetScreenClass' => DialogueScreen::class,
        'reference' => 'action_dialogue_bilo_le_passant_rumors_2_accept_return',
    ];

    const BILO_LE_PASSANT_RUMORS_2_ACCEPT_EXIT = [
        'label' => 'Revenir sur la place',
        'picture' => 'core/action/exit.png',
        'scene' => 'scene_dialogue_bilo_le_passant_rumors_2_accept',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_place_quartier_du_marche',
        'targetSceneClass' => PlaceScene::class,
        'targetScreen' => 'screen_place_quartier_du_marche',
        'targetScreenClass' => PlaceScreen::class,
        'reference' => 'action_dialogue_bilo_le_passant_rumors_2_accept_exit',
    ];

    const BILO_LE_PASSANT_RUMORS_2_DECLINE = [
        'label' => "Ça ne m'intéresse pas",
        'scene' => 'scene_dialogue_bilo_le_passant_rumors_2',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_dialogue_bilo_le_passant_rumors_2_decline',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_bilo_le_passant',
        'targetScreenClass' => DialogueScreen::class,
        'reference' => 'action_dialogue_bilo_le_passant_rumors_2_decline',
    ];

    const BILO_LE_PASSANT_RUMORS_2_DECLINE_RETURN = [
        'label' => 'Bilo Le Passant',
        'picture' => 'chapter1/npc/thumb_bilo-le-passant.png',
        'scene' => 'scene_dialogue_bilo_le_passant_rumors_2_decline',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_dialogue_bilo_le_passant',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_bilo_le_passant',
        'targetScreenClass' => DialogueScreen::class,
        'reference' => 'action_dialogue_bilo_le_passant_rumors_2_decline_return',
    ];

    const BILO_LE_PASSANT_RUMORS_2_DECLINE_EXIT = [
        'label' => 'Revenir sur la place',
        'picture' => 'core/action/exit.png',
        'scene' => 'scene_dialogue_bilo_le_passant_rumors_2_decline',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_place_quartier_du_marche',
        'targetSceneClass' => PlaceScene::class,
        'targetScreen' => 'screen_place_quartier_du_marche',
        'targetScreenClass' => PlaceScreen::class,
        'reference' => 'action_dialogue_bilo_le_passant_rumors_2_decline_exit',
    ];

    const BILO_LE_PASSANT_RUMORS_RETURN = [
        'label' => 'Bilo Le Passant',
        'picture' => 'chapter1/npc/thumb_bilo-le-passant.png',
        'scene' => 'scene_dialogue_bilo_le_passant_rumors',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_dialogue_bilo_le_passant',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_bilo_le_passant',
        'targetScreenClass' => DialogueScreen::class,
        'reference' => 'action_dialogue_bilo_le_passant_rumors_return',
    ];

    const BILO_LE_PASSANT_RUMORS_EXIT = [
        'label' => 'Revenir sur la place',
        'picture' => 'core/action/exit.png',
        'scene' => 'scene_dialogue_bilo_le_passant_rumors',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_place_quartier_du_marche',
        'targetSceneClass' => PlaceScene::class,
        'targetScreen' => 'screen_place_quartier_du_marche',
        'targetScreenClass' => PlaceScreen::class,
        'reference' => 'action_dialogue_bilo_le_passant_rumors_exit',
    ];

    const BILO_LE_PASSANT_STEAL = [
        'label' => 'Voler Bilo',
        'picture' => 'core/action/steal.png',
        'scene' => 'scene_dialogue_bilo_le_passant',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_cinematic_jail',
        'targetSceneClass' => CinematicScene::class,
        'targetScreen' => 'screen_cinematic_jail',
        'targetScreenClass' => CinematicScreen::class,
        'actionEffects' => [
            'decreaseFortune' => [
                'amount' => '50',
            ],
            'decreaseLocationReputation' => [
                'amount' => '10',
                'location' => 'port-saint-doux',
            ],
        ],
        'reference' => 'action_dialogue_bilo_le_passant_steal',
    ];

    const BILO_LE_PASSANT_EXIT = [
        'label' => 'Revenir sur la place',
        'picture' => 'core/action/exit.png',
        'scene' => 'scene_dialogue_bilo_le_passant',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_place_quartier_du_marche',
        'targetSceneClass' => PlaceScene::class,
        'targetScreen' => 'screen_place_quartier_du_marche',
        'targetScreenClass' => PlaceScreen::class,
        'reference' => 'action_dialogue_bilo_le_passant_exit',
    ];
}
