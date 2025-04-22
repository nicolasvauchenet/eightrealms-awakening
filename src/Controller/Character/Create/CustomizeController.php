<?php

namespace App\Controller\Character\Create;

use App\Entity\Character\PreGenerated;
use App\Form\Character\CharacterType;
use App\Service\Character\CreateCharacterService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CustomizeController extends AbstractController
{
    #[Route('/nouveau-personnage/{slug}', name: 'app_character_customize')]
    public function index(Request                $request,
                          CreateCharacterService $createService,
                          PreGenerated           $preGenerated): Response
    {
        if($this->getUser()->getPlayer()) {
            $this->addFlash('info', 'Vous avez déjà un personnage');

            return $this->redirectToRoute('app_home');
        }

        $character = $createService->createCharacter($preGenerated, $this->getUser());
        $form = $this->createForm(CharacterType::class, $character);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $createService->saveCharacter($character, $preGenerated, $form->get('picture')->getData());

            $this->addFlash('success', "{$character->getName()} arrive dans les Huit Royaumes&nbsp;!");

            return $this->redirectToRoute('app_home');
        }

        return $this->render('character/create/customize/index.html.twig', [
            'character' => $character,
            'form' => $form->createView(),
        ]);
    }
}
