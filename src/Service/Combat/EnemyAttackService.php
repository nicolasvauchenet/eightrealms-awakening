<?php

namespace App\Service\Combat;

use App\Entity\Character\Character;
use App\Entity\Character\Player;
use App\Entity\Combat\PlayerCombat;
use App\Entity\Combat\PlayerCombatEnemy;
use App\Service\Combat\Helper\AttackHelperService;
use App\Service\Combat\Helper\DiceRollerHelperService;
use App\Service\Combat\Helper\DamageCalculatorHelperService;
use App\Service\Combat\Effect\CombatEffectService;
use App\Service\Combat\Helper\DurabilityHelperService;
use Doctrine\ORM\EntityManagerInterface;

readonly class EnemyAttackService
{
    public function __construct(
        private EntityManagerInterface        $entityManager,
        private AttackHelperService           $attackHelper,
        private CombatEffectService           $combatEffectService,
        private DiceRollerHelperService       $diceRollerHelperService,
        private DamageCalculatorHelperService $damageCalculatorHelperService,
        private DurabilityHelperService       $durabilityHelperService,
    )
    {
    }

    public function enemyAttack(PlayerCombat $playerCombat, int $enemyId): string
    {
        $enemyInstance = $this->getEnemyInstance($playerCombat, $enemyId);
        if(!$enemyInstance || $enemyInstance->getHealth() <= 0) {
            return '';
        }

        $enemy = $enemyInstance->getEnemy();
        $player = $playerCombat->getPlayer();
        $playerEffects = $this->combatEffectService->getActiveBonuses($playerCombat);
        $equipped = $this->attackHelper->getCharacterItemService()->getEquippedItems($enemy);

        if($this->getPlayerInvisibility($playerEffects)) {
            return "<span class='text-info'>Vous êtes invisible. {$enemy->getName()} {$enemyInstance->getPosition()} ne vous voit pas et rate son attaque.</span><br/>";
        }

        return $this->handleClassicalWeaponAttack($playerCombat, $equipped, $enemy, $player, $enemyInstance);
    }

    private function handleClassicalWeaponAttack(PlayerCombat $playerCombat, array $equipped, Character $enemy, Player $player, PlayerCombatEnemy $enemyInstance): string
    {
        $hasRight = !empty($equipped['righthand']);
        $hasLeft = !empty($equipped['lefthand']);

        if($hasRight && $hasLeft) {
            $attackMode = ['righthand', 'lefthand', 'twohands'][random_int(0, 2)];
        } else if($hasRight) {
            $attackMode = 'righthand';
        } else if($hasLeft) {
            $attackMode = 'lefthand';
        } else {
            return "<span class='text-info'>{$enemy->getName()} {$enemyInstance->getPosition()} n’a pas d’arme pour attaquer.</span><br/>";
        }

        if($attackMode === 'twohands') {
            $weaponsData = $this->attackHelper->resolveWeapons($enemy);
            $weaponNames = $weaponsData['weaponNames'];
            $damages = $weaponsData['damages'];
            $hasMagicWeaponBonus = $weaponsData['hasMagicWeaponBonus'];

            $weaponName = implode(' et ', $weaponNames);
            $baseDamage = array_sum($damages);
        } else {
            [$weaponName, $baseDamage, , $hasMagicWeaponBonus] = $this->attackHelper->resolveSingleWeapon($enemy, $attackMode);
        }

        $equippedItemsPlayer = $this->attackHelper->getCharacterItemService()->getEquippedItems($player);

        $attackRoll = $this->diceRollerHelperService->rollDice(20, $enemy->getDexterity());
        $defenseRoll = $this->diceRollerHelperService->rollDice(20, $player->getDexterity());

        $logs = [];

        if($attackRoll['isCriticalSuccess'] && $defenseRoll['isCriticalSuccess']) {
            $criticalLogs = $this->durabilityHelperService->handleCriticalHitDamage(
                attackerWeapon: null,
                defenderEquipments: $equippedItemsPlayer,
                defenseIsCritical: true
            );
            $logs = array_merge($logs, $criticalLogs);

            return "<span class='text-warning'>Un choc brutal se produit entre l'attaque de {$enemy->getName()} et votre défense. Les équipements sont mis à rude épreuve !</span><br/>" . implode('', $logs);
        }

        if($attackRoll['isCriticalSuccess'] || $attackRoll['total'] > $defenseRoll['total']) {
            $totalDamage = $this->damageCalculatorHelperService->calculatePhysicalDamage(
                attacker: $enemy,
                defender: $player,
                playerCombat: $playerCombat,
                baseDamage: $baseDamage,
                hasMagicWeaponBonus: $hasMagicWeaponBonus,
                isCritical: $attackRoll['isCriticalSuccess']
            );

            $player->setHealth(max(0, $player->getHealth() - $totalDamage));
            $this->entityManager->persist($player);
            $this->entityManager->flush();

            if($attackRoll['isCriticalSuccess']) {
                $criticalLogs = $this->durabilityHelperService->handleCriticalHitDamage(
                    attackerWeapon: null,
                    defenderEquipments: $equippedItemsPlayer,
                    defenseIsCritical: false
                );
                $logs = array_merge($logs, $criticalLogs);
            }

            return $this->attackHelper->generateAttackLog(
                    target: $enemyInstance,
                    weaponName: $weaponName,
                    damage: $totalDamage,
                    bonusText: '',
                    hasMagicWeaponBonus: $hasMagicWeaponBonus,
                    isPlayer: false,
                    isCriticalSuccess: $attackRoll['isCriticalSuccess']
                ) . implode('', $logs);
        }

        return $this->attackHelper->generateAttackFailLog($enemyInstance, false);
    }

    private function getEnemyInstance(PlayerCombat $playerCombat, int $enemyId): PlayerCombatEnemy
    {
        return $playerCombat->getPlayerCombatEnemies()->filter(
            fn($e) => $e->getId() === $enemyId
        )->first();
    }

    private function getPlayerInvisibility(array $playerEffects): bool
    {
        return !empty($playerEffects['invisibility']);
    }
}
