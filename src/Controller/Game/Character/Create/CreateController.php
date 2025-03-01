<?php

namespace App\Controller\Game\Character\Create;

use App\Entity\Character\Character;
use App\Entity\Character\Player;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Food;
use App\Entity\Item\Gift;
use App\Entity\Item\Map;
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
        if($this->getUser()->getCharacter()) {
            return $this->redirectToRoute('app_front_office_home');
        }

        $character = (new Player())
            ->setOwner($entityManager->getRepository(User::class)->find($this->getUser()->getId()))
            ->setRace($preGenerated->getRace())
            ->setProfession($preGenerated->getProfession())
            ->setName($preGenerated->getName())
            ->setDescription(strip_tags($preGenerated->getDescription()))
            ->setPicture($preGenerated->getPicture())
            ->setStrength($preGenerated->getStrength() + $preGenerated->getRace()->getBonusStats()['strength'])
            ->setDexterity($preGenerated->getDexterity() + $preGenerated->getRace()->getBonusStats()['dexterity'])
            ->setConstitution($preGenerated->getConstitution() + $preGenerated->getRace()->getBonusStats()['constitution'])
            ->setWisdom($preGenerated->getWisdom() + $preGenerated->getRace()->getBonusStats()['wisdom'])
            ->setIntelligence($preGenerated->getIntelligence() + $preGenerated->getRace()->getBonusStats()['intelligence'])
            ->setCharisma($preGenerated->getCharisma() + $preGenerated->getRace()->getBonusStats()['charisma'])
            ->setHealthMax(($preGenerated->getConstitution() + $preGenerated->getRace()->getBonusStats()['constitution']) * 10)
            ->setHealth(($preGenerated->getConstitution() + $preGenerated->getRace()->getBonusStats()['constitution']) * 10)
            ->setManaMax(($preGenerated->getIntelligence() + $preGenerated->getRace()->getBonusStats()['intelligence']) * 5)
            ->setMana(($preGenerated->getIntelligence() + $preGenerated->getRace()->getBonusStats()['intelligence']) * 5)
            ->setFortune($preGenerated->getFortune())
            ->setLevel(1)
            ->setExperience(0);

        $characterPicture = $character->getPicture();
        $characterDescription = strip_tags($character->getDescription());

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
                    ->setHealth($characterItem->getHealth() ?? null)
                    ->setCharge($characterItem->getCharge() ?? null)
                    ->setQuestItem(false);
                $entityManager->persist($newCharacterItem);
            }

            $bread = $entityManager->getRepository(Food::class)->findOneBy(['slug' => 'miche-de-pain']);
            $characterItem = (new CharacterItem())
                ->setCharacter($character)
                ->setItem($bread)
                ->setEquipped(false)
                ->setQuestItem(false);
            $entityManager->persist($characterItem);

            $beer = $entityManager->getRepository(Food::class)->findOneBy(['slug' => 'chope-de-biere']);
            $characterItem = (new CharacterItem())
                ->setCharacter($character)
                ->setItem($beer)
                ->setEquipped(false)
                ->setQuestItem(false);
            $entityManager->persist($characterItem);

            $flowers = $entityManager->getRepository(Gift::class)->findOneBy(['slug' => 'bouquet-de-fleurs']);
            $characterItem = (new CharacterItem())
                ->setCharacter($character)
                ->setItem($flowers)
                ->setEquipped(false)
                ->setQuestItem(false);
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

            if($form->get('description')->getData() === $characterDescription) {
                $character->setDescription("<p>{$character->getName()}, {$character->getProfession()->getName()} {$character->getRace()->getName()}, commence son aventure à Port-Saint-Doux, capitale des Huit Royaumes.</p>");
            } else {
                $character->setDescription('<p>' . $form->get('description')->getData() . '</p>');
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
