<?php

namespace App\Controller\Game;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DeleteController extends AbstractController
{
    #[Route('/supprimer-votre-aventure', name: 'app_game_delete')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $character = $this->getUser()->getCharacter();

        $character->setLocation(null);

        foreach($character->getPlayerLocations() as $playerLocation) {
            $entityManager->remove($playerLocation);
        }

        foreach($character->getPlayerNpcs() as $playerNpc) {
            $entityManager->remove($playerNpc);
        }

        foreach($character->getPlayerCreatures() as $playerCreature) {
            $entityManager->remove($playerCreature);
        }

        foreach($character->getPlayerQuests() as $playerQuest) {
            $entityManager->remove($playerQuest);
        }

        $entityManager->flush();

        $this->addFlash('success', "L'aventure recommence pour {$character->getName()}&nbsp;!");

        return $this->redirectToRoute('app_front_office_home', [], Response::HTTP_SEE_OTHER);
    }
}
