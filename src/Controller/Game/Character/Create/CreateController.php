<?php

namespace App\Controller\Game\Character\Create;

use App\Entity\Character\Character;
use App\Entity\Character\Player;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Food;
use App\Entity\Item\Gift;
use App\Entity\Spell\CharacterSpell;
use App\Entity\User;
use App\Form\Character\PlayerType;
use App\Service\FileUploaderService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

final class CreateController extends AbstractController
{
    #[Route('/nouveau-personnage/{slug}', name: 'app_game_character_create_customize')]
    public function index(Request                $request,
                          EntityManagerInterface $entityManager,
                          FileUploaderService    $fileUploaderService,
                          SluggerInterface       $slugger,
                          Character              $preGenerated): Response
    {
        $character = (new Player())
            ->setOwner($entityManager->getRepository(User::class)->find($this->getUser()->getId()))
            ->setRace($preGenerated->getRace())
            ->setProfession($preGenerated->getProfession())
            ->setName($preGenerated->getName())
            ->setPicture($preGenerated->getPicture())
            ->setDescription($preGenerated->getDescription())
            ->setStrength($preGenerated->getStrength())
            ->setDexterity($preGenerated->getDexterity())
            ->setConstitution($preGenerated->getConstitution())
            ->setWisdom($preGenerated->getWisdom())
            ->setIntelligence($preGenerated->getIntelligence())
            ->setCharisma($preGenerated->getCharisma())
            ->setHealthMax($preGenerated->getHealthMax())
            ->setHealth($preGenerated->getHealth())
            ->setManaMax($preGenerated->getManaMax())
            ->setMana($preGenerated->getMana())
            ->setFortune($preGenerated->getFortune())
            ->setLevel(1)
            ->setExperience(0);

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
            } else {
                $pictureFileName = $fileUploaderService->copyFile('core/character', $preGenerated->getPicture(), 'character', strtolower($slugger->slug($character->getName())));
            }
            $character->setPicture($pictureFileName);

            foreach($preGenerated->getCharacterItems() as $characterItem) {
                $newCharacterItem = (new CharacterItem())
                    ->setCharacter($character)
                    ->setItem($characterItem->getItem())
                    ->setEquipped($characterItem->isEquipped())
                    ->setSlot($characterItem->getSlot())
                    ->setHealth($characterItem->getHealth())
                    ->setCharge($characterItem->getCharge());
                $entityManager->persist($newCharacterItem);
            }

            $bread = $entityManager->getRepository(Food::class)->findOneBy(['slug' => 'miche-de-pain']);
            $characterItem = (new CharacterItem())
                ->setCharacter($character)
                ->setItem($bread)
                ->setEquipped(false);
            $entityManager->persist($characterItem);

            $beer = $entityManager->getRepository(Food::class)->findOneBy(['slug' => 'chope-de-biere']);
            $characterItem = (new CharacterItem())
                ->setCharacter($character)
                ->setItem($beer)
                ->setEquipped(false);
            $entityManager->persist($characterItem);

            $flowers = $entityManager->getRepository(Gift::class)->findOneBy(['slug' => 'bouquet-de-fleurs']);
            $characterItem = (new CharacterItem())
                ->setCharacter($character)
                ->setItem($flowers)
                ->setEquipped(false);
            $entityManager->persist($characterItem);

            foreach($preGenerated->getCharacterSpells() as $characterSpell) {
                $newCharacterSpell = (new CharacterSpell())
                    ->setCharacter($character)
                    ->setSpell($characterSpell->getSpell())
                    ->setLevel($characterSpell->getLevel())
                    ->setMana($characterSpell->getMana())
                    ->setAmount($characterSpell->getAmount())
                    ->setArea($characterSpell->getArea())
                    ->setDuration($characterSpell->getDuration());
                $entityManager->persist($newCharacterSpell);
            }

            $entityManager->persist($character);
            $entityManager->flush();

            $this->addFlash('success', "{$character->getName()} arrive dans les Huit Royaumes&nbsp;!");

            return $this->redirectToRoute('app_front_office_home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('game/character/create/create/index.html.twig', [
            'form' => $form->createView(),
            'character' => $character,
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}
