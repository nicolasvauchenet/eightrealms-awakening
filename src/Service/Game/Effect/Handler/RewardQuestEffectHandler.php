<?php

namespace App\Service\Game\Effect\Handler;

use App\Entity\Character\Player;
use App\Service\Quest\QuestProgressionService;

readonly class RewardQuestEffectHandler implements DialogEffectHandlerInterface
{
    public function __construct(private QuestProgressionService $questProgressionService)
    {
    }

    public function supports(string $type): bool
    {
        return $type === 'reward_quest';
    }

    public function apply(Player $player, mixed $value): void
    {
        $this->questProgressionService->rewardQuest($player, $value);
    }
}
