<?php

namespace App\Service\Combat;

use App\Entity\Character\Player;
use App\Entity\Combat\Combat;
use App\Entity\Combat\PlayerCombat;
use App\Entity\Combat\PlayerCombatEnemy;
use App\Service\Combat\Effect\CombatEffectService;
use App\Service\Combat\Helper\AttackHelperService;
use App\Service\Combat\Helper\AreaEffectHelperService;
use App\Service\Combat\Helper\DiceRollerHelperService;
use Doctrine\ORM\EntityManagerInterface;

readonly class PlayerAttackService
{
    public function __construct(
        private EntityManagerInterface  $entityManager,
        private AttackHelperService     $attackHelper,
        private CombatEffectService     $combatEffectService,
        private AreaEffectHelperService $areaEffectHelper,
        private DiceRollerHelperService $diceRollerHelperService
    )
    {
    }

    public function playerAttack(Player $player, Combat $combat, int $enemyId, string $mode): string
    {
        $playerCombat = $this->getPlayerCombat($player, $combat);
        $target = $this->getTarget($playerCombat, $enemyId);
        $targetEffects = $this->combatEffectService->getActiveBonuses($playerCombat, $target);

        if($this->getTargetInvisibility($playerCombat)) {
            return "<span class='text-info'>{$target->getEnemy()->getName()} {$target->getPosition()} est invisible. Vous ratez votre attaque.</span><br/>";
        }

        $playerEffects = $this->combatEffectService->getActiveBonuses($playerCombat);

        if($mode === 'twohands') {
            return $this->handleTwoWeaponsAttack($player, $combat, $enemyId, $target);
        }

        return $this->handleSingleWeaponAttack($player, $target, $mode, $playerEffects, $targetEffects);
    }

    private function handleSingleWeaponAttack(Player $player, PlayerCombatEnemy $target, string $mode, array $playerEffects, array $targetEffects): string
    {
        $equippedItems = $this->attackHelper->getCharacterItemService()->getEquippedItems($player);
        $characterItem = $equippedItems[$mode] ?? null;
        $item = $characterItem?->getItem();

        if($item && $item->getCategory()?->getSlug() === 'arme-magique') {
            if($characterItem->getCharge() <= 0) {
                return "<span class='text-warning'>L’arme magique <strong>{$item->getName()}</strong> n’a plus de charge.</span><br/>";
            }

            $characterItem->setCharge($characterItem->getCharge() - 1);
            $this->entityManager->persist($characterItem);

            $targetStat = $item->getTarget() ?? $item->getEffect();
            $amount = $item->getAmount() ?? 0;
            $area = $item->getArea() ?? 1;

            if(in_array($targetStat, ['health', 'damage'])) {
                $target->setHealth(max(0, $target->getHealth() - $amount));
            } else if($targetStat === 'mana') {
                $target->setMana(max(0, $target->getMana() - $amount));
            }

            $this->entityManager->persist($target);

            $log = "<span class='text-success'>Vous utilisez votre <strong>{$item->getName()}</strong> sur {$target->getEnemy()->getName()} {$target->getPosition()} et lui infligez $amount point" . ($amount > 1 ? 's' : '') . " de dégâts.</span><br/>";

            if($target->getHealth() <= 0) {
                $log .= "<strong class='text-success'>{$target->getEnemy()->getName()} {$target->getPosition()} est vaincu&nbsp;!</strong><br/>";
            }

            if($area > 1) {
                $log .= $this->areaEffectHelper->applyAreaEffect($target, $targetStat, $amount, $area);
            }

            $this->entityManager->flush();

            return $log;
        }

        [$weaponName, $baseDamage, , $hasMagicWeaponBonus] = $this->attackHelper->resolveSingleWeapon($player, $mode);
        $equipmentBonus = $this->attackHelper->getOffensiveEquipmentBonus($player);
        $bonusDamage = ($playerEffects['damage'] ?? 0);
        $malusDefense = ($targetEffects['defense'] ?? 0) * -1;

        $attackerDexBonus = $player->getDexterity();
        $defenderDexBonus = $target->getEnemy()->getDexterity();

        if($mode === 'lefthand') {
            $attackerDexBonus -= 2;
        }

        $attackRoll = $this->diceRollerHelperService->rollDice(20, $attackerDexBonus);
        $defenseRoll = $this->diceRollerHelperService->rollDice(20, $defenderDexBonus);

        if($attackRoll['isCriticalSuccess'] && $defenseRoll['isCriticalSuccess']) {
            return "<span class='text-warning'>Un choc titanesque se produit entre votre arme et celle de {$target->getEnemy()->getName()} ! Aucune attaque ne passe, mais vos équipements subissent des dégâts.</span><br/>";
        }

        if($attackRoll['isCriticalSuccess'] || $attackRoll['total'] > $defenseRoll['total']) {
            $totalDamage = $baseDamage + $equipmentBonus['amount'] + $bonusDamage + $malusDefense;
            if($attackRoll['isCriticalSuccess']) {
                $totalDamage *= 2;
            }
            $totalDamage = max(0, $totalDamage);

            $target->setHealth(max(0, $target->getHealth() - $totalDamage));
            $this->entityManager->persist($target);
            $this->entityManager->flush();

            return $this->attackHelper->generateAttackLog(
                target: $target,
                weaponName: $weaponName,
                damage: $totalDamage,
                bonusText: $equipmentBonus['text'],
                hasMagicWeaponBonus: $hasMagicWeaponBonus,
                isPlayer: true,
                handUsed: $mode,
                isCriticalSuccess: $attackRoll['isCriticalSuccess']
            );
        }

        return $this->attackHelper->generateAttackFailLog($target, true, $mode);
    }

    private function handleTwoWeaponsAttack(Player $player, Combat $combat, int $enemyId, PlayerCombatEnemy $target): string
    {
        $equippedItems = $this->attackHelper->getCharacterItemService()->getEquippedItems($player);

        $mainItems = [
            'righthand' => $equippedItems['righthand'] ?? null,
            'lefthand' => $equippedItems['lefthand'] ?? null,
        ];

        $logs = [];

        foreach(['righthand', 'lefthand'] as $hand) {
            $characterItem = $mainItems[$hand];
            if(!$characterItem) {
                continue;
            }

            $item = $characterItem->getItem();

            if($item->getCategory()?->getSlug() === 'arme-magique') {
                if($characterItem->getCharge() <= 0) {
                    $logs[] = "<span class='text-warning'>L’arme magique <strong>{$item->getName()}</strong> n’a plus de charge.</span><br/>";
                    continue;
                }

                $characterItem->setCharge($characterItem->getCharge() - 1);
                $this->entityManager->persist($characterItem);

                $targetStat = $item->getTarget() ?? $item->getEffect();
                $amount = $item->getAmount() ?? 0;
                $area = $item->getArea() ?? 1;

                if(in_array($targetStat, ['health', 'damage'])) {
                    $target->setHealth(max(0, $target->getHealth() - $amount));
                } else if($targetStat === 'mana') {
                    $target->setMana(max(0, $target->getMana() - $amount));
                }

                $this->entityManager->persist($target);

                $log = "<span class='text-success'>Vous utilisez votre <strong>{$item->getName()}</strong> avec votre " . ($hand === 'righthand' ? 'main droite' : 'main gauche') . " sur {$target->getEnemy()->getName()} {$target->getPosition()} et infligez $amount point" . ($amount > 1 ? 's' : '') . " de dégâts.</span><br/>";

                if($target->getHealth() <= 0) {
                    $log .= "<strong class='text-success'>{$target->getEnemy()->getName()} {$target->getPosition()} est vaincu&nbsp;!</strong><br/>";
                }

                if($area > 1) {
                    $log .= $this->areaEffectHelper->applyAreaEffect($target, $targetStat, $amount, $area);
                }

                $logs[] = $log;
                continue;
            }

            [$weaponName, $baseDamage, , $hasMagicWeaponBonus] = $this->attackHelper->resolveSingleWeapon($player, $hand);
            $equipmentBonus = $this->attackHelper->getOffensiveEquipmentBonus($player);
            $bonusDamage = 0;
            $malusDefense = 0;

            $attackerDexBonus = $player->getDexterity();
            $defenderDexBonus = $target->getEnemy()->getDexterity();

            if($hand === 'lefthand') {
                $attackerDexBonus -= 2;
            }

            $attackRoll = $this->diceRollerHelperService->rollDice(20, $attackerDexBonus);
            $defenseRoll = $this->diceRollerHelperService->rollDice(20, $defenderDexBonus);

            if($attackRoll['isCriticalSuccess'] && $defenseRoll['isCriticalSuccess']) {
                $logs[] = "<span class='text-warning'>Un choc brutal a lieu entre votre arme de la " . ($hand === 'righthand' ? 'main droite' : 'main gauche') . " et {$target->getEnemy()->getName()} {$target->getPosition()}. L'attaque échoue et vos équipements souffrent.</span><br/>";
                continue;
            }

            if($attackRoll['isCriticalSuccess'] || $attackRoll['total'] > $defenseRoll['total']) {
                $totalDamage = $baseDamage + $equipmentBonus['amount'] + $bonusDamage + $malusDefense;
                if($attackRoll['isCriticalSuccess']) {
                    $totalDamage *= 2;
                }
                $totalDamage = max(0, $totalDamage);

                $target->setHealth(max(0, $target->getHealth() - $totalDamage));
                $this->entityManager->persist($target);
                $this->entityManager->flush();

                $logs[] = $this->attackHelper->generateAttackLog(
                    target: $target,
                    weaponName: $weaponName,
                    damage: $totalDamage,
                    bonusText: $equipmentBonus['text'],
                    hasMagicWeaponBonus: $hasMagicWeaponBonus,
                    isPlayer: true,
                    handUsed: $hand,
                    isCriticalSuccess: $attackRoll['isCriticalSuccess']
                );

                if($target->getHealth() <= 0) {
                    break;
                }
            } else {
                $logs[] = $this->attackHelper->generateAttackFailLog($target, true, $hand);
            }
        }

        $this->entityManager->flush();

        return implode('', $logs);
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

    private function getTargetInvisibility(PlayerCombat $playerCombat): bool
    {
        return $playerCombat->getPlayerCombatEffects()->exists(
            fn($effect) => $effect->getEffect()->getSlug() === 'invisibility' && $effect->getTarget() === 'enemy'
        );
    }
}
