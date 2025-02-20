<?php

namespace App\Controller\Game\Character;

use App\Service\FileUploaderService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DeleteController extends AbstractController
{
    #[Route('/supprimer-votre-personnage', name: 'app_game_character_delete')]
    public function index(FileUploaderService    $fileUploaderService,
                          EntityManagerInterface $entityManager): Response
    {
        $character = $this->getUser()->getCharacter();
        $fileUploaderService->remove('character', $character->getPicture());
        $entityManager->remove($character);
        $entityManager->flush();

        $this->addFlash('danger', "{$character->getName()} a quitté les Huit Royaumes&nbsp;!");

        return $this->redirectToRoute('app_front_office_home', [], Response::HTTP_SEE_OTHER);
    }
}
