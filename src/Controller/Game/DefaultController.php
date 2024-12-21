<?php

namespace App\Controller\Game;

use App\Repository\Scene\SceneRepository;
use App\Repository\Screen\ScreenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{
    #[Route('/jeu', name: 'app_game_home')]
    public function index(ScreenRepository $screenRepository,
                          SceneRepository  $sceneRepository): Response
    {
        $character = $this->getUser()->getPlayer();
        if($character->getCurrentPlace()) {
            $currentScene = $character->getCurrentPlace()->getPlaceScenes()->first();
            $currentScreen = $currentScene->getScreen();
        } else {
            $currentScreen = $screenRepository->find(1);
            $currentScene = $sceneRepository->find(1);
        }

        return $this->render('game/default/index.html.twig', [
            'currentScreen' => $currentScreen,
            'currentScene' => $currentScene,
        ]);
    }
}
