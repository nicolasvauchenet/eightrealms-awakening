<?php

namespace App\Controller\Game;

use App\Entity\Screen\CinematicScreen;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DefaultController extends AbstractController
{
    #[Route('/aventure', name: 'app_game_home')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $currentScreen = $this->getUser()->getPlayer()->getCurrentScreen();
        if(!$currentScreen) {
            $currentScreen = $entityManager->getRepository(CinematicScreen::class)->find(1);
        }

        return $this->redirectToRoute('app_game_screen_' . $currentScreen->getType(), [
            'slug' => $currentScreen->getSlug(),
        ]);
    }
}
