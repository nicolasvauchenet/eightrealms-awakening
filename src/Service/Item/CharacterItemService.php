<?php

namespace App\Service\Item;

use App\Entity\Character\Character;
use App\Repository\Item\CharacterItemRepository;

readonly class CharacterItemService
{
    public function __construct(private CharacterItemRepository $characterItemRepository)
    {
    }

    public function getCharacterItems(Character $character): array
    {
        return $this->characterItemRepository->findCharacterItemsByCategories($character);
    }

    public function getEquippedItems(Character $character): array
    {
        $slots = ['armor', 'righthand', 'lefthand', 'bow', 'shield', 'ring', 'potion', 'scroll', 'amulet'];
        $equippedItems = $this->characterItemRepository->findEquippedItems($character);
        $itemsBySlot = array_fill_keys($slots, null);

        foreach($equippedItems as $item) {
            if(in_array($item->getSlot(), $slots, true)) {
                $itemsBySlot[$item->getSlot()] = $item;
            }
        }

        return $itemsBySlot;
    }

    public function getEquippedWeapons(Character $character, ?bool $isMagical = false): array
    {
        return $this->characterItemRepository->findEquippedWeapons($character, $isMagical);
    }
}
