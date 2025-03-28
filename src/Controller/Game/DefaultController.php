<?php

namespace App\Controller\Game;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_game_home')]
    public function index(): Response
    {
        return $this->render('game/default/index.html.twig', [
            'character' => $this->getUser()->getCharacter(),
        ]);
    }
}
