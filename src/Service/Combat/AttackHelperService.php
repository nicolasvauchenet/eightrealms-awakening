<?php

namespace App\Service\Combat;

use App\Entity\Character\Character;
use App\Entity\Character\Player;
use App\Entity\Combat\PlayerCombatEnemy;
use App\Entity\Item\Weapon;
use App\Service\Item\CharacterItemService;

readonly class AttackHelperService
{
    public function __construct(private CharacterItemService $characterItemService)
    {
    }

    public function resolveWeapons(Character $character): array
    {
        $equipped = $this->characterItemService->getEquippedItems($character);
        $weaponName = 'de griffes';
        $baseDamage = 1;
        $hasMagicWeaponBonus = false;

        $getWeaponDamage = function($item) use (&$hasMagicWeaponBonus): int {
            $damage = $item->getDamage() ?? 1;
            if($item instanceof Weapon && $item->getTarget() === 'damage') {
                $bonus = $item->getAmount() ?? 0;
                if(method_exists($item, 'isMagical') && $item->isMagical() && $bonus > 0) {
                    $hasMagicWeaponBonus = true;
                }
                $damage += $bonus;
            }

            return $damage;
        };

        $damage = 0;
        $names = [];

        foreach(['righthand', 'lefthand'] as $hand) {
            if(!empty($equipped[$hand])) {
                $item = $equipped[$hand]->getItem();
                $damage += $getWeaponDamage($item);
                $names[] = $character instanceof Player ? 'votre ' . $item->getName() : 'de ' . $item->getName();
            }
        }

        if(count($names) > 0) {
            $weaponName = implode(' et ', $names);
            $baseDamage = $damage;
        }

        return [$weaponName, $baseDamage, $hasMagicWeaponBonus];
    }

    public function resolveSingleWeapon(Character $character, string $slot): array
    {
        $equipped = $this->characterItemService->getEquippedItems($character);
        $weaponName = $character instanceof Player ? 'vos poings' : 'de ses griffes';
        $baseDamage = 1;
        $isMagical = false;
        $hasMagicWeaponBonus = false;

        if(!empty($equipped[$slot])) {
            $item = $equipped[$slot]->getItem();
            $weaponName = $character instanceof Player
                ? 'votre ' . $item->getName()
                : 'de ' . $item->getName();

            $baseDamage = $item->getDamage() ?? 1;

            if($item instanceof Weapon && $item->getTarget() === 'damage') {
                $bonus = $item->getAmount() ?? 0;
                if(method_exists($item, 'isMagical') && $item->isMagical() && $bonus > 0) {
                    $hasMagicWeaponBonus = true;
                }
                $baseDamage += $bonus;
            }

            $isMagical = method_exists($item, 'isMagical') && $item->isMagical();
        }

        return [$weaponName, $baseDamage, $isMagical, $hasMagicWeaponBonus];
    }

    public function getOffensiveEquipmentBonus(Character $character): array
    {
        $bonusAmount = 0;
        $bonusText = '';
        $isPlayer = $character instanceof Player;

        $equippedItems = $this->characterItemService->getEquippedBonus($character, 'offensive', 'damage');

        foreach($equippedItems as $equippedItem) {
            $category = $equippedItem->getItem()->getCategory()->getSlug();
            if(!in_array($category, ['arme', 'arme-magique'])) {
                $bonusAmount += $equippedItem->getItem()->getAmount();
            }
        }

        if($bonusAmount > 0) {
            $bonusText = $isPlayer
                ? "<br/><small class='text-info'>(Bonus de dégâts appliqué grâce à vos équipements offensifs)</small>"
                : "<br/><small class='text-info'>(Bonus de dégâts appliqué grâce à ses équipements offensifs)</small>";
        }

        return [
            'amount' => $bonusAmount,
            'text' => $bonusText,
        ];
    }

    public function generateAttackLog(PlayerCombatEnemy $target, string $weaponName, int $damage, string $bonusText, bool $hasMagicWeaponBonus, bool $isPlayer): string
    {
        $name = $target->getEnemy()->getName();
        $position = $target->getPosition();

        $log = $isPlayer
            ? "<span class='text-success'>Vous attaquez $name&nbsp;$position avec $weaponName et lui infligez $damage point" . ($damage > 1 ? 's' : '') . " de dégâts&nbsp;!</span>"
            : "<span class='text-warning'>$name&nbsp;$position vous attaque à coups $weaponName et vous inflige $damage point" . ($damage > 1 ? 's' : '') . " de dégâts&nbsp;!</span>";

        if($hasMagicWeaponBonus) {
            $log .= $isPlayer
                ? "<br/><small class='text-info'>(Bonus magique appliqué par votre arme enchantée)</small>"
                : "<br/><small class='text-info'>(Bonus magique appliqué par son arme enchantée)</small>";
        }

        $log .= $bonusText;

        if($isPlayer && $target->getHealth() <= 0) {
            $log .= "<br/><strong class='text-success'>$name $position est vaincu&nbsp;!</strong>";
        }

        return $log;
    }

    public function getCharacterItemService(): CharacterItemService
    {
        return $this->characterItemService;
    }
}
