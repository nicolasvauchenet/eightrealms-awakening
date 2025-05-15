<?php

namespace App\Service\Game\Conditions\Handler;

use App\Entity\Character\Player;
use App\Entity\Combat\Combat;
use App\Entity\Combat\PlayerCombat;
use Doctrine\ORM\EntityManagerInterface;

class CombatStatusNotHandler implements ConditionHandlerInterface
{
    public function __construct(private EntityManagerInterface $em)
    {
    }

    public function supports(string $type): bool
    {
        return $type === 'combat_status_not';
    }

    public function evaluate(Player $player, mixed $value): bool
    {
        $combat = $this->em->getRepository(Combat::class)->findOneBy(['slug' => $value['combat'] ?? null]);
        $pc = $this->em->getRepository(PlayerCombat::class)->findOneBy([
            'player' => $player,
            'combat' => $combat,
        ]);

        return !$pc || $pc->getStatus() !== ($value['status'] ?? null);
    }
}
