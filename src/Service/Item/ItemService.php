<?php

namespace App\Service\Item;

use App\Entity\Item\Item;

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
}
