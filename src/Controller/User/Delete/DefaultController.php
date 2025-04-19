<?php

namespace App\Controller\User\Delete;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

final class DefaultController extends AbstractController
{
    #[Route('/supprimer-votre-compte', name: 'app_user_delete')]
    public function index(EntityManagerInterface $entityManager,
                          Request                $request,
                          TokenStorageInterface  $tokenStorage): Response
    {
        $user = $entityManager->getRepository(User::class)->find($this->getUser()->getId());
        $username = $user->getName();

        $request->getSession()->invalidate();
        $tokenStorage->setToken(null);

        $entityManager->remove($user);
        $entityManager->flush();

        $this->addFlash('danger', "$username a quitté les Huit Royaumes&nbsp;!");

        return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
    }
}
