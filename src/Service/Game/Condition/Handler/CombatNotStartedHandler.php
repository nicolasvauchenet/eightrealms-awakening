<?php

namespace App\Service\Game\Condition\Handler;

use App\Entity\Character\Player;
use App\Entity\Combat\Combat;
use App\Entity\Combat\PlayerCombat;
use Doctrine\ORM\EntityManagerInterface;

readonly class CombatNotStartedHandler implements ConditionHandlerInterface
{
    public function __construct(private EntityManagerInterface $em)
    {
    }

    public function supports(string $type): bool
    {
        return $type === 'combat_not_started';
    }

    public function evaluate(Player $player, mixed $value): bool
    {
        $combat = $this->em->getRepository(Combat::class)->findOneBy(['slug' => $value]);

        return $this->em->getRepository(PlayerCombat::class)->findOneBy([
                'player' => $player,
                'combat' => $combat,
            ]) === null;
    }
}
