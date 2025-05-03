<?php

namespace App\Controller\Game\Screen;

use App\Entity\Character\Character;
use App\Service\Character\CharacterService;
use App\Service\Game\Screen\Interaction\InteractionScreenService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class InteractionScreenController extends AbstractController
{
    #[Route('/interaction/{slug}', name: 'app_game_screen_interaction')]
    public function index(InteractionScreenService $interactionScreenService,
                          CharacterService         $characterService,
                          Character                $character): Response
    {
        $screen = $interactionScreenService->getScreen($character, $this->getUser()->getPlayer());
        $playerCharacter = $characterService->getPlayerCharacter($this->getUser()->getPlayer(), $character);

        return $this->render('game/screen/interaction/index.html.twig', [
            'screen' => $screen,
            'playerCharacter' => $playerCharacter,
        ]);
    }
}
