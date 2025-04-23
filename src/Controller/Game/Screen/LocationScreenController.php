<?php

namespace App\Controller\Game\Screen;

use App\Entity\Location\Location;
use App\Service\Game\Player\UpdatePlayerService;
use App\Service\Game\Screen\Location\LocationScreenService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class LocationScreenController extends AbstractController
{
    #[Route('/lieu/{slug}', name: 'app_game_screen_location')]
    public function index(LocationScreenService $locationScreenService,
                          UpdatePlayerService   $updatePlayerService,
                          Location              $location): Response
    {
        $screen = $locationScreenService->getScreen($location, $this->getUser()->getPlayer());
        $updatePlayerService->updatePlayerScreen($this->getUser()->getPlayer(), $screen, $location);

        return $this->render('game/screen/location/index.html.twig', [
            'screen' => $screen,
        ]);
    }
}
