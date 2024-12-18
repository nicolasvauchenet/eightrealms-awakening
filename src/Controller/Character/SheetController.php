<?php

namespace App\Controller\Character;

use App\Entity\Character\Character;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/personnage', name: 'app_character_')]
class SheetController extends AbstractController
{
    #[Route('/feuille/{slug}', name: 'sheet')]
    public function index(Request   $request,
                          Character $character): Response
    {
        return $this->render('character/sheet/index.html.twig', [
            'character' => $character,
            'previousUrl' => $request->get('previousUrl')]);
    }
}
