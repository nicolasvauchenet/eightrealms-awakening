<?php

namespace App\Service\Combat\Helper;

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

    public function resolveWeapons(Character $character, bool $isMagicalWeapon = false): array
    {
        $equipped = $this->characterItemService->getEquippedItems($character);
        $weaponName = $character instanceof Player ? 'vos poings' : 'de ses griffes';
        $baseDamage = 1;
        $hasMagicWeaponBonus = false;

        $names = [];
        $totalDamage = 0;

        foreach(['righthand', 'lefthand'] as $hand) {
            if(!isset($equipped[$hand])) continue;

            $item = $equipped[$hand]->getItem();
            $name = $character instanceof Player ? 'votre ' . $item->getName() : 'de ' . $item->getName();
            $names[] = $name;

            if($isMagicalWeapon || $item->getCategory()?->getSlug() === 'arme-magique') {
                $totalDamage += $item->getAmount() ?? 0;
                $hasMagicWeaponBonus = true;
            } else {
                $damage = $item->getDamage() ?? 1;
                if($item instanceof Weapon && $item->getTarget() === 'damage') {
                    $bonus = $item->getAmount() ?? 0;
                    $damage += $bonus;
                    if(method_exists($item, 'isMagical') && $item->isMagical() && $bonus > 0) {
                        $hasMagicWeaponBonus = true;
                    }
                }
                $totalDamage += $damage;
            }
        }

        if(!empty($names)) {
            $weaponName = implode(' et ', $names);
            $baseDamage = $totalDamage;
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

            if($item->getCategory()?->getSlug() === 'arme-magique') {
                $baseDamage = $item->getAmount() ?? 0;
                $isMagical = true;
                $hasMagicWeaponBonus = true;
            } else {
                $baseDamage = $item->getDamage() ?? 1;
                if($item instanceof Weapon && $item->getTarget() === 'damage') {
                    $bonus = $item->getAmount() ?? 0;
                    if(method_exists($item, 'isMagical') && $item->isMagical() && $bonus > 0) {
                        $hasMagicWeaponBonus = true;
                    }
                    $baseDamage += $bonus;
                }
            }
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
                ? "<small class='text-info'>(Bonus de dégâts appliqué grâce à vos équipements offensifs)</small><br/>"
                : "<small class='text-info'>(Bonus de dégâts appliqué grâce à ses équipements offensifs)</small><br/>";
        }

        return [
            'amount' => $bonusAmount,
            'text' => $bonusText,
        ];
    }

    public function generateAttackLog(PlayerCombatEnemy $target, string $weaponName, int $damage, string $bonusText, bool $hasMagicWeaponBonus, bool $isPlayer, ?string $handUsed = null, bool $isCriticalSuccess = false): string
    {
        $name = $target->getEnemy()->getName();
        $position = $target->getPosition();
        $handText = '';

        if($handUsed) {
            $handText = 'en ' . ($handUsed === 'righthand' ? 'main droite' : 'main gauche');
        }

        $criticalText = '';
        if ($isCriticalSuccess) {
            $criticalText = "<strong class='text-danger'>Coup critique&nbsp;!</strong><br/>";
        }

        $log = $isPlayer
            ? "$criticalText<span class='text-success'>Vous attaquez $name&nbsp;$position avec $weaponName $handText et lui infligez $damage point" . ($damage > 1 ? 's' : '') . " de dégâts&nbsp;!</span><br/>"
            : "$criticalText<span class='text-warning'>$name&nbsp;$position vous attaque à coups $weaponName et vous inflige $damage point" . ($damage > 1 ? 's' : '') . " de dégâts&nbsp;!</span><br/>";

        if($hasMagicWeaponBonus) {
            $log .= $isPlayer
                ? "<small class='text-info'>(Bonus magique appliqué par votre arme enchantée)</small><br/>"
                : "<small class='text-info'>(Bonus magique appliqué par son arme enchantée)</small><br/>";
        }

        $log .= $bonusText;

        if($isPlayer && $target->getHealth() <= 0) {
            $log .= "<strong class='text-success'>$name $position est vaincu&nbsp;!</strong><br/>";
        }

        return $log;
    }

    public function generateAttackFailLog(PlayerCombatEnemy $target, bool $isPlayer, ?string $handUsed = null): string
    {
        $name = $target->getEnemy()->getName();
        $position = $target->getPosition();
        $handText = '';

        if($handUsed) {
            $handText = ' avec votre ' . ($handUsed === 'righthand' ? 'main droite' : 'main gauche');
        }

        return $isPlayer
            ? "<span class='text-warning'>Votre attaque$handText échoue contre $name $position.</span><br/>"
            : "<span>$name $position rate son attaque$handText contre vous.</span><br/>";
    }

    public function getCharacterItemService(): CharacterItemService
    {
        return $this->characterItemService;
    }
}
