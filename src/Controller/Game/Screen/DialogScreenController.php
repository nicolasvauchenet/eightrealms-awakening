<?php

namespace App\Controller\Game\Screen;

use App\Entity\Dialog\DialogStep;
use App\Service\Game\Screen\Dialog\DialogScreenService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DialogScreenController extends AbstractController
{
    #[Route('/dialogue/{id}', name: 'app_game_screen_dialog')]
    public function index(DialogScreenService $dialogScreenService,
                          DialogStep          $dialogStep): Response
    {
        $screen = $dialogScreenService->getScreen($dialogStep, $this->getUser()->getPlayer());

        return $this->render('game/screen/dialog/index.html.twig', [
            'screen' => $screen,
        ]);
    }
}
