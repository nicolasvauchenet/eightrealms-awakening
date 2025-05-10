<?php

namespace App\Service\Game\Combat\Helper;

use App\Entity\Character\Character;
use App\Entity\Combat\PlayerCombat;
use App\Service\Character\CharacterBonusService;

readonly class DamageCalculatorHelperService
{
    public function __construct(
        private CharacterBonusService $characterBonusService
    )
    {
    }

    public function calculatePhysicalDamage(
        Character    $attacker,
        Character    $defender,
        PlayerCombat $playerCombat,
        int          $baseDamage,
        bool         $hasMagicWeaponBonus = false,
        bool         $isCritical = false
    ): int
    {
        $baseDamage = max(1, $baseDamage);

        $strengthBonus = $this->calculateStrengthBonus($attacker->getStrength());
        $defenseBonus = $this->characterBonusService->getDefense($defender, $playerCombat, 'combat')['amount'];
        $constitutionBonus = $this->calculateConstitutionBonus($defender->getConstitution());

        $damage = $baseDamage + $strengthBonus;

        if($isCritical) {
            $damage *= 2;
        }

        $damage = max(0, $damage - $defenseBonus - $constitutionBonus);

        return max(1, $damage);
    }

    public function calculateMagicalDamage(Character $attacker, Character $defender, int $baseDamage, bool $isCritical = false): int
    {
        $constitutionBonus = $this->calculateConstitutionBonus($defender->getConstitution());

        $damage = max(0, $baseDamage - $constitutionBonus);

        if($isCritical) {
            $damage *= 2;
        }

        return max(1, $damage);
    }

    public function calculateAreaDamage(int $baseAmount, int $areaSize): int
    {
        if($areaSize <= 1) {
            return $baseAmount;
        }

        return max(1, (int)floor($baseAmount * 0.75));
    }

    public function calculateStrengthBonus(int $strength): int
    {
        return (int)floor($strength / 5);
    }

    public function calculateConstitutionBonus(int $constitution): int
    {
        return (int)floor($constitution / 5);
    }
}
