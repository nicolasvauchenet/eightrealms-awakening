<?php

namespace App\Service\Game\Combat;

use App\Entity\Character\Player;
use App\Entity\Combat\Combat;
use App\Entity\Combat\PlayerCombat;
use App\Entity\Combat\PlayerCombatEnemy;
use App\Service\Game\Combat\Effect\CombatEffectService;
use App\Service\Game\Combat\Helper\AreaEffectHelperService;
use App\Service\Game\Combat\Helper\AttackHelperService;
use App\Service\Game\Combat\Helper\DamageCalculatorHelperService;
use App\Service\Game\Combat\Helper\DiceRollerHelperService;
use App\Service\Game\Combat\Helper\DurabilityHelperService;
use App\Service\Game\Combat\Helper\EnemyLabelHelperService;
use Doctrine\ORM\EntityManagerInterface;
use Random\RandomException;

readonly class PlayerAttackService
{
    public function __construct(
        private EntityManagerInterface        $entityManager,
        private AttackHelperService           $attackHelper,
        private CombatEffectService           $combatEffectService,
        private AreaEffectHelperService       $areaEffectHelper,
        private DiceRollerHelperService       $diceRollerHelperService,
        private DamageCalculatorHelperService $damageCalculatorHelperService,
        private DurabilityHelperService       $durabilityHelperService,
        private EnemyLabelHelperService       $enemyLabelHelperService,
    )
    {
    }

    public function playerAttack(Player $player, Combat $combat, int $enemyId, string $mode): string
    {
        $playerCombat = $this->getPlayerCombat($player, $combat);
        $target = $this->getTarget($playerCombat, $enemyId);
        $targetName = $this->enemyLabelHelperService->getDisplayName($target);

        $targetEffects = $this->combatEffectService->getActiveBonusesForTarget($playerCombat, $target->getEnemy());
        if(!empty($targetEffects['invisibility'])) {
            return "<span class='text-info'>$targetName est invisible. Vous ratez votre attaque.</span><br/>";
        }

        if($mode === 'twohands') {
            return $this->handleTwoWeaponsAttack($player, $combat, $enemyId, $target);
        }

        $playerEffects = $this->combatEffectService->getActiveBonusesForTarget($playerCombat, $player);
        if(!empty($playerEffects['charmed'])) {
            return "<span class='text-warning'>Vous êtes charmé(e) et incapable d’attaquer ce tour-ci.</span><br/>";
        }

        return $this->handleSingleWeaponAttack($player, $target, $playerCombat, $mode, $playerEffects, $targetEffects);
    }

    /**
     * @throws RandomException
     */
    private function handleSingleWeaponAttack(Player $player, PlayerCombatEnemy $target, PlayerCombat $playerCombat, string $mode, array $playerEffects, array $targetEffects): string
    {
        $equippedItems = $this->attackHelper->getCharacterItemService()->getEquippedItems($player);
        $characterItem = $equippedItems[$mode] ?? null;
        $item = $characterItem?->getItem();
        $targetName = $this->enemyLabelHelperService->getDisplayName($target);

        if($item && $item->getCategory()?->getSlug() === 'arme-magique') {
            return $this->handleMagicalAttack($player, $target, $characterItem, $item, $mode);
        }

        [$weaponName, $baseDamage, , $hasMagicWeaponBonus] = $this->attackHelper->resolveSingleWeapon($player, $mode);

        $attackRoll = $this->diceRollerHelperService->rollDice(20, $player->getDexterity() + ($mode === 'lefthand' ? -2 : 0));
        $defenseRoll = $this->diceRollerHelperService->rollDice(20, $target->getEnemy()->getDexterity());

        $logs = [];

        if($attackRoll['isCriticalSuccess'] && $defenseRoll['isCriticalSuccess']) {
            $criticalLogs = $this->durabilityHelperService->handleCriticalHitDamage(
                attackerWeapon: $characterItem,
                defenderEquipments: $this->attackHelper->getCharacterItemService()->getEquippedItems($target->getEnemy()),
                defenseIsCritical: true
            );
            $logs = array_merge($logs, $criticalLogs);

            return "<span class='text-warning'>Un choc titanesque se produit entre votre arme et celle de $targetName&nbsp;! Personne ne touche, mais les équipements souffrent.</span><br/>" . implode('', $logs);
        }

        if($attackRoll['isCriticalSuccess'] || $attackRoll['total'] > $defenseRoll['total']) {
            $totalDamage = $this->damageCalculatorHelperService->calculatePhysicalDamage(
                attacker: $player,
                defender: $target->getEnemy(),
                playerCombat: $playerCombat,
                baseDamage: $baseDamage,
                hasMagicWeaponBonus: $hasMagicWeaponBonus,
                isCritical: $attackRoll['isCriticalSuccess']
            );

            $target->setHealth(max(0, $target->getHealth() - $totalDamage));
            $this->entityManager->persist($target);
            $this->entityManager->flush();

            if($characterItem) {
                $weaponLog = $this->durabilityHelperService->handleWeaponUsage($characterItem);
                if($weaponLog) {
                    $logs[] = $weaponLog;
                }
            }

            $attackLog = $this->attackHelper->generateAttackLog(
                target: $target,
                targetName: $targetName,
                weaponName: $weaponName,
                damage: $totalDamage,
                bonusText: '',
                hasMagicWeaponBonus: $hasMagicWeaponBonus,
                isPlayer: true,
                handUsed: $mode,
                isCriticalSuccess: $attackRoll['isCriticalSuccess']
            );

            return $attackLog . implode('', $logs);
        }

        return $this->attackHelper->generateAttackFailLog($target, $targetName, true, $mode);
    }

    private function handleTwoWeaponsAttack(Player $player, Combat $combat, int $enemyId, PlayerCombatEnemy $target): string
    {
        $equippedItems = $this->attackHelper->getCharacterItemService()->getEquippedItems($player);
        $targetName = $this->enemyLabelHelperService->getDisplayName($target);
        $logs = [];

        foreach(['righthand', 'lefthand'] as $hand) {
            $characterItem = $equippedItems[$hand] ?? null;
            if(!$characterItem) {
                continue;
            }

            $item = $characterItem->getItem();

            if($item->getCategory()?->getSlug() === 'arme-magique') {
                $logs[] = $this->handleMagicalAttack($player, $target, $characterItem, $item, $hand);
                continue;
            }

            $playerCombat = $this->getPlayerCombat($player, $combat);

            [$weaponName, $baseDamage, , $hasMagicWeaponBonus] = $this->attackHelper->resolveSingleWeapon($player, $hand);

            $attackRoll = $this->diceRollerHelperService->rollDice(20, $player->getDexterity() + ($hand === 'lefthand' ? -2 : 0));
            $defenseRoll = $this->diceRollerHelperService->rollDice(20, $target->getEnemy()->getDexterity());

            $subLogs = [];

            if($attackRoll['isCriticalSuccess'] && $defenseRoll['isCriticalSuccess']) {
                $criticalLogs = $this->durabilityHelperService->handleCriticalHitDamage(
                    attackerWeapon: $characterItem,
                    defenderEquipments: [],
                    defenseIsCritical: true
                );
                $subLogs = array_merge($subLogs, $criticalLogs);

                $logs[] = "<span class='text-warning'>Un choc brutal se produit entre votre arme de la " . ($hand === 'righthand' ? 'main droite' : 'main gauche') . " et celle de $targetName&nbsp;!</span><br/>" . implode('', $subLogs);
                continue;
            }

            if($attackRoll['isCriticalSuccess'] || $attackRoll['total'] > $defenseRoll['total']) {
                $totalDamage = $this->damageCalculatorHelperService->calculatePhysicalDamage(
                    attacker: $player,
                    defender: $target->getEnemy(),
                    playerCombat: $playerCombat,
                    baseDamage: $baseDamage,
                    hasMagicWeaponBonus: $hasMagicWeaponBonus,
                    isCritical: $attackRoll['isCriticalSuccess']
                );

                $target->setHealth(max(0, $target->getHealth() - $totalDamage));
                $this->entityManager->persist($target);
                $this->entityManager->flush();

                if($characterItem) {
                    $weaponLog = $this->durabilityHelperService->handleWeaponUsage($characterItem);
                    if($weaponLog) {
                        $subLogs[] = $weaponLog;
                    }
                }

                $logs[] = $this->attackHelper->generateAttackLog(
                        target: $target,
                        targetName: $targetName,
                        weaponName: $weaponName,
                        damage: $totalDamage,
                        bonusText: '',
                        hasMagicWeaponBonus: $hasMagicWeaponBonus,
                        isPlayer: true,
                        handUsed: $hand,
                        isCriticalSuccess: $attackRoll['isCriticalSuccess']
                    ) . implode('', $subLogs);

                if($target->getHealth() <= 0) {
                    break;
                }
            } else {
                $logs[] = $this->attackHelper->generateAttackFailLog($target, $targetName, true, $hand);
            }
        }

        return implode('', $logs);
    }

    private function handleMagicalAttack(Player $player, PlayerCombatEnemy $target, $characterItem, $item, string $hand): string
    {
        if($characterItem->getCharge() <= 0) {
            return "<span class='text-warning'>L’arme magique <strong>{$item->getName()}</strong> n’a plus de charge.</span><br/>";
        }

        $characterItem->setCharge($characterItem->getCharge() - 1);
        $this->entityManager->persist($characterItem);

        $targetName = $this->enemyLabelHelperService->getDisplayName($target);
        $targetStat = $item->getTarget() ?? $item->getEffect();
        $amount = $item->getAmount() ?? 0;
        $area = $item->getArea() ?? 1;

        if(in_array($targetStat, ['health', 'damage'])) {
            $target->setHealth(max(0, $target->getHealth() - $amount));
        } else if($targetStat === 'mana') {
            $target->setMana(max(0, $target->getMana() - $amount));
        }

        $this->entityManager->persist($target);

        $log = "<span class='text-success'>Vous utilisez votre <strong>{$item->getName()}</strong> avec votre " . ($hand === 'righthand' ? 'main droite' : 'main gauche') . " sur $targetName et lui infligez $amount point" . ($amount > 1 ? 's' : '') . " de dégâts.</span><br/>";

        if($target->getHealth() <= 0) {
            $log .= "<strong class='text-success'>$targetName est vaincu&nbsp;!</strong><br/>";
        }

        if($area > 1) {
            $log .= $this->areaEffectHelper->applyAreaEffect($target, $targetStat, $amount, $area);
        }

        $this->entityManager->flush();

        return $log;
    }

    private function getPlayerCombat(Player $player, Combat $combat): PlayerCombat
    {
        return $player->getPlayerCombats()->filter(
            fn($pc) => $pc->getCombat() === $combat
        )->first();
    }

    private function getTarget(PlayerCombat $playerCombat, int $enemyId): PlayerCombatEnemy
    {
        return $playerCombat->getPlayerCombatEnemies()->filter(
            fn($pce) => $pce->getId() === $enemyId
        )->first();
    }
}
