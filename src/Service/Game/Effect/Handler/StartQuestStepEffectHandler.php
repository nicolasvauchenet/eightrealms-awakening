<?php

namespace App\Service\Game\Effect\Handler;

use App\Entity\Character\Player;
use App\Service\Quest\QuestProgressionService;

readonly class StartQuestStepEffectHandler implements EffectHandlerInterface
{
    public function __construct(private QuestProgressionService $questProgressionService)
    {
    }

    public function supports(string $type): bool
    {
        return $type === 'start_quest_step';
    }

    public function apply(Player $player, mixed $value): void
    {
        $this->questProgressionService->startQuestStep($player, $value);
    }
}
