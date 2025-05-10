<?php

namespace App\Service\Item;

use App\Entity\Character\Character;
use App\Entity\Character\PlayerCharacter;
use App\Entity\Item\Armor;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\MagicalWeapon;
use App\Entity\Item\PlayerCharacterItem;
use App\Entity\Item\Shield;
use App\Service\Game\Trade\TradeService;
use Doctrine\ORM\EntityManagerInterface;

readonly class CharacterItemService
{
    public function __construct(private EntityManagerInterface $entityManager,
                                private TradeService           $tradeService)
    {
    }

    public function getCharacterItems(Character $character, ?bool $questItem = false): array
    {
        return $this->entityManager->getRepository(CharacterItem::class)->findCharacterItemsByCategories($character, $questItem);
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
        $slots = ['lefthand', 'righthand', 'bow'];
        $slugs = $isMagical ? ['arme-magique'] : ['arme'];

        return $this->entityManager->getRepository(CharacterItem::class)->findEquippedItemsByType($character, $slots, $slugs);
    }

    public function getEquippedArmors(Character $character): array
    {
        $slots = ['armor', 'shield'];
        $slugs = ['armure', 'bouclier'];

        return $this->entityManager->getRepository(CharacterItem::class)->findEquippedItemsByType($character, $slots, $slugs);
    }

    public function getEquippedBonus(Character $character, string $type, string $target): array
    {
        return $this->entityManager->getRepository(CharacterItem::class)->findEquippedItemsWithBonuses($character, $type, $target);
    }

    public function canEquipItem(Character $character, CharacterItem|PlayerCharacterItem $characterItem): bool
    {
        if($characterItem->getItem() instanceof MagicalWeapon) {
            return ($character->getProfession()->getType() === 'magical' || in_array($character->getProfession()->getSlug(), ['mecaniste', 'moine']));
        } else if($characterItem->getItem() instanceof Armor || $characterItem->getItem() instanceof Shield) {
            if(in_array($characterItem->getItem()->getType(), ['Armure lourde', 'Armure lourde enchantée', 'Bouclier lourd', 'Bouclier lourd enchanté'])) {
                return ($character->getProfession()->getType() !== 'magical' && !in_array($character->getProfession()->getSlug(), ['archer', 'voleur', 'rodeur']));
            }
        }

        return true;
    }

    public function getHealth(CharacterItem|PlayerCharacterItem $characterItem): array
    {
        $item = $characterItem->getItem();

        // Si l'objet a des charges (arme magique ou méthode dédiée)
        if(
            $item->getCategory()->getSlug() === 'arme-magique' ||
            method_exists($item, 'getChargeMax')
        ) {
            if($item->getChargeMax() !== null) {
                return [
                    'health' => $characterItem->getCharge(),
                    'healthMax' => $item->getChargeMax(),
                ];
            }
        }

        // Sinon, on retourne la durabilité classique (PV)
        if(method_exists($item, 'getHealthMax')) {
            return [
                'health' => method_exists($characterItem, 'getHealth') ? $characterItem->getHealth() : 1,
                'healthMax' => $item->getHealthMax(),
            ];
        }

        return [
            'health' => 1,
            'healthMax' => 1,
        ];
    }

    public function toggleEquipItem(Character $character, CharacterItem $item): void
    {
        $equippedItems = $this->getEquippedItems($character);
        $categoryName = $item->getItem()->getCategory()->getSlug();
        $categoryCode = $item->getItem()->getCategory()->getFolder();

        if($item->isEquipped()) {
            $this->unequipItem($character, $item, $categoryName, $equippedItems);
        } else {
            $this->equipItem($character, $item, $categoryName, $categoryCode, $equippedItems);
        }

        $this->entityManager->persist($item);
    }

    private function unequipItem(Character $character, CharacterItem $item, string $categoryName, array $equippedItems): void
    {
        if(in_array($categoryName, ['arme', 'arme-magique'])) {
            $righthand = $equippedItems['righthand'] ?? null;
            $lefthand = $equippedItems['lefthand'] ?? null;
            if($item === $righthand && $lefthand !== null) {
                $leftItem = $equippedItems['lefthand'];
                $leftItem->setSlot('righthand');
                $leftItem->setEquipped(true);
                $this->entityManager->persist($leftItem);
            }
        }

        $item->setSlot(null);
        $item->setEquipped(false);

        $this->handleStatBonus($character, $item, false);
    }

    private function equipItem(Character $character, CharacterItem $item, string $categoryName, string $categoryCode, array $equippedItems): void
    {
        switch($categoryName) {
            case 'armure':
                $this->unequipSlot($equippedItems, 'armor');
                $item->setSlot('armor');
                break;

            case 'arme':
            case 'arme-magique':
                $this->handleWeaponEquip($item, $equippedItems);
                break;

            case 'anneau':
            case 'parchemin':
            case 'potion':
            case 'amulette':
                $this->unequipSlot($equippedItems, $categoryCode);
                $item->setSlot($categoryCode);
                break;

            case 'bouclier':
                $this->unequipSlot($equippedItems, 'shield');
                $this->unequipSlot($equippedItems, 'lefthand');
                $this->unequipSlot($equippedItems, 'bow');
                $item->setSlot('shield');
                break;

            default:
                $item->setSlot(null);
        }

        $item->setEquipped(true);
        $this->handleStatBonus($character, $item, true);
    }

    private function handleWeaponEquip(CharacterItem $item, array $equippedItems): void
    {
        $type = $item->getItem()->getType();

        if(in_array($type, ['Arme de jet', 'Arme de jet enchantée'])) {
            foreach(['righthand', 'lefthand', 'shield'] as $slot) {
                $this->unequipSlot($equippedItems, $slot);
            }
            $item->setSlot('bow');
        } else if(!isset($equippedItems['righthand'])) {
            $item->setSlot('righthand');
        } else if(!isset($equippedItems['lefthand'])) {
            $this->unequipSlot($equippedItems, 'shield');
            $item->setSlot('lefthand');
        } else {
            $this->unequipSlot($equippedItems, 'righthand');
            $item->setSlot('righthand');
        }

        $this->unequipSlot($equippedItems, 'bow');
    }

    private function unequipSlot(array $equippedItems, string $slot): void
    {
        if(isset($equippedItems[$slot])) {
            $item = $equippedItems[$slot];
            $this->handleStatBonus($item->getCharacter(), $item, false);
            $item->setEquipped(false)->setSlot(null);
        }
    }

    private function handleStatBonus(Character $character, CharacterItem $characterItem, bool $add): void
    {
        $bonusTypes = ['defensive', 'Robe enchantée', 'Armure légère enchantée', 'Armure lourde enchantée', 'Bouclier léger enchanté', 'Bouclier lourd enchanté'];

        if(!in_array($characterItem->getItem()->getType(), $bonusTypes) || in_array($characterItem->getItem()->getCategory()->getSlug(), ['potion', 'parchemin'])) {
            return;
        }

        $amount = $characterItem->getItem()->getAmount();
        $target = $characterItem->getItem()->getTarget();

        if($target === 'health') {
            $character->setHealth($character->getHealth() + ($add ? $amount : -$amount));
        } else if($target === 'mana') {
            $character->setMana($character->getMana() + ($add ? $amount : -$amount));
        }

        $this->entityManager->persist($character);
    }

    public function useItem(Character $character, CharacterItem $characterItem): void
    {
        $category = $characterItem->getItem()->getCategory()->getSlug();
        if(!in_array($category, ['potion', 'nourriture'])) {
            return;
        }

        $amount = $characterItem->getItem()->getAmount();
        $target = $characterItem->getItem()->getTarget();

        if($target === 'health') {
            $character->setHealth(min($character->getHealth() + $amount, $character->getHealthMax()));
        } else if($target === 'mana') {
            $character->setMana(min($character->getMana() + $amount, $character->getManaMax()));
        }

        $this->entityManager->persist($character);
        $this->entityManager->remove($characterItem);
    }

    public function canSellItem(PlayerCharacter $playerCharacter, CharacterItem|PlayerCharacterItem $characterItem): bool
    {
        if($playerCharacter->getFortune() >= $this->tradeService->getItemPrice($playerCharacter, $characterItem, 'sell')) {
            return true;
        }

        return false;
    }

    public function canBuyItem(PlayerCharacter $playerCharacter, CharacterItem|PlayerCharacterItem $characterItem): bool
    {
        if($playerCharacter->getPlayer()->getFortune() >= $this->tradeService->getItemPrice($playerCharacter, $characterItem)) {
            return true;
        }

        return false;
    }

    public function canRepairItem(PlayerCharacter $playerCharacter, CharacterItem|PlayerCharacterItem $characterItem): bool
    {
        if($playerCharacter->getPlayer()->getFortune() >= $this->tradeService->getItemPrice($playerCharacter, $characterItem, 'repair')) {
            return true;
        }

        return false;
    }

    public function canReloadItem(PlayerCharacter $playerCharacter, CharacterItem|PlayerCharacterItem $characterItem): bool
    {
        if($playerCharacter->getPlayer()->getFortune() >= $this->tradeService->getItemPrice($playerCharacter, $characterItem, 'reload')) {
            return true;
        }

        return false;
    }
}
