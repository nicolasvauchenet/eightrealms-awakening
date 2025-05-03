<?php

namespace App\Controller\Character\Level;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DefaultController extends AbstractController
{
    #[Route('/mon-personnage/niveau-superieur', name: 'app_game_character_level_home')]
    public function index(): Response
    {
        return $this->render('character/sheet/level/index.html.twig');
    }
}
