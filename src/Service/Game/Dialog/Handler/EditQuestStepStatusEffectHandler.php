<?php

namespace App\Service\Game\Dialog\Handler;

use App\Entity\Character\Player;
use App\Service\Quest\QuestProgressionService;

readonly class EditQuestStepStatusEffectHandler implements DialogEffectHandlerInterface
{
    public function __construct(private QuestProgressionService $questProgressionService)
    {
    }

    public function supports(string $type): bool
    {
        return $type === 'edit_quest_step_status';
    }

    public function apply(Player $player, mixed $value): void
    {
        $this->questProgressionService->editQuestStepStatus($player, $value);
    }
}
