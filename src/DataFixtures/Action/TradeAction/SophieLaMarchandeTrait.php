<?php

namespace App\DataFixtures\Action\TradeAction;

use App\Entity\Scene\DialogueScene;
use App\Entity\Scene\PlaceScene;
use App\Entity\Scene\TradeScene;
use App\Entity\Screen\DialogueScreen;
use App\Entity\Screen\PlaceScreen;

trait SophieLaMarchandeTrait
{
    const SOPHIE_LA_MARCHANDE_RETURN = [
        'label' => 'Sophie La Marchande',
        'picture' => 'chapter1/npc/thumb_sophie-la-marchande.png',
        'scene' => 'scene_trade_sophie_la_marchande',
        'sceneClass' => TradeScene::class,
        'targetScene' => 'scene_dialogue_sophie_la_marchande',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_sophie_la_marchande',
        'targetScreenClass' => DialogueScreen::class,
        'reference' => 'action_trade_sophie_la_marchande_return',
    ];

    const SOPHIE_LA_MARCHANDE_EXIT = [
        'label' => 'Revenir sur la place',
        'picture' => 'core/action/exit.png',
        'scene' => 'scene_trade_sophie_la_marchande',
        'sceneClass' => TradeScene::class,
        'targetScene' => 'scene_place_quartier_du_marche',
        'targetSceneClass' => PlaceScene::class,
        'targetScreen' => 'screen_place_quartier_du_marche',
        'targetScreenClass' => PlaceScreen::class,
        'reference' => 'action_trade_sophie_la_marchande_exit',
    ];
}
