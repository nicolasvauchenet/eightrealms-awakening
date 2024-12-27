<?php

namespace App\Controller\Game;

use App\Entity\Location\Location;
use App\Entity\Location\Place;
use App\Repository\Item\MiscRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MapController extends AbstractController
{
    #[Route('/jeu/carte/{slug}', name: 'app_game_map')]
    public function index(Request        $request,
                          MiscRepository $miscRepository,
                          Location       $location): Response
    {
        return $this->render('game/map/index.html.twig', [
            'location' => $location,
            'previousUrl' => $request->get('previousUrl'),
            'realmMap' => $miscRepository->findOneBy(['slug' => 'royaume-de-lile-du-nord']),
        ]);
    }

    #[Route('/jeu/marcher/{slug}', name: 'app_game_walk')]
    public function walk(EntityManagerInterface $entityManager,
                         Place                  $place): Response
    {
        $character = $this->getUser()->getPlayer();
        $character->setCurrentPlace($place);
        $entityManager->persist($character);
        $entityManager->flush();

        return $this->redirectToRoute('app_game_home');
    }
}
