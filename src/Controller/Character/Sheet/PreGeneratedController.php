<?php

namespace App\Controller\Character\Sheet;

use App\Entity\Character\PreGenerated;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PreGeneratedController extends AbstractController
{
    #[Route('/personnage/{slug}', name: 'app_character_sheet_pregenerated')]
    public function index(PreGenerated $character): Response
    {
        return $this->render('character/sheet/pregenerated/index.html.twig', [
            'character' => $character,
            'type' => 'pregenerated',
        ]);
    }
}
