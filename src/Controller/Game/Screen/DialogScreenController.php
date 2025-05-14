<?php

namespace App\Controller\Game\Screen;

use App\Entity\Dialog\DialogStep;
use App\Service\Character\CharacterService;
use App\Service\Game\Screen\Dialog\DialogScreenService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DialogScreenController extends AbstractController
{
    #[Route('/dialogue/{slug}', name: 'app_game_screen_dialog')]
    public function index(DialogScreenService $dialogScreenService,
                          CharacterService    $characterService,
                          DialogStep          $dialogStep): Response
    {
        $screen = $dialogScreenService->getScreen($dialogStep, $this->getUser()->getPlayer());
        $playerCharacter = $characterService->getPlayerCharacter($this->getUser()->getPlayer(), $screen->getDialogStep()->getDialog()->getCharacter());

        return $this->render('game/screen/dialog/index.html.twig', [
            'screen' => $screen,
            'playerCharacter' => $playerCharacter,
        ]);
    }
}
