<?php

namespace App\Service\Game\Condition\Handler;

use App\Entity\Character\Player;
use Symfony\Component\HttpFoundation\RedirectResponse;

interface ConditionHandlerInterface
{
    public function supports(string $type): bool;

    public function evaluate(Player $player, mixed $value): bool|RedirectResponse;
}
