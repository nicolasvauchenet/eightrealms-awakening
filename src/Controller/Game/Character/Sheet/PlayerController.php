<?php

namespace App\Controller\Game\Character\Sheet;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PlayerController extends AbstractController
{
    #[Route('/mon-personnage/{back?}', name: 'app_game_character_sheet_player')]
    public function index(?string $back = null): Response
    {
        return $this->render('game/character/sheet/player/index.html.twig', [
            'character' => $this->getUser()->getCharacter(),
            'back' => $back,
        ]);
    }
}
