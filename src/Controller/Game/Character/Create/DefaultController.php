<?php

namespace App\Controller\Game\Character\Create;

use App\Repository\Character\PreGeneratedRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DefaultController extends AbstractController
{
    #[Route('/nouveau-personnage', name: 'app_game_character_create_home')]
    public function index(PreGeneratedRepository $preGeneratedRepository): Response
    {
        if($this->getUser()->getCharacter()) {
            return $this->redirectToRoute('app_front_office_home');
        }

        return $this->render('game/character/create/default/index.html.twig', [
            'characters' => $preGeneratedRepository->findAll(),
        ]);
    }
}
