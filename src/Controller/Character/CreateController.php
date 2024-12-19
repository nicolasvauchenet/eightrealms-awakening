<?php

namespace App\Controller\Character;

use App\Entity\Character\Character;
use App\Entity\User;
use App\Form\Character\PlayerType;
use App\Service\Character\CreateService;
use App\Service\FileUploaderService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/personnage', name: 'app_character_')]
class CreateController extends AbstractController
{
    #[Route('/creation/{slug}', name: 'create')]
    public function index(Request                $request,
                          EntityManagerInterface $entityManager,
                          CreateService          $createService,
                          FileUploaderService    $fileUploaderService,
                          SluggerInterface       $slugger,
                          Character              $preGenerated): Response
    {
        $character = $createService->createCharacter($preGenerated, $entityManager->getRepository(User::class)->find($this->getUser()->getId()));
        $characterPicture = $character->getPicture();
        $form = $this->createForm(PlayerType::class, $character);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $pictureFile */
            $pictureFile = $form->get('picture')->getData();
            if($pictureFile) {
                if($character->getPicture()) {
                    $fileUploaderService->remove('character', $characterPicture);
                }
                $pictureFileName = $fileUploaderService->upload($pictureFile, 'character', strtolower($slugger->slug($character->getName())));
                $character->setPicture($pictureFileName);
            }
            $entityManager->persist($character);
            $entityManager->flush();

            $this->addFlash('info', "Bienvenue dans les Huit Royaumes, {$character->getName()} !");

            return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('character/create/index.html.twig', [
            'form' => $form->createView(),
            'character' => $character,
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}
