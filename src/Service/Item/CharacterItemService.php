<?php

namespace App\Service\Item;

use App\Entity\Character\Character;
use App\Repository\Item\CharacterItemRepository;
use Doctrine\Common\Collections\ArrayCollection;

class CharacterItemService
{
    private CharacterItemRepository $characterItemRepository;

    public function __construct(CharacterItemRepository $characterItemRepository)
    {
        $this->characterItemRepository = $characterItemRepository;
    }

    public function getCharacterItems(Character $character): array
    {
        return $this->characterItemRepository->findCharacterItems($character);
    }

    public function getCharacterBonus(Character $character, string $bonus): int
    {
        $value = 0;
        $equippedItems = new ArrayCollection($this->characterItemRepository->findByEquipped($character));

        $weapons = $equippedItems->filter(function($characterItem) {
            return $characterItem->getItem()->getCategory()->getName() === 'weapon';
        });

        $armors = $equippedItems->filter(function($characterItem) {
            return $characterItem->getItem()->getCategory()->getName() === 'armor';
        });
        $armor = $armors->first() ? $armors->first()->getItem() : null;

        $shields = $equippedItems->filter(function($characterItem) {
            return $characterItem->getItem()->getCategory()->getName() === 'shield';
        });
        $shield = $shields->first() ? $shields->first()->getItem() : null;

        $rings = $equippedItems->filter(function($characterItem) {
            return $characterItem->getItem()->getCategory()->getName() === 'ring';
        });
        $ring = $rings->first() ? $rings->first()->getItem() : null;

        $amulets = $equippedItems->filter(function($characterItem) {
            return $characterItem->getItem()->getCategory()->getName() === 'amulet';
        });
        $amulet = $amulets->first() ? $amulets->first()->getItem() : null;

        switch($bonus) {
            case 'damage':
                foreach($weapons as $weapon) {
                    if(method_exists($weapon->getItem(), 'getAmount')) {
                        if($weapon->getItem()->getAmount()) {
                            $value += $weapon->getItem()->getAmount();
                        } else if(method_exists($weapon->getItem(), 'getDamage')) {
                            $value += $weapon->getItem()->getDamage();
                        }
                    } else if(method_exists($weapon->getItem(), 'getDamage')) {
                        $value += $weapon->getItem()->getDamage();
                    }
                }
                break;
            case 'defense':
                if($armor && method_exists($armor, 'getDefense')) {
                    $value += $armor->getDefense();
                }
                if($shield && method_exists($shield, 'getDefense')) {
                    $value += $shield->getDefense();
                }
                break;
            case 'health':
                if($ring && $ring->getTarget() === 'health') {
                    $value += $ring->getAmount();
                }
                if($amulet && $amulet->getTarget() === 'health') {
                    $value += $amulet->getAmount();
                }
                break;
            case 'mana':
                if($ring && $ring->getTarget() === 'mana') {
                    $value += $ring->getAmount();
                }
                if($amulet && $amulet->getTarget() === 'mana') {
                    $value += $amulet->getAmount();
                }
                break;
            default:
                break;
        }

        return $value;
    }

    public function getEquippedItems(Character $character): array
    {
        $slots = ['armor', 'righthand', 'lefthand', 'bow', 'shield', 'ring', 'potion', 'scroll', 'amulet'];
        $equippedItems = $this->characterItemRepository->findByEquipped($character);
        $itemsBySlot = array_fill_keys($slots, null);

        foreach($equippedItems as $item) {
            if(in_array($item->getSlot(), $slots, true)) {
                $itemsBySlot[$item->getSlot()] = $item;
            }
        }

        return $itemsBySlot;
    }
}
