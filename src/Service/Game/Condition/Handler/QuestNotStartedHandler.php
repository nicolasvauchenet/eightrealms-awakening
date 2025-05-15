<?php

namespace App\Service\Game\Condition\Handler;

use App\Entity\Character\Player;
use App\Entity\Quest\PlayerQuest;
use App\Entity\Quest\Quest;
use Doctrine\ORM\EntityManagerInterface;

class QuestNotStartedHandler implements ConditionHandlerInterface
{
    public function __construct(private EntityManagerInterface $em)
    {
    }

    public function supports(string $type): bool
    {
        return $type === 'quest_not_started';
    }

    public function evaluate(Player $player, mixed $value): bool
    {
        $quest = $this->em->getRepository(Quest::class)->findOneBy(['slug' => $value]);

        return $this->em->getRepository(PlayerQuest::class)->findOneBy([
                'player' => $player,
                'quest' => $quest,
            ]) === null;
    }
}
