<?php

namespace App\Service\Character;

use App\Entity\Character\Character;
use App\Service\Combat\Effect\CombatEffectService;
use App\Service\Item\CharacterItemService;

readonly class CharacterBonusService
{
    public function __construct(private CharacterItemService $characterItemService,
                                private CombatEffectService  $combatEffectService)
    {
    }

    public function getDamage(Character $character, string $screenType = null): array
    {
        $bonus = [
            'amount' => 0,
            'extra' => false,
            'magical' => false,
        ];

        // Récupération des bonus offensifs via les armes et équipements
        $equippedWeapons = $this->characterItemService->getEquippedWeapons($character);
        foreach($equippedWeapons as $equippedWeapon) {
            $bonus['amount'] += $equippedWeapon->getHealth() <= 0 ? 1 : $equippedWeapon->getItem()->getDamage();
            if($equippedWeapon->getItem()->getTarget() === 'damage') {
                $bonus['amount'] += $equippedWeapon->getItem()->getAmount();
            }
        }

        $equippedMagicalWeapons = $this->characterItemService->getEquippedWeapons($character, true);
        foreach($equippedMagicalWeapons as $equippedMagicalWeapon) {
            $bonus['amount'] += $equippedMagicalWeapon->getItem()->getAmount();
            $bonus['magical'] = true;
        }

        $equippedItems = $this->characterItemService->getEquippedBonus($character, 'offensive', 'damage');
        foreach($equippedItems as $equippedItem) {
            $bonus['amount'] += $equippedItem->getItem()->getAmount();
            $bonus['extra'] = true;
        }

        // Ajouter les effets temporaires de combat (si on est en combat)
        if($screenType === 'Combat') {
            $combatEffects = $this->combatEffectService->getActiveCombatEffects($character);
            foreach($combatEffects as $effect) {
                if($effect->getTarget() === 'damage') {
                    $bonus['amount'] += $effect->getAmount();
                    $bonus['extra'] = true;
                }
            }
        }

        return $bonus;
    }

    public function getDefense(Character $character, string $screenType = null): array
    {
        $bonus = [
            'amount' => 0,
            'extra' => false,
        ];

        // Récupération des bonus défensifs via les armures et équipements
        $equippedArmors = $this->characterItemService->getEquippedArmors($character);
        foreach($equippedArmors as $equippedArmor) {
            $bonus['amount'] += $equippedArmor->getHealth() <= 0 ? 1 : $equippedArmor->getItem()->getDefense();
        }

        $equippedItems = $this->characterItemService->getEquippedBonus($character, 'defensive', 'defense');
        foreach($equippedItems as $equippedItem) {
            $bonus['amount'] += $equippedItem->getItem()->getAmount();
            $bonus['extra'] = true;
        }

        // Ajouter les effets temporaires de combat (si on est en combat)
        if($screenType === 'Combat') {
            $combatEffects = $this->combatEffectService->getActiveCombatEffects($character);
            foreach($combatEffects as $effect) {
                if($effect->getTarget() === 'defense') {
                    $bonus['amount'] += $effect->getAmount();
                    $bonus['extra'] = true;
                }
            }
        }

        return $bonus;
    }

    public function getHealth(Character $character): array
    {
        $bonus = [
            'amount' => 0,
            'extra' => false,
        ];

        $equippedItems = $this->characterItemService->getEquippedBonus($character, 'defensive', 'health');
        foreach($equippedItems as $equippedItem) {
            $bonus['amount'] += $equippedItem->getItem()->getAmount();
            $bonus['extra'] = true;
        }

        return $bonus;
    }

    public function getMana(Character $character): array
    {
        $bonus = [
            'amount' => 0,
            'extra' => false,
        ];

        $equippedItems = $this->characterItemService->getEquippedBonus($character, 'defensive', 'mana');
        foreach($equippedItems as $equippedItem) {
            $bonus['amount'] += $equippedItem->getItem()->getAmount();
            $bonus['extra'] = true;
        }

        return $bonus;
    }
}
