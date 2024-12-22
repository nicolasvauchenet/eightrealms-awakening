<?php

namespace App\DataFixtures\Action\PlaceAction;

use App\Entity\Scene\DialogueScene;
use App\Entity\Scene\PlaceScene;
use App\Entity\Screen\DialogueScreen;

trait QuartierDuMarcheTrait
{
    const SOPHIE_LA_MARCHANDE = [
        'label' => 'Parler à Sophie La Marchande',
        'picture' => 'chapter1/npc/thumb_sophie-la-marchande.png',
        'scene' => 'scene_place_quartier_du_marche',
        'sceneClass' => PlaceScene::class,
        'targetScene' => 'scene_dialogue_sophie_la_marchande',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_sophie_la_marchande',
        'targetScreenClass' => DialogueScreen::class,
        'reference' => 'action_place_quartier_du_marche_sophie_la_marchande',
    ];

    const ROBERT_LE_GARDE = [
        'label' => 'Parler à Robert Le Garde',
        'picture' => 'chapter1/npc/thumb_robert-le-garde.png',
        'scene' => 'scene_place_quartier_du_marche',
        'sceneClass' => PlaceScene::class,
        'targetScene' => 'scene_dialogue_robert_le_garde',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_robert_le_garde',
        'targetScreenClass' => DialogueScreen::class,
        'reference' => 'action_place_quartier_du_marche_robert_le_garde',
    ];

    const BILO_LE_PASSANT = [
        'label' => 'Parler à Bilo Le Passant',
        'picture' => 'chapter1/npc/thumb_bilo-le-passant.png',
        'scene' => 'scene_place_quartier_du_marche',
        'sceneClass' => PlaceScene::class,
        'targetScene' => 'scene_dialogue_bilo_le_passant',
        'targetSceneClass' => DialogueScene::class,
        'targetScreen' => 'screen_dialogue_bilo_le_passant',
        'targetScreenClass' => DialogueScreen::class,
        'reference' => 'action_place_quartier_du_marche_bilo_le_passant',
    ];
}
