<?php

namespace App\Service\Game\Screen\Interaction;

use App\Entity\Character\Character;
use App\Entity\Character\Player;
use App\Entity\Screen\InteractionScreen;
use App\Service\Dialog\DialogService;
use App\Service\Game\Navigation\ExitActionResolver;
use Doctrine\ORM\EntityManagerInterface;

readonly class InteractionScreenService
{
    public function __construct(private EntityManagerInterface $entityManager,
                                private DialogService          $dialogService,
                                private ExitActionResolver     $exitActionResolver)
    {
    }

    public function getScreen(Character $character, Player $player): InteractionScreen
    {
        $screen = $this->entityManager->getRepository(InteractionScreen::class)->findOneBy(['character' => $character]);
        if(!$screen) {
            $screen = (new InteractionScreen())
                ->setName($character->getName())
                ->setPicture($character->getPicture())
                ->setDescription($character->getDescription())
                ->setType('interaction')
                ->setCharacter($character);
        }

        $this->createScreenActions($screen, $player);
        $this->entityManager->persist($screen);
        $this->entityManager->flush();

        return $screen;
    }

    private function createScreenActions(InteractionScreen $screen, Player $player): void
    {
        $footerActions = [];
        $character = $screen->getCharacter();

        // Actions de dialogue
        $dialog = $this->dialogService->findFirstDialogStep($character, $player);
        if($dialog) {
            $footerActions[] = [
                'type' => 'dialog',
                'slug' => $dialog->getId(),
                'label' => 'Discuter avec ' . $character->getName(),
                'thumbnail' => 'img/core/action/talk.png',
            ];
        }

        // Actions de ragots
        $rumor = $this->dialogService->findFirstRumorStep($character, $player);
        if($rumor) {
            $footerActions[] = [
                'type' => 'dialog',
                'slug' => $rumor->getId(),
                'label' => 'Ragots de ' . $character->getName(),
                'thumbnail' => 'img/core/action/rumor.png',
            ];
        }

        // Actions métier
        $profession = $character->getProfession();
        if($profession) {
            $tradeProfessions = ['marchand', 'forgeron', 'arcaniste', 'tavernier', 'pecheur'];
            if(in_array($profession->getSlug(), $tradeProfessions, true)) {
                $footerActions[] = [
                    'type' => 'trade',
                    'slug' => $character->getSlug(),
                    'label' => 'Marchander avec ' . $character->getName(),
                    'thumbnail' => 'img/core/action/trade.png',
                ];
            } else if($profession->getSlug() === 'pretre') {
                $footerActions[] = [
                    'type' => 'pray',
                    'slug' => $character->getSlug(),
                    'label' => 'Prier avec ' . $character->getName(),
                    'thumbnail' => 'img/core/action/pray.png',
                ];
            }
        }

        // Bouton retour
        $exitAction = $this->exitActionResolver->getExitAction($screen);
        if($exitAction) {
            $footerActions[] = $exitAction;
        }

        if(!empty($footerActions)) {
            $screen->setActions(['footer' => $footerActions]);
        }
    }
}
