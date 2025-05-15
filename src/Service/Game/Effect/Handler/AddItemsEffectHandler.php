<?php

namespace App\Service\Game\Effect\Handler;

use App\Entity\Character\Player;
use App\Service\Item\CharacterInventoryService;

readonly class AddItemsEffectHandler implements EffectHandlerInterface
{
    public function __construct(private CharacterInventoryService $inventoryService)
    {
    }

    public function supports(string $type): bool
    {
        return $type === 'add_items';
    }

    public function apply(Player $player, mixed $value): void
    {
        foreach($value as $data) {
            if(!isset($data['item'])) {
                continue;
            }

            $itemSlug = $data['item'];
            $isQuestItem = $data['questItem'] ?? false;

            $this->inventoryService->addItem($player, $itemSlug, $isQuestItem);
        }
    }
}
