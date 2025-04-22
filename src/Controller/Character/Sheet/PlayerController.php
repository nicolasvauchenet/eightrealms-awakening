<?php

namespace App\Controller\Character\Sheet;

use App\Entity\Character\PreGenerated;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PlayerController extends AbstractController
{
    #[Route('/mon-personnage/{back?}', name: 'app_character_sheet_player')]
    public function index(?string $back = null): Response
    {
        return $this->render('character/sheet/player/index.html.twig', [
            'character' => $this->getUser()->getPlayer(),
            'type' => 'player',
            'back' => $back ?? '',
        ]);
    }
}
