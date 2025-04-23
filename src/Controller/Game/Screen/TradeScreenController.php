<?php

namespace App\Controller\Game\Screen;

use App\Entity\Character\Character;
use App\Service\Game\Screen\Trade\TradeScreenService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TradeScreenController extends AbstractController
{
    #[Route('/commerce/{slug}', name: 'app_game_screen_trade')]
    public function index(TradeScreenService $tradeScreenService,
                          Character          $character): Response
    {
        $screen = $tradeScreenService->getScreen($character, $this->getUser()->getPlayer());

        return $this->render('game/screen/trade/index.html.twig', [
            'screen' => $screen,
        ]);
    }
}
