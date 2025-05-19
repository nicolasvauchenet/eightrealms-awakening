<?php

namespace App\Event;

readonly class CombatVictoryEvent
{
    public function __construct(
        public int    $playerId,
        public string $combatSlug,
    )
    {
    }

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function getCombatSlug(): string
    {
        return $this->combatSlug;
    }
}
