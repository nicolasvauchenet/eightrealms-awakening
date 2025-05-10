<?php

namespace App\Event;

readonly class ItemReceivedEvent
{
    public function __construct(
        private int    $playerId,
        private string $itemSlug,
    )
    {
    }

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function getItemSlug(): string
    {
        return $this->itemSlug;
    }
}
