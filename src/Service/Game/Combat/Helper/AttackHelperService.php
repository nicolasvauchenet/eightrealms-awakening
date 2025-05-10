<?php

namespace App\Service\Game\Combat\Helper;

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

        $names = [];
        $damages = [];
        $hasMagicWeaponBonus = false;

        foreach(['righthand', 'lefthand'] as $hand) {
            if(!isset($equipped[$hand])) {
                continue;
            }

            $characterItem = $equipped[$hand];
            $item = $characterItem->getItem();
            $name = $character instanceof Player ? 'votre ' . $item->getName() : 'de ' . $item->getName();
            $names[] = $name;

            if($characterItem->getHealth() <= 0) {
                $damage = 1;
            } else if($isMagicalWeapon || $item->getCategory()?->getSlug() === 'arme-magique') {
                $damage = $item->getAmount() ?? 0;
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
            }

            $damages[] = $damage;
        }

        if(empty($names)) {
            $names[] = $character instanceof Player ? 'vos poings' : 'de ses griffes';
            $damages[] = 1;
        }

        return [
            'weaponNames' => $names,
            'damages' => $damages,
            'hasMagicWeaponBonus' => $hasMagicWeaponBonus,
        ];
    }

    public function resolveSingleWeapon(Character $character, string $slot): array
    {
        $equipped = $this->characterItemService->getEquippedItems($character);

        $weaponName = $character instanceof Player ? 'vos poings' : 'de griffes';
        $baseDamage = 1;
        $isMagical = false;
        $hasMagicWeaponBonus = false;

        if(!empty($equipped[$slot])) {
            $characterItem = $equipped[$slot];
            $item = $characterItem->getItem();
            $weaponName = $character instanceof Player
                ? 'votre ' . $item->getName()
                : 'de ' . $item->getName();

            if($characterItem->getHealth() <= 0) {
                $baseDamage = 1;
            } else if($item->getCategory()?->getSlug() === 'arme-magique') {
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

    public function getCharacterItemService(): CharacterItemService
    {
        return $this->characterItemService;
    }

    public function generateAttackLog(
        PlayerCombatEnemy $target,
        string            $targetName,
        string            $weaponName,
        int               $damage,
        string            $bonusText,
        bool              $hasMagicWeaponBonus,
        bool              $isPlayer,
        ?string           $handUsed = null,
        bool              $isCriticalSuccess = false
    ): string
    {
        $handText = '';

        if($handUsed) {
            $handText = ' avec votre ' . ($handUsed === 'righthand' ? 'main droite' : 'main gauche');
        }

        $criticalText = '';
        if($isCriticalSuccess) {
            $criticalText = "<strong class='text-danger'>Coup critique&nbsp;!</strong><br/>";
        }

        $log = $isPlayer
            ? "$criticalText<span class='text-success'>Vous attaquez $targetName avec $weaponName$handText et lui infligez $damage point" . ($damage > 1 ? 's' : '') . " de dégâts&nbsp;!</span><br/>"
            : "$criticalText<span class='text-warning'>$targetName vous attaque à coups $weaponName et vous inflige $damage point" . ($damage > 1 ? 's' : '') . " de dégâts&nbsp;!</span><br/>";

        if($hasMagicWeaponBonus) {
            $log .= $isPlayer
                ? "<small class='text-info'>(Bonus magique appliqué par votre arme enchantée)</small><br/>"
                : "<small class='text-info'>(Bonus magique appliqué par son arme enchantée)</small><br/>";
        }

        $log .= $bonusText;

        if($isPlayer && $target->getHealth() <= 0) {
            $log .= "<strong class='text-success'>$targetName est vaincu&nbsp;!</strong><br/>";
        }

        return $log;
    }

    public function generateAttackFailLog(PlayerCombatEnemy $target, string $targetName, bool $isPlayer, ?string $handUsed = null): string
    {
        $name = $target->getEnemy()->getName();
        $position = $target->getPosition();
        $handText = '';

        if($handUsed) {
            $handText = ' avec votre ' . ($handUsed === 'righthand' ? 'main droite' : 'main gauche');
        }

        return $isPlayer
            ? "<span class='text-warning'>Votre attaque$handText échoue contre $targetName.</span><br/>"
            : "<span class='text-warning'>$targetName rate son attaque$handText contre vous.</span><br/>";
    }
}
