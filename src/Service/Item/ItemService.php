<?php

namespace App\Service\Item;

use App\Entity\Character\PlayerNpc;
use App\Entity\Item\Armor;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Item;
use App\Entity\Item\Magical;
use App\Entity\Item\PlayerNpcItem;
use App\Entity\Item\Shield;
use App\Entity\Item\Weapon;

readonly class ItemService
{
    public function getEnchantment(Item $item): ?array
    {
        if(!method_exists($item, 'getTarget') || !method_exists($item, 'getEffect')) {
            return null;
        }

        if($item->getTarget()) {
            $enchantment = [
                'target' => $item->getTarget(),
                'amount' => $item->getAmount(),
                'duration' => $item->getDuration(),
                'area' => $item->getArea(),
            ];
        } else if($item->getEffect()) {
            $enchantment = [
                'effect' => $item->getEffect(),
                'duration' => $item->getDuration(),
                'area' => $item->getArea(),
            ];
        }

        return $enchantment ?? null;
    }

    public function getBuyPrice(PlayerNpcItem $characterItem): int
    {
        $price = $characterItem->getItem()->getPrice();
        $reputation = $characterItem->getPlayerNpc()->getReputation();
        $charisma = $characterItem->getPlayerNpc()->getPlayer()->getCharisma();

        $repFactor = match (true) {
            $reputation >= 11 => 0.5,
            $reputation >= 5 => 0.75,
            $reputation > -5 => 1.25,
            $reputation > -11 => 1.5,
            default => 1.75,
        };

        return max(1, (int)round(
            $price
            * $repFactor
            * (1 - $charisma * 0.01)
        ));
    }

    public function getSellPrice(CharacterItem $characterItem, PlayerNpc $playerNpc): int
    {
        $price = $characterItem->getItem()->getPrice();
        $reputation = $playerNpc->getReputation();
        $charisma = $playerNpc->getPlayer()->getCharisma();
        $healthFactor = $this->getHealth($characterItem);

        $repFactor = match (true) {
            $reputation >= 11 => 0.5,
            $reputation >= 5 => 0.75,
            $reputation > -5 => 1.25,
            $reputation > -11 => 1.5,
            default => 1.75,
        };

        $buyPrice = (int)round($price * $repFactor * (1 - $charisma * 0.01));

        return max(1, min(
            (int)round(
                ($price / 3)
                * (1 + $reputation / 50)
                * (1 + $charisma * 0.005)
                * $healthFactor
            ),
            (int)round($buyPrice * 0.75)
        ));
    }

    public function getHealth(CharacterItem|PlayerNpcItem $characterItem): float
    {
        $item = $characterItem->getItem();

        if($item instanceof Armor || $item instanceof Shield || $item instanceof Weapon) {
            $current = $characterItem->getHealth();
            $maximum = $item->getHealth();
        } else if($item instanceof Magical) {
            $current = $characterItem->getCharge();
            $maximum = $item->getCharge();
        } else {
            return 1;
        }

        if($maximum <= 0 || $current <= 0) {
            return 0.0;
        }

        return max(0.0, min(1.0, $current / $maximum));
    }

    public function isMagical(Item $item): bool
    {
        return $item instanceof Magical;
    }
}
