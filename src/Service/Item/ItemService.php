<?php

namespace App\Service\Item;

use App\Entity\Character\Player;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Item;
use App\Entity\Item\Weapon;
use App\Service\Location\CharacterLocationReputationService;

class ItemService
{
    private CharacterLocationReputationService $characterLocationReputationService;

    public function __construct(CharacterLocationReputationService $characterLocationReputationService)
    {
        $this->characterLocationReputationService = $characterLocationReputationService;
    }

    public function getItemBuyPrice(Item $item, Player $character): int
    {
        $basePrice = $item->getBuyPrice() ?: 0;
        $reputation = $this->characterLocationReputationService->getTotalReputation($character, $character->getCurrentPlace()->getLocation());
        $charisma = $character->getCharisma();

        return (int)round($basePrice * (1 - $reputation / 100) * (1 - $charisma * 0.01));
    }

    public function getItemSellPrice(CharacterItem $characterItem, Player $character): int
    {
        $basePrice = $characterItem->getItem()->getBuyPrice() ?: 0;
        $reputation = min(
            50,
            $this->characterLocationReputationService->getTotalReputation(
                $character,
                $character->getCurrentPlace()->getLocation()
            )
        );
        $charisma = $character->getCharisma() ?? 10;
        $healthFactor = $this->getItemDurabilityFactor($characterItem);
        $sellPrice = ($basePrice / 2) * (1 + $reputation / 200) * (1 + $charisma * 0.005) * $healthFactor;

        return (int)round($sellPrice);
    }

    public function getItemDurabilityFactor(CharacterItem $characterItem): float
    {
        $item = $characterItem->getItem();
        $currentHealth = $characterItem->getHealth() ?? 0;
        $currentCharge = $characterItem->getCharge() ?? 0;
        $maxHealth = $item->getHealth() ?? 0;
        $maxCharge = 0;
        if($item instanceof Weapon) {
            $maxCharge = $item->getCharge() ?? 0;
        }
        $current = max($currentHealth, $currentCharge);
        $maximum = max($maxHealth, $maxCharge);
        if($maximum <= 0) {
            return 1.0;
        }
        $ratio = $current / $maximum;

        return max(0.3, $ratio);
    }
}
