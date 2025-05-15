<?php

namespace App\Service\Game\Dialog\Handler;

use App\Entity\Character\Player;
use App\Service\Item\CharacterInventoryService;

readonly class RemoveItemsEffectHandler implements DialogEffectHandlerInterface
{
    public function __construct(private CharacterInventoryService $inventoryService)
    {
    }

    public function supports(string $type): bool
    {
        return $type === 'remove_items';
    }

    public function apply(Player $player, mixed $value): void
    {
        foreach($value as $slug) {
            $this->inventoryService->removeItem($player, $slug);
        }
    }
}
