<?php

namespace App\Event;

readonly class DialogStepReachedEvent
{
    public function __construct(
        public int    $playerId,
        public string $dialogStepSlug,
    )
    {
    }

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function getDialogStepSlug(): string
    {
        return $this->dialogStepSlug;
    }
}
