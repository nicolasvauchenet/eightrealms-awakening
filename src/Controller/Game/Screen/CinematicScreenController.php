<?php

namespace App\Controller\Game\Screen;

use App\Entity\Screen\CinematicScreen;
use App\Service\Game\Player\UpdatePlayerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CinematicScreenController extends AbstractController
{
    #[Route('/cinematique/{slug}', name: 'app_game_screen_cinematic')]
    public function index(UpdatePlayerService $updatePlayerService,
                          CinematicScreen     $screen): Response
    {
        $updatePlayerService->updatePlayerScreen($this->getUser()->getPlayer(), $screen);

        return $this->render('game/screen/cinematic/index.html.twig', [
            'screen' => $screen,
        ]);
    }
}
