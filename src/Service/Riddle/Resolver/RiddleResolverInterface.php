<?php

namespace App\Service\Riddle\Resolver;

use App\Entity\Character\Player;
use App\Entity\Riddle\Riddle;

interface RiddleResolverInterface
{
    public function supports(Riddle $riddle): bool;

    public function resolve(Riddle $riddle, Player $player): bool;
}
