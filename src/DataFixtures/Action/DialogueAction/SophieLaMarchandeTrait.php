<?php

namespace App\DataFixtures\Action\DialogueAction;

use App\Entity\Scene\DialogueScene;
use App\Entity\Scene\PlaceScene;
use App\Entity\Screen\DialogueScreen;
use App\Entity\Screen\PlaceScreen;

trait SophieLaMarchandeTrait
{
    const SOPHIE_LA_MARCHANDE_TRADE = [
        'label' => 'Commercer avec Sophie',
        'picture' => 'trade.png',
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
        'picture' => 'history.png',
        'scene' => 'scene_dialogue_sophie_la_marchande',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_dialogue_sophie_la_marchande',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_sophie_la_marchande',
        'targetScreenClass' => DialogueScreen::class,
        'reference' => 'action_dialogue_sophie_la_marchande_history',
    ];

    const SOPHIE_LA_MARCHANDE_RUMORS = [
        'label' => 'Écouter les ragots',
        'picture' => 'rumors.png',
        'scene' => 'scene_dialogue_sophie_la_marchande',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_dialogue_sophie_la_marchande',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_sophie_la_marchande',
        'targetScreenClass' => DialogueScreen::class,
        'reference' => 'action_dialogue_sophie_la_marchande_rumors',
    ];

    const SOPHIE_LA_MARCHANDE_EXIT = [
        'label' => 'Revenir sur la place',
        'picture' => 'exit.png',
        'scene' => 'scene_dialogue_sophie_la_marchande',
        'sceneClass' => DialogueScene::class,
        'targetScene' => 'scene_place_quartier_du_marche',
        'targetSceneClass' => PlaceScene::class,
        'targetScreen' => 'screen_place_quartier_du_marche',
        'targetScreenClass' => PlaceScreen::class,
        'reference' => 'action_dialogue_sophie_la_marchande_exit',
    ];
}
