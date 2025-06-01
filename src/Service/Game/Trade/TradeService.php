<?php

namespace App\Service\Game\Trade;

use App\Entity\Character\Npc;
use App\Entity\Character\Player;
use App\Entity\Character\PlayerCharacter;
use App\Entity\Item\Category;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\PlayerCharacterItem;
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
            'marchand' => ['nourriture', 'cadeau', 'carte', 'divers'],
            'forgeron' => ['armure', 'bouclier', 'arme', 'cadeau'],
            'arcaniste' => ['arme-magique', 'parchemin', 'potion', 'anneau', 'amulette', 'cadeau', 'carte', 'livre'],
            'tavernier', 'pecheur' => ['nourriture'],
            default => [],
        };

        return new ArrayCollection(array_filter($inventory->toArray(), function($characterItem) use ($allowedTypes) {
            return in_array($characterItem->getItem()->getCategory()->getSlug(), $allowedTypes) && !$characterItem->isQuestItem();
        }));
    }

    public function getSellableCategories(Player $player, Npc $npc): array
    {
        $items = $this->getSellableItems($player, $npc);
        $categories = [];
        foreach($items as $characterItem) {
            $category = $characterItem->getItem()->getCategory();
            if($category instanceof Category) {
                $categories[$category->getSlug()] = $category;
            }
        }
        uasort($categories, fn(Category $a, Category $b) => $a->getName() <=> $b->getName());

        return array_values($categories);
    }

    public function getBuyableCategories(PlayerCharacter $merchant): array
    {
        $items = $merchant->getPlayerCharacterItems();
        $categories = [];
        foreach($items as $characterItem) {
            $category = $characterItem->getItem()->getCategory();
            if($category instanceof Category) {
                $categories[$category->getSlug()] = $category;
            }
        }
        uasort($categories, fn(Category $a, Category $b) => $a->getName() <=> $b->getName());

        return array_values($categories);
    }

    public function getRepairableItems(Player $player): Collection
    {
        $inventory = $player->getCharacterItems();

        return new ArrayCollection(array_filter($inventory->toArray(), function($characterItem) {
            $category = $characterItem->getItem()->getCategory()->getSlug();
            $isRepairable = in_array($category, ['arme', 'armure', 'bouclier']);

            return $isRepairable && $characterItem->getHealth() < $characterItem->getItem()->getHealthMax();
        }));
    }

    public function getReloadableItems(Player $player): Collection
    {
        $inventory = $player->getCharacterItems();

        return new ArrayCollection(array_filter($inventory->toArray(), function($characterItem) {
            $item = $characterItem->getItem();
            if(!method_exists($item, 'getChargeMax') || $item->getChargeMax() <= 0) {
                return false;
            }

            return $characterItem->getCharge() < $item->getChargeMax();
        }));
    }

    public function getItemPrice(
        PlayerCharacter                   $playerCharacter,
        CharacterItem|PlayerCharacterItem $playerCharacterItem,
        string                            $mode = 'buy'
    ): int
    {
        return $this->itemPriceCalculator->calculatePrice($playerCharacter, $playerCharacterItem, $mode);
    }

    public function getTotalPrice(PlayerCharacter $playerCharacter, Collection $items, string $mode): int
    {
        $total = 0;

        foreach($items as $item) {
            $total += $this->getItemPrice($playerCharacter, $item, $mode);
        }

        return $total;
    }
}
