<?php

namespace App\Controller\Game\Screen;

use App\Entity\Riddle\RiddleQuestion;
use App\Service\Game\Player\UpdatePlayerService;
use App\Service\Game\Screen\Riddle\RiddleScreenService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class RiddleScreenController extends AbstractController
{
    #[Route('/enigme/{id}', name: 'app_game_screen_riddle')]
    public function index(RiddleScreenService $riddleScreenService,
                          UpdatePlayerService $updatePlayerService,
                          RiddleQuestion      $riddleQuestion): Response
    {
        $screen = $riddleScreenService->getScreen($riddleQuestion, $this->getUser()->getPlayer());
        $updatePlayerService->updatePlayerScreen($this->getUser()->getPlayer(), $screen, null, null, $riddleQuestion->getRiddle());

        return $this->render('game/screen/riddle/index.html.twig', [
            'screen' => $screen,
        ]);
    }
}
