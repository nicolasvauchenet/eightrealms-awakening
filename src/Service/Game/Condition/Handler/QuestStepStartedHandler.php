<?php

namespace App\Service\Game\Condition\Handler;

use App\Entity\Character\Player;
use App\Entity\Quest\PlayerQuestStep;
use App\Entity\Quest\Quest;
use Doctrine\ORM\EntityManagerInterface;

class QuestStepStartedHandler implements ConditionHandlerInterface
{
    public function __construct(private EntityManagerInterface $em)
    {
    }

    public function supports(string $type): bool
    {
        return $type === 'quest_step_started';
    }

    public function evaluate(Player $player, mixed $value): bool
    {
        $questSlug = $value['quest'] ?? null;
        $stepPosition = $value['quest_step'] ?? null;
        if(!$questSlug || !is_numeric($stepPosition)) {
            return false;
        }

        $quest = $this->em->getRepository(Quest::class)->findOneBy(['slug' => $questSlug]);
        if(!$quest) {
            return false;
        }

        $questStep = $quest->getQuestSteps()->filter(
            fn($step) => $step->getPosition() === (int)$stepPosition
        )->first();
        if(!$questStep) {
            return false;
        }

        $playerStep = $this->em->getRepository(PlayerQuestStep::class)->findOneBy([
            'player' => $player,
            'questStep' => $questStep,
        ]);

        return $playerStep !== null;
    }
}
