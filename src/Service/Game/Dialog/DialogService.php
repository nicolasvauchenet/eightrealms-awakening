<?php

namespace App\Service\Game\Dialog;

use App\Entity\Character\Character;
use App\Entity\Character\Player;
use App\Entity\Dialog\Dialog;
use App\Entity\Dialog\DialogStep;
use App\Service\Game\Condition\ConditionEvaluatorService;
use Doctrine\ORM\EntityManagerInterface;

readonly class DialogService
{
    public function __construct(
        private EntityManagerInterface    $entityManager,
        private ConditionEvaluatorService $conditionEvaluatorService
    )
    {
    }

    public function findFirstDialogStep(Character $character, Player $player): ?DialogStep
    {
        $dialogs = $this->entityManager->getRepository(Dialog::class)->findBy([
            'character' => $character,
            'type' => 'dialog',
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
