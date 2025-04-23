<?php

namespace App\Service\Game\Screen\Dialog;

use App\Entity\Character\Player;
use App\Entity\Dialog\DialogStep;
use App\Entity\Screen\DialogScreen;
use App\Service\Dialog\DialogEffectApplierService;
use App\Service\Game\Navigation\ExitActionResolver;
use Doctrine\ORM\EntityManagerInterface;

readonly class DialogScreenService
{
    public function __construct(
        private EntityManagerInterface     $entityManager,
        private ExitActionResolver         $exitActionResolver,
        private DialogEffectApplierService $dialogEffectApplierService,
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

        $this->createScreenActions($screen);
        $this->entityManager->persist($screen);
        $this->entityManager->flush();

        return $screen;
    }

    private function createScreenActions(DialogScreen $screen): void
    {
        $footerActions = $this->exitActionResolver->getExitActions($screen);

        if(!empty($footerActions)) {
            $screen->setActions(['footer' => $footerActions]);
        }
    }
}
