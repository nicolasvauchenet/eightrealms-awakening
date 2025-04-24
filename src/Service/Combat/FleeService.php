<?php

namespace App\Service\Combat;

use App\Entity\Combat\PlayerCombat;

readonly class FleeService
{
    public function __construct(private InitiativeService $initiativeService)
    {
    }

    public function flee(PlayerCombat $playerCombat): bool
    {
        $player = $playerCombat->getPlayer();
        $initiative = $this->initiativeService->getTurnOrder($playerCombat);

        return isset($initiative[0]) && $initiative[0]['type'] === 'player' && $initiative[0]['id'] === $player->getId();
    }
}
