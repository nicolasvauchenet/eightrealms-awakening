<?php

namespace App\Event;

readonly class EnterLocationEvent
{
    public function __construct(
        public int    $playerId,
        public string $buildingSlug,
    )
    {
    }

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function getBuildingSlug(): string
    {
        return $this->buildingSlug;
    }
}
