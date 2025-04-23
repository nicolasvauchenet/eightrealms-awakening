<?php

namespace App\Service\Dialog;

use App\Entity\Character\Character;
use App\Entity\Character\Player;
use App\Entity\Dialog\Dialog;
use App\Entity\Dialog\DialogStep;
use Doctrine\ORM\EntityManagerInterface;

readonly class DialogService
{
    public function __construct(
        private EntityManagerInterface     $entityManager,
        private ConditionEvaluatorService  $conditionEvaluatorService,
        private DialogEffectApplierService $dialogEffectApplierService,
    )
    {
    }

    public function findFirstDialogStep(Character $character, Player $player): ?DialogStep
    {
        $dialog = $this->entityManager->getRepository(Dialog::class)->findOneBy([
            'character' => $character,
            'type' => 'dialog',
        ]);

        if(!$dialog) return null;

        foreach($dialog->getDialogSteps() as $step) {
            if($step->isFirst() && $this->conditionEvaluatorService->isValid($step->getConditions(), $player)) {
                return $step;
            }
        }

        return null;
    }

    public function findFirstRumorStep(Character $character, Player $player): ?DialogStep
    {
        $dialogs = $this->entityManager->getRepository(Dialog::class)->findBy([
            'character' => $character,
            'type' => 'rumor',
        ]);

        foreach($dialogs as $dialog) {
            foreach($dialog->getDialogSteps() as $step) {
                if($step->isFirst() && $this->conditionEvaluatorService->isValid($step->getConditions(), $player)) {
                    return $step;
                }
            }
        }

        return null;
    }
}
