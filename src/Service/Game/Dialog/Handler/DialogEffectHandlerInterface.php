<?php

namespace App\Service\Game\Dialog\Handler;

use App\Entity\Character\Player;

interface DialogEffectHandlerInterface
{
    public function supports(string $type): bool;

    public function apply(Player $player, mixed $value): void;
}
