<?php

namespace App\Service\Item;

use App\Entity\Character\Character;
use App\Entity\Item\CharacterItem;
use Doctrine\ORM\EntityManagerInterface;

readonly class CharacterItemService
{
    public function __construct(private EntityManagerInterface $manager, private EntityManagerInterface $entityManager)
    {
    }

    public function getCharacterItems(Character $character): array
    {
        return $this->manager->getRepository(CharacterItem::class)->findCharacterItemsByCategories($character);
    }

    public function getEquippedItems(Character $character): array
    {
        $slots = ['armor', 'righthand', 'lefthand', 'bow', 'shield', 'ring', 'potion', 'scroll', 'amulet'];
        $equippedItems = $this->entityManager->getRepository(CharacterItem::class)->findEquippedItems($character);
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
        return $this->manager->getRepository(CharacterItem::class)->findEquippedWeapons($character, $isMagical);
    }
}
