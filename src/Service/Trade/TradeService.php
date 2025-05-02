<?php

namespace App\Service\Trade;

use App\Entity\Character\Npc;
use App\Entity\Character\Player;
use App\Entity\Character\PlayerNpc;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\PlayerNpcItem;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

readonly class TradeService
{
    public function __construct(private ItemPriceCalculatorService $itemPriceCalculator)
    {
    }

    public function getSellableItems(Player $player, Npc $npc): Collection
    {
        $inventory = $player->getCharacterItems();

        $allowedTypes = match ($npc->getProfession()?->getSlug()) {
            'marchand' => ['nourriture', 'cadeau', 'carte'],
            'forgeron' => ['armure', 'bouclier', 'arme'],
            'arcaniste' => ['arme-magique', 'parchemin', 'potion', 'anneau', 'amulette'],
            'tavernier', 'pecheur' => ['nourriture'],
            default => [],
        };

        return new ArrayCollection(array_filter($inventory->toArray(), function($characterItem) use ($allowedTypes) {
            return in_array($characterItem->getItem()->getCategory()->getSlug(), $allowedTypes);
        }));
    }

    public function getItemPrice(
        PlayerNpc                   $playerCharacter,
        CharacterItem|PlayerNpcItem $playerCharacterItem,
        string                      $mode = 'buy'
    ): int
    {
        return $this->itemPriceCalculator->calculatePrice($playerCharacter, $playerCharacterItem, $mode);
    }

    public function getTotalPrice(PlayerNpc $playerCharacter, Collection $items, string $mode): int
    {
        $total = 0;

        foreach($items as $item) {
            $total += $this->getItemPrice($playerCharacter, $item, $mode);
        }

        return $total;
    }
}
