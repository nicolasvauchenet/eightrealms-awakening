<?php

namespace App\Controller\Game\Screen;

use App\Entity\Character\Character;
use App\Service\Character\CharacterService;
use App\Service\Game\Screen\Reload\ReloadScreenService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ReloadScreenController extends AbstractController
{
    #[Route('/recharger/{slug}', name: 'app_game_screen_reload')]
    public function index(ReloadScreenService $reloadScreenService,
                          CharacterService    $characterService,
                          Character           $character): Response
    {
        $screen = $reloadScreenService->getScreen($character, $this->getUser()->getPlayer());
        $playerNpc = $characterService->getPlayerNpc($this->getUser()->getPlayer(), $character);

        return $this->render('game/screen/reload/index.html.twig', [
            'screen' => $screen,
            'playerNpc' => $playerNpc,
        ]);
    }
}
