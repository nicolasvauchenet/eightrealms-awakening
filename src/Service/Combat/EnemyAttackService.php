<?php

namespace App\Service\Combat;

use App\Entity\Combat\PlayerCombat;
use Doctrine\ORM\EntityManagerInterface;

readonly class EnemyAttackService
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private AttackHelperService    $attackHelper
    )
    {
    }

    public function enemyAttack(PlayerCombat $playerCombat, int $enemyId): string
    {
        $enemyInstance = $playerCombat->getPlayerCombatEnemies()->filter(
            fn($e) => $e->getId() === $enemyId
        )->first();

        if(!$enemyInstance || $enemyInstance->getHealth() <= 0) {
            return '';
        }

        $enemy = $enemyInstance->getEnemy();
        $player = $playerCombat->getPlayer();

        $equipped = $this->attackHelper->getCharacterItemService()->getEquippedItems($enemy);
        $hasTwoWeapons = !empty($equipped['righthand']) && !empty($equipped['lefthand']);

        [$weaponName, $baseDamage, $hasMagicWeaponBonus] = $hasTwoWeapons
            ? $this->attackHelper->resolveWeapons($enemy)
            : $this->attackHelper->resolveSingleWeapon($enemy, !empty($equipped['righthand']) ? 'righthand' : 'lefthand');

        $bonus = $this->attackHelper->getOffensiveEquipmentBonus($enemy);
        $totalDamage = $baseDamage + $bonus['amount'];

        $player->setHealth(max(0, $player->getHealth() - $totalDamage));
        $this->entityManager->persist($player);
        $this->entityManager->flush();

        return $this->attackHelper->generateAttackLog(
            target: $enemyInstance,
            weaponName: $weaponName,
            damage: $totalDamage,
            bonusText: $bonus['text'],
            hasMagicWeaponBonus: $hasMagicWeaponBonus,
            isPlayer: false
        );
    }
}
