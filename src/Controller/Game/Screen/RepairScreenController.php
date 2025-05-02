<?php

namespace App\Controller\Game\Screen;

use App\Entity\Character\Character;
use App\Service\Character\CharacterService;
use App\Service\Game\Screen\Repair\RepairScreenService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class RepairScreenController extends AbstractController
{
    #[Route('/reparer/{slug}', name: 'app_game_screen_repair')]
    public function index(RepairScreenService $repairScreenService,
                          CharacterService    $characterService,
                          Character           $character): Response
    {
        $screen = $repairScreenService->getScreen($character, $this->getUser()->getPlayer());
        $playerNpc = $characterService->getPlayerNpc($this->getUser()->getPlayer(), $character);

        return $this->render('game/screen/repair/index.html.twig', [
            'screen' => $screen,
            'playerNpc' => $playerNpc,
        ]);
    }
}
