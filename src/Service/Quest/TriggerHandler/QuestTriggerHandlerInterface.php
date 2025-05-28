<?php

namespace App\Service\Quest\TriggerHandler;

use App\Entity\Character\Player;
use App\Entity\Quest\QuestStepTrigger;

interface QuestTriggerHandlerInterface
{
    public function supports(QuestStepTrigger $trigger): bool;

    public function handle(QuestStepTrigger $trigger, Player $player, object $event): void;
}
