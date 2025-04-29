<?php

namespace App\Service\Combat\Helper;

use App\Entity\Combat\PlayerCombat;
use App\Service\Character\CharacterBonusService;
use App\Entity\Character\Character;

readonly class DamageCalculatorHelperService
{
    public function __construct(
        private CharacterBonusService $characterBonusService
    )
    {
    }

    public function calculatePhysicalDamage(Character $attacker, Character $defender, PlayerCombat $playerCombat, int $baseDamage, bool $hasMagicWeaponBonus = false, bool $isCritical = false): int
    {
        // Bonus de force
        $strengthBonus = $this->calculateStrengthBonus($attacker->getStrength());

        // Bonus de défense de la cible
        $defenseBonus = $this->characterBonusService->getDefense($defender, $playerCombat, 'combat')['amount'];
        $constitutionBonus = $this->calculateConstitutionBonus($defender->getConstitution());

        // Calcul brut
        $damage = $baseDamage + $strengthBonus;

        // S'il y a un bonus magique sur une arme classique, il ne subit pas la réduction
        if($hasMagicWeaponBonus) {
            $damageWithoutReduction = $damage;
            $damage = max(0, ($damage - $defenseBonus - $constitutionBonus));
            $damage += ($damageWithoutReduction - ($damageWithoutReduction - $defenseBonus - $constitutionBonus));
        } else {
            $damage = max(0, $damage - $defenseBonus - $constitutionBonus);
        }

        // Coup critique => double dégâts
        if($isCritical) {
            $damage *= 2;
        }

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
        // Dégâts à 75% sur les cibles secondaires
        if($areaSize <= 1) {
            return $baseAmount;
        }

        return max(1, (int)floor($baseAmount * 0.75));
    }

    public function calculateStrengthBonus(int $strength): int
    {
        return (int)floor($strength / 5); // Exemple : 1 bonus tous les 5 points de force
    }

    public function calculateConstitutionBonus(int $constitution): int
    {
        return (int)floor($constitution / 5); // Exemple : 1 réduction tous les 5 points de constitution
    }
}
