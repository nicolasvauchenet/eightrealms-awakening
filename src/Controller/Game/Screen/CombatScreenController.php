<?php

namespace App\Controller\Game\Screen;

use App\Entity\Combat\Combat;
use App\Service\Game\Player\UpdatePlayerService;
use App\Service\Game\Screen\Combat\CombatScreenService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CombatScreenController extends AbstractController
{
    #[Route('/combat/{slug}', name: 'app_game_screen_combat')]
    public function index(CombatScreenService $combatScreenService,
                          UpdatePlayerService $updatePlayerService,
                          Combat              $combat): Response
    {
        $screen = $combatScreenService->getScreen($combat, $this->getUser()->getPlayer());
        $updatePlayerService->updatePlayerScreen($this->getUser()->getPlayer(), $screen, null, $combat);

        return $this->render('game/screen/combat/index.html.twig', [
            'screen' => $screen,
        ]);
    }
}
