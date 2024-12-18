<?php

namespace App\Controller\Character;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/personnage', name: 'app_character_')]
class PreGeneratedController extends AbstractController
{
    #[Route('/nouveau', name: 'pregenerated')]
    public function index(): Response
    {
        return $this->render('character/pregenerated/index.html.twig');
    }
}
