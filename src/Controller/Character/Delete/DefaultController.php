<?php

namespace App\Controller\Character\Delete;

use App\Service\Character\DeleteCharacterService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DefaultController extends AbstractController
{
    #[Route('/supprimer-votre-personnage', name: 'app_character_delete')]
    public function index(DeleteCharacterService $deleteService): Response
    {
        $character = $this->getUser()->getPlayer();
        $deleteService->deleteCharacter($character);

        $this->addFlash('danger', "{$character->getName()} a quitté les Huit Royaumes&nbsp;!");

        return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
    }
}
