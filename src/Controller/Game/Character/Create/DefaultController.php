<?php

namespace App\Controller\Game\Character\Create;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DefaultController extends AbstractController{
    #[Route('/nouveau-personnage', name: 'app_game_character_create_home')]
    public function index(): Response
    {
        return $this->render('game/character/create/default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
}
