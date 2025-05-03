<?php

namespace App\Controller\Character\Level;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\RouterInterface;

final class DefaultController extends AbstractController
{
    #[Route('/mon-personnage/niveau-superieur', name: 'app_game_character_level_home')]
    public function index(Request $request, RouterInterface $router): Response
    {
        return $this->render('character/sheet/level/index.html.twig', [
            'back' => $request->query->get('back') ?? $router->generate('app_home'),
        ]);
    }
}
