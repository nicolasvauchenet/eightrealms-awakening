<?php

namespace App\Service\Game\Condition\Handler;

use App\Entity\Character\Player;
use App\Entity\Quest\PlayerQuest;
use App\Entity\Quest\PlayerQuestStep;
use App\Entity\Quest\Quest;
use Doctrine\ORM\EntityManagerInterface;

class QuestStepNotStartedHandler implements ConditionHandlerInterface
{
    public function __construct(private EntityManagerInterface $em)
    {
    }

    public function supports(string $type): bool
    {
        return $type === 'quest_step_not_started';
    }

    public function evaluate(Player $player, mixed $value): bool
    {
        $quest = $this->em->getRepository(Quest::class)->findOneBy(['slug' => $value['quest'] ?? null]);
        $step = $quest?->getQuestSteps()->filter(fn($s) => $s->getPosition() === $value['quest_step'])->first();

        if(!$quest || !$step) return false;

        $playerQuest = $this->em->getRepository(PlayerQuest::class)->findOneBy(['player' => $player, 'quest' => $quest]);
        $pqs = $this->em->getRepository(PlayerQuestStep::class)->findOneBy(['player' => $player, 'questStep' => $step]);

        return !$playerQuest || $pqs === null;
    }
}
