<?php

namespace App\Service\Combat;

use App\Entity\Character\Player;
use App\Entity\Combat\Combat;
use Doctrine\ORM\EntityManagerInterface;

readonly class PlayerAttackService
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private AttackHelperService    $attackHelper
    )
    {
    }

    public function playerAttack(Player $player, Combat $combat, int $enemyId, string $mode): string
    {
        $playerCombat = $player->getPlayerCombats()->filter(
            fn($pc) => $pc->getCombat() === $combat
        )->first();

        $target = $playerCombat->getPlayerCombatEnemies()->filter(
            fn($pce) => $pce->getId() === $enemyId
        )->first();

        // Récupération des armes selon le mode (attaque à deux mains gérée ici)
        [$weaponName, $baseDamage, $hasMagicWeaponBonus] = $mode === 'twohands'
            ? $this->attackHelper->resolveWeapons($player)
            : $this->attackHelper->resolveSingleWeapon($player, $mode);

        $bonus = $this->attackHelper->getOffensiveEquipmentBonus($player);
        $totalDamage = $baseDamage + $bonus['amount'];

        $target->setHealth(max(0, $target->getHealth() - $totalDamage));
        $this->entityManager->persist($target);
        $this->entityManager->flush();

        return $this->attackHelper->generateAttackLog(
            target: $target,
            weaponName: $weaponName,
            damage: $totalDamage,
            bonusText: $bonus['text'],
            hasMagicWeaponBonus: $hasMagicWeaponBonus,
            isPlayer: true
        );
    }
}
