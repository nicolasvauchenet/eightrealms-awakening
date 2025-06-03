<?php

namespace App\Service\Quest\TriggerHandler;

use App\Entity\Character\Player;
use App\Entity\Quest\QuestStepTrigger;
use App\Event\CombatVictoryEvent;
use App\Service\Quest\QuestProgressionService;
use App\Service\Game\Condition\ConditionEvaluatorService;

readonly class CombatVictoryTriggerHandler implements QuestTriggerHandlerInterface
{
    public function __construct(
        private QuestProgressionService   $questProgressionService,
        private ConditionEvaluatorService $conditionEvaluatorService
    )
    {
    }

    public function supports(QuestStepTrigger $trigger): bool
    {
        return $trigger->getType() === 'combat_victory';
    }

    public function handle(QuestStepTrigger $trigger, Player $player, object $event): void
    {
        if(!$event instanceof CombatVictoryEvent) return;

        if($trigger->getConditions() && !$this->conditionEvaluatorService->isValid($trigger->getConditions(), $player)) {
            return;
        }

        $slug = $trigger->getPayload()['slug'] ?? null;
        if($slug !== $event->getCombatSlug()) return;

        $step = $trigger->getQuestStep();
        $quest = $step?->getQuest();

        if($step && $quest) {
            $this->questProgressionService->startQuestStep($player, [
                'quest' => $quest->getSlug(),
                'quest_step' => $step->getPosition(),
            ]);
            if($trigger->getStatus()) {
                $this->questProgressionService->editQuestStepStatus($player, [
                    'quest' => $quest->getSlug(),
                    'quest_step' => $step->getPosition(),
                    'status' => $trigger->getStatus(),
                ]);
            }
        }
    }
}
