<?php

namespace App\Service\Item;

use App\Entity\Character\Character;
use App\Entity\Character\Npc;
use App\Entity\Item\Armor;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Magical;
use App\Entity\Item\Shield;
use App\Repository\Item\CharacterItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

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

    public function canEquipItem(Character $character, CharacterItem $characterItem): bool
    {
        if($characterItem->getItem() instanceof Magical) {
            return ($character->getProfession()->getType() === 'magic' || in_array($character->getProfession()->getSlug(), ['mecaniste', 'moine']));
        } else if($characterItem->getItem() instanceof Armor || $characterItem->getItem() instanceof Shield) {
            if(in_array($characterItem->getItem()->getType(), ['Armure lourde', 'Armure lourde enchantée', 'Bouclier lourd', 'Bouclier lourd enchanté'])) {
                return ($character->getProfession()->getType() !== 'magic' && !in_array($character->getProfession()->getSlug(), ['archer', 'voleur', 'rodeur']));
            }
        }

        return true;
    }

    public function getSellableItems(Npc $npc, Collection $characterItems): Collection
    {
        switch($npc->getProfession()->getSlug()) {
            case 'marchand':
                return $characterItems->filter(function($item) {
                    return in_array($item->getItem()->getCategory()->getSlug(), ['nourriture', 'cadeau', 'carte']);
                });
            default:
                return new ArrayCollection();
        }
    }
}
