<?php

namespace App\Service\Game\Effect\Handler;

use App\Entity\Character\Player;
use App\Service\Location\LocationService;

readonly class RevealLocationEffectHandler implements DialogEffectHandlerInterface
{
    public function __construct(private LocationService $locationService)
    {
    }

    public function supports(string $type): bool
    {
        return $type === 'reveal_location';
    }

    public function apply(Player $player, mixed $value): void
    {
        $this->locationService->revealLocation($player, $value);
    }
}
