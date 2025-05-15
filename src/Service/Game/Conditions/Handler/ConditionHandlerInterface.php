<?php

namespace App\Service\Game\Conditions\Handler;

use App\Entity\Character\Player;

interface ConditionHandlerInterface
{
    public function supports(string $type): bool;

    public function evaluate(Player $player, mixed $value): bool;
}
