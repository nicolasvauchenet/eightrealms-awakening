<?php

namespace App\Controller\Map;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DefaultController extends AbstractController{
    #[Route('/la-carte', name: 'app_map_home')]
    public function index(Request $request): Response
    {
        return $this->render('map/default/index.html.twig', [
            'character' => $this->getUser()->getPlayer(),
            'back' => $request->query->get('back') ?? null,
        ]);
    }
}
