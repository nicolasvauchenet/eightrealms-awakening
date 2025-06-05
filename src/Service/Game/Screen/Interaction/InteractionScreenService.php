<?php

namespace App\Service\Game\Screen\Interaction;

use App\Entity\Character\Character;
use App\Entity\Character\Player;
use App\Entity\Location\Location;
use App\Entity\Screen\InteractionScreen;
use App\Service\Game\Dialog\DialogService;
use App\Service\Game\Navigation\ExitActionResolver;
use App\Service\Riddle\RiddleTriggerResolverService;
use Doctrine\ORM\EntityManagerInterface;

readonly class InteractionScreenService
{
    public function __construct(private EntityManagerInterface       $entityManager,
                                private DialogService                $dialogService,
                                private RiddleTriggerResolverService $riddleTriggerResolver,
                                private ExitActionResolver           $exitActionResolver)
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
        $actionsByType = [];
        $character = $screen->getCharacter();

        // Dialogue principal
        $dialog = $this->dialogService->findFirstDialogStep($character, $player);
        if($dialog) {
            $actionsByType['dialog'][] = [
                'type' => 'dialog',
                'slug' => $dialog->getSlug(),
                'label' => 'Discuter avec ' . $character->getName(),
                'thumbnail' => 'img/core/action/talk.png',
            ];
        }

        // Ragots
        $rumor = $this->dialogService->findFirstRumorStep($character, $player);
        if($rumor) {
            $actionsByType['dialog'][] = [
                'type' => 'dialog',
                'slug' => $rumor->getSlug(),
                'label' => 'Ragots de ' . $character->getName(),
                'thumbnail' => 'img/core/action/rumor.png',
            ];
        }

        // Métier
        $profession = $character->getProfession();
        if($profession) {
            $slug = $profession->getSlug();
            if(in_array($slug, ['marchand', 'forgeron', 'arcaniste', 'tavernier', 'pecheur'], true)) {
                $actionsByType['trade'][] = [
                    'type' => 'trade',
                    'slug' => $character->getSlug(),
                    'label' => 'Marchander avec ' . $character->getName(),
                    'thumbnail' => 'img/core/action/trade.png',
                ];
                if($slug === 'forgeron') {
                    $actionsByType['repair'][] = [
                        'type' => 'repair',
                        'slug' => $character->getSlug(),
                        'label' => 'Réparer avec ' . $character->getName(),
                        'thumbnail' => 'img/core/action/repair.png',
                    ];
                }
                if($slug === 'arcaniste') {
                    $actionsByType['reload'][] = [
                        'type' => 'reload',
                        'slug' => $character->getSlug(),
                        'label' => 'Recharger avec ' . $character->getName(),
                        'thumbnail' => 'img/core/action/reload.png',
                    ];
                }
            } else if($slug === 'pretre') {
                $actionsByType['pray'][] = [
                    'type' => 'pray',
                    'slug' => $character->getSlug(),
                    'label' => 'Prier avec ' . $character->getName(),
                    'thumbnail' => 'img/core/action/pray.png',
                ];
            }
        }

        // Énigmes
        $riddleSlug = '';
        if($character->getSlug() === 'grand-druide') {
            $riddleSlug = 'lepreuve-de-lesprit-du-cercle';
        }
        $riddleTriggers = $this->riddleTriggerResolver->getAvailableRiddleTriggers('riddle_screen', $riddleSlug, $player);
        foreach($riddleTriggers as $riddleTrigger) {
            $actionsByType['riddle'][] = [
                'type' => 'riddle',
                'id' => $riddleTrigger->getRiddle()->getRiddleQuestions()->first()->getId(),
                'label' => $riddleTrigger->getRiddle()->getName(),
                'thumbnail' => $riddleTrigger->getRiddle()->getThumbnail() ?? 'img/core/action/search.png',
            ];
        }

        // Retour
        $exitAction = $this->exitActionResolver->getExitAction($screen, $player);
        if($exitAction) {
            $actionsByType['location'][] = $exitAction;
        }

        $screen->setActions(['footer' => $actionsByType]);
    }
}
