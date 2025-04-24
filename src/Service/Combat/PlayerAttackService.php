<?php

namespace App\Service\Combat;

use App\Entity\Character\Player;
use App\Entity\Combat\Combat;
use App\Service\Combat\Effect\CombatEffectService;
use App\Service\Combat\Helper\AttackHelperService;
use App\Service\Combat\Helper\AreaEffectHelperService;
use Doctrine\ORM\EntityManagerInterface;

readonly class PlayerAttackService
{
    public function __construct(
        private EntityManagerInterface  $entityManager,
        private AttackHelperService     $attackHelper,
        private CombatEffectService     $combatEffectService,
        private AreaEffectHelperService $areaEffectHelper
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

        if(!$target || $target->getHealth() <= 0) {
            return "<span class='text-danger'>Cible invalide.</span><br/>";
        }

        $targetEffects = $this->combatEffectService->getActiveBonuses($playerCombat, $target);

        // Seul un effet d'invisibilité *propre à la cible* empêche l'attaque
        $hasTargetInvisibility = false;
        $targetEffectEntities = $this->combatEffectService->getActiveEffectEntities($playerCombat);
        foreach($targetEffectEntities as $effect) {
            if(
                $effect->getPlayerCombatEnemy() === $target &&
                $effect->getTarget() === 'invisibility'
            ) {
                $hasTargetInvisibility = true;
                break;
            }
        }

        if($hasTargetInvisibility) {
            return "<span class='text-info'>{$target->getEnemy()->getName()} {$target->getPosition()} est invisible. Vous ratez votre attaque.</span><br/>";
        }

        $playerEffects = $this->combatEffectService->getActiveBonuses($playerCombat);

        if($mode === 'twohands') {
            $equipped = $this->attackHelper->getCharacterItemService()->getEquippedItems($player);
            $mainItems = [
                'righthand' => $equipped['righthand'] ?? null,
                'lefthand' => $equipped['lefthand'] ?? null,
            ];

            $allMagical = true;
            $magicalItems = [];

            foreach($mainItems as $hand => $characterItem) {
                $baseItem = $characterItem?->getItem();
                if(!$baseItem || $baseItem->getCategory()?->getSlug() !== 'arme-magique') {
                    $allMagical = false;
                } else {
                    $magicalItems[$hand] = $characterItem;
                }
            }

            if($allMagical) {
                $logs = [];
                foreach(array_keys($mainItems) as $hand) {
                    $logs[] = $this->playerAttack($player, $combat, $enemyId, $hand);
                }

                return implode('', $logs);
            }

            $magicalChargeIssues = [];
            foreach($magicalItems as $characterItem) {
                if($characterItem->getCharge() <= 0) {
                    $magicalChargeIssues[] = "<span class='text-warning'>L’arme magique <strong>{$characterItem->getItem()->getName()}</strong> n’a plus de charge.</span><br/>";
                } else {
                    $characterItem->setCharge($characterItem->getCharge() - 1);
                    $this->entityManager->persist($characterItem);
                }
            }

            if(!empty($magicalChargeIssues)) {
                return implode('', $magicalChargeIssues);
            }

            [$weaponName, $baseDamage, $hasMagicWeaponBonus] = $this->attackHelper->resolveWeapons($player);
            $equipmentBonus = $this->attackHelper->getOffensiveEquipmentBonus($player);
            $bonusDamage = ($playerEffects['damage'] ?? 0);
            $malusDefense = ($targetEffects['defense'] ?? 0) * -1;

            $totalDamage = max(0, $baseDamage + $equipmentBonus['amount'] + $bonusDamage + $malusDefense);
            $target->setHealth(max(0, $target->getHealth() - $totalDamage));
            $this->entityManager->persist($target);

            $log = $this->attackHelper->generateAttackLog(
                target: $target,
                weaponName: $weaponName,
                damage: $totalDamage,
                bonusText: $equipmentBonus['text'],
                hasMagicWeaponBonus: $hasMagicWeaponBonus,
                isPlayer: true
            );

            // Appliquer uniquement les effets de zone des armes magiques
            foreach($magicalItems as $characterItem) {
                $baseItem = $characterItem->getItem();
                $area = $baseItem->getArea() ?? 1;
                $targetStat = $baseItem->getTarget() ?? $baseItem->getEffect();
                $amount = $baseItem->getAmount() ?? 0;

                if($area > 1 && $targetStat) {
                    $log .= $this->areaEffectHelper->applyAreaEffect($target, $targetStat, $amount, $area);
                }
            }

            $this->entityManager->flush();

            return $log;
        }

        // Sinon : mode righthand ou lefthand
        return $this->handleSingleWeaponAttack($player, $playerCombat, $target, $mode, $playerEffects, $targetEffects);
    }

    private function handleSingleWeaponAttack(Player $player, $playerCombat, $target, string $mode, array $playerEffects, array $targetEffects): string
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

            $statName = match ($targetStat) {
                'damage', 'health' => 'dégâts',
                'mana' => 'magie',
                default => $targetStat,
            };

            if($targetStat === 'health' || $targetStat === 'damage') {
                $target->setHealth(max(0, $target->getHealth() - $amount));
            } else if($targetStat === 'mana') {
                $target->setMana(max(0, $target->getMana() - $amount));
            }

            $this->entityManager->persist($target);

            $log = "<span class='text-success'>Vous utilisez <strong>{$item->getName()}</strong> sur {$target->getEnemy()->getName()} {$target->getPosition()} et lui infligez $amount point" . ($amount > 1 ? 's' : '') . " de $statName.</span><br/>";

            if($target->getHealth() <= 0) {
                $log .= "<strong class='text-success'>{$target->getEnemy()->getName()} {$target->getPosition()} est vaincu&nbsp;!</strong><br/>";
            }

            if($area > 1) {
                $log .= $this->areaEffectHelper->applyAreaEffect($target, $targetStat, $amount, $area);
            }

            $this->entityManager->flush();

            return $log;
        }

        // Arme physique classique
        [$weaponName, $baseDamage, , $hasMagicWeaponBonus] = $this->attackHelper->resolveSingleWeapon($player, $mode);
        $equipmentBonus = $this->attackHelper->getOffensiveEquipmentBonus($player);
        $bonusDamage = ($playerEffects['damage'] ?? 0);
        $malusDefense = ($targetEffects['defense'] ?? 0) * -1;

        $totalDamage = max(0, $baseDamage + $equipmentBonus['amount'] + $bonusDamage + $malusDefense);
        $target->setHealth(max(0, $target->getHealth() - $totalDamage));
        $this->entityManager->persist($target);
        $this->entityManager->flush();

        return $this->attackHelper->generateAttackLog(
            target: $target,
            weaponName: $weaponName,
            damage: $totalDamage,
            bonusText: $equipmentBonus['text'],
            hasMagicWeaponBonus: $hasMagicWeaponBonus,
            isPlayer: true
        );
    }
}
