<?php

namespace App\Controller\Game\Map;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DefaultController extends AbstractController
{
    #[Route('/la-carte/{back?}', name: 'app_game_map_home')]
    public function index(?string $back = null): Response
    {
        return $this->render('game/map/default/index.html.twig', [
            'back' => $back,
        ]);
    }
}
