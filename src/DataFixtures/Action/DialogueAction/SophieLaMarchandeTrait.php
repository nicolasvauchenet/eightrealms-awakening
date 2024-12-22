<?php

namespace App\DataFixtures\Action\DialogueAction;

use App\Entity\Scene\CinematicScene;
use App\Entity\Scene\DialogueScene;
use App\Entity\Scene\PlaceScene;
use App\Entity\Screen\CinematicScreen;
use App\Entity\Screen\DialogueScreen;
use App\Entity\Screen\PlaceScreen;

trait SophieLaMarchandeTrait
{
    const SOPHIE_LA_MARCHANDE_TRADE = [
        'label' => 'Commercer avec Sophie',
        'picture' => 'core/action/trade.png',
        'scene' => 'scene_dialogue_sophie_la_marchande',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_dialogue_sophie_la_marchande',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_sophie_la_marchande',
        'targetScreenClass' => DialogueScreen::class,
        'reference' => 'action_dialogue_sophie_la_marchande_trade',
    ];

    const SOPHIE_LA_MARCHANDE_HISTORY = [
        'label' => 'Discuter avec Sophie',
        'picture' => 'core/action/history.png',
        'scene' => 'scene_dialogue_sophie_la_marchande',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_dialogue_sophie_la_marchande_history',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_sophie_la_marchande',
        'targetScreenClass' => DialogueScreen::class,
        'actionRequirements' => [
            'reputation' => '0',
        ],
        'actionEffects' => [
            'startQuest' => [
                'quest' => 'les-disparus-du-donjon',
                'step' => 'dans-le-wai',
                'location' => 'port-saint-doux',
            ],
        ],
        'reference' => 'action_dialogue_sophie_la_marchande_history',
    ];

    const SOPHIE_LA_MARCHANDE_HISTORY_RETURN = [
        'label' => 'Sophie La Marchande',
        'picture' => 'chapter1/npc/thumb_sophie-la-marchande.png',
        'scene' => 'scene_dialogue_sophie_la_marchande_history',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_dialogue_sophie_la_marchande',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_sophie_la_marchande',
        'targetScreenClass' => DialogueScreen::class,
        'reference' => 'action_dialogue_sophie_la_marchande_history_return',
    ];

    const SOPHIE_LA_MARCHANDE_HISTORY_EXIT = [
        'label' => 'Revenir sur la place',
        'picture' => 'core/action/exit.png',
        'scene' => 'scene_dialogue_sophie_la_marchande_history',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_place_quartier_du_marche',
        'targetSceneClass' => PlaceScene::class,
        'targetScreen' => 'screen_place_quartier_du_marche',
        'targetScreenClass' => PlaceScreen::class,
        'reference' => 'action_dialogue_sophie_la_marchande_history_exit',
    ];

    const SOPHIE_LA_MARCHANDE_STEAL = [
        'label' => 'Voler Sophie',
        'picture' => 'core/action/steal.png',
        'scene' => 'scene_dialogue_sophie_la_marchande',
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
        'reference' => 'action_dialogue_sophie_la_marchande_steal',
    ];

    const SOPHIE_LA_MARCHANDE_EXIT = [
        'label' => 'Revenir sur la place',
        'picture' => 'core/action/exit.png',
        'scene' => 'scene_dialogue_sophie_la_marchande',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_place_quartier_du_marche',
        'targetSceneClass' => PlaceScene::class,
        'targetScreen' => 'screen_place_quartier_du_marche',
        'targetScreenClass' => PlaceScreen::class,
        'reference' => 'action_dialogue_sophie_la_marchande_exit',
    ];
}
