<?php

namespace App\Service\Game\Screen\Dialog;

use App\Entity\Character\Player;
use App\Entity\Combat\Combat;
use App\Entity\Dialog\DialogStep;
use App\Entity\Screen\DialogScreen;
use App\Event\DialogStepReachedEvent;
use App\Service\Game\Dialog\DialogEffectApplierService;
use App\Service\Game\Navigation\ExitActionResolver;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

readonly class DialogScreenService
{
    public function __construct(
        private EntityManagerInterface     $entityManager,
        private ExitActionResolver         $exitActionResolver,
        private DialogEffectApplierService $dialogEffectApplierService,
        private EventDispatcherInterface   $eventDispatcher
    )
    {
    }

    public function getScreen(DialogStep $dialogStep, Player $player): DialogScreen
    {
        $screen = $this->entityManager->getRepository(DialogScreen::class)->findOneBy(['dialogStep' => $dialogStep]);
        if(!$screen) {
            $screen = (new DialogScreen())
                ->setName($dialogStep->getDialog()->getCharacter()->getName())
                ->setPicture($dialogStep->getDialog()->getCharacter()->getPicture())
                ->setDescription($dialogStep->getDialog()->getCharacter()->getDescription())
                ->setType('dialog')
                ->setDialogStep($dialogStep);
        }
        $this->dialogEffectApplierService->applyEffects($dialogStep->getEffects(), $player);

        $this->createScreenActions($screen, $player);
        $this->entityManager->persist($screen);
        $this->entityManager->flush();

        // Le dialogue peut déclencher une étape de la quête principale
        $this->eventDispatcher->dispatch(new DialogStepReachedEvent($player->getId(), $dialogStep->getSlug()));

        return $screen;
    }

    private function createScreenActions(DialogScreen $screen, Player $player): void
    {
        $footerActions = $this->exitActionResolver->getExitActions($screen, $player);

        // Ajout d’un combat si redirection
        if($slug = $screen->getDialogStep()->getRedirectToCombat()) {
            $combat = $this->entityManager->getRepository(Combat::class)->findOneBy(['slug' => $slug]);
            if($combat) {
                $footerActions[] = [
                    'type' => 'combat',
                    'slug' => $combat->getSlug(),
                    'label' => $combat->getName(),
                    'thumbnail' => $combat->getThumbnail(),
                    'isQuest' => $combat->getQuestStep() ? true : false,
                ];
            }
        }

        // Vérifie s'il y a une action de type 'combat'
        $hasCombat = false;
        foreach($footerActions as $action) {
            if($action['type'] === 'combat') {
                $hasCombat = true;
                break;
            }
        }

        // Supprime les 'interaction' si 'combat' présent
        if($hasCombat) {
            $footerActions = array_filter($footerActions, fn($action) => $action['type'] !== 'interaction');
        }

        // Regroupe les actions par type
        $locationActions = [];
        $otherActions = [];
        foreach($footerActions as $action) {
            if($action['type'] === 'location') {
                $locationActions[] = $action;
            } else {
                $otherActions[] = $action;
            }
        }

        // Combine en mettant les locations à la fin
        $orderedActions = array_merge($otherActions, $locationActions);

        $screen->setActions([
            'footer' => array_values($orderedActions),
        ]);
    }
}
