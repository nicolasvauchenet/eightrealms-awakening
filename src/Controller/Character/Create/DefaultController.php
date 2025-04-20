<?php

namespace App\Controller\Character\Create;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DefaultController extends AbstractController
{
    #[Route('/nouveau-personnage', name: 'app_character_create')]
    public function index(): Response
    {
        if($this->getUser()->getPlayer()) {
            $this->addFlash('info', 'Vous avez déjà un personnage');

            return $this->redirectToRoute('app_home');
        }

        return $this->render('character/create/default/index.html.twig');
    }
}
