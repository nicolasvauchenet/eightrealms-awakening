<?php

namespace App\Service\Combat;

use App\Entity\Combat\PlayerCombat;
use App\Service\Combat\Helper\AttackHelperService;
use App\Service\Combat\Helper\AreaEffectHelperService;
use App\Service\Combat\Effect\CombatEffectService;
use Doctrine\ORM\EntityManagerInterface;

readonly class EnemyAttackService
{
    public function __construct(
        private EntityManagerInterface  $entityManager,
        private AttackHelperService     $attackHelper,
        private CombatEffectService     $combatEffectService,
        private AreaEffectHelperService $areaEffectHelper
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

        // Vérification de l'invisibilité du joueur
        $playerEffects = $this->combatEffectService->getActiveBonuses($playerCombat);
        if(!empty($playerEffects['invisibility'])) {
            return "<span class='text-info'>Vous êtes invisible. {$enemy->getName()} ne vous voit pas et rate son attaque.</span><br/>";
        }

        $enemyEffects = $this->combatEffectService->getActiveBonuses($playerCombat, $enemyInstance);
        $equipped = $this->attackHelper->getCharacterItemService()->getEquippedItems($enemy);

        $weaponSlot = !empty($equipped['righthand']) ? 'righthand' : 'lefthand';
        $characterItem = $equipped[$weaponSlot] ?? null;
        $item = $characterItem?->getItem();

        // Cas d'une arme magique
        if($item && $item->getCategory()?->getSlug() === 'arme-magique') {
            $type = $item->getType();
            $targetStat = $item->getTarget() ?? $item->getEffect();
            $amount = $item->getAmount() ?? 0;
            $area = $item->getArea() ?? 1;

            if($characterItem->getCharge() <= 0) {
                return "<span class='text-muted'>{$enemy->getName()} tente d'utiliser {$item->getName()}, mais il n'a plus de charge.</span><br/>";
            }

            $characterItem->setCharge($characterItem->getCharge() - 1);
            $this->entityManager->persist($characterItem);

            if($targetStat === 'damage' || $targetStat === 'health') {
                $player->setHealth(max(0, $player->getHealth() - $amount));
            } else if($targetStat === 'mana') {
                $player->setMana(max(0, $player->getMana() - $amount));
            }

            $this->entityManager->persist($player);

            $log = "<span class='text-warning'>{$enemy->getName()} utilise {$item->getName()} sur vous et inflige $amount point" . ($amount > 1 ? 's' : '') . " de $targetStat.</span><br/>";

            if($player->getHealth() <= 0) {
                $log .= "<strong class='text-danger'>Vous êtes vaincu…</strong><br/>";
            }

            if($area > 1) {
                $log .= $this->areaEffectHelper->applyAreaEffect($enemyInstance, $targetStat, $amount, $area);
            }

            $this->entityManager->flush();

            return $log;
        }

        // Cas classique : arme physique
        $hasTwoWeapons = !empty($equipped['righthand']) && !empty($equipped['lefthand']);
        [$weaponName, $baseDamage, $hasMagicWeaponBonus] = $hasTwoWeapons
            ? $this->attackHelper->resolveWeapons($enemy)
            : $this->attackHelper->resolveSingleWeapon($enemy, $weaponSlot);

        $equipmentBonus = $this->attackHelper->getOffensiveEquipmentBonus($enemy);
        $bonusDamage = ($enemyEffects['damage'] ?? 0);
        $malusDefense = ($playerEffects['defense'] ?? 0) * -1;

        $totalDamage = max(0, $baseDamage + $equipmentBonus['amount'] + $bonusDamage + $malusDefense);

        $player->setHealth(max(0, $player->getHealth() - $totalDamage));
        $this->entityManager->persist($player);
        $this->entityManager->flush();

        return $this->attackHelper->generateAttackLog(
            target: $enemyInstance,
            weaponName: $weaponName,
            damage: $totalDamage,
            bonusText: $equipmentBonus['text'],
            hasMagicWeaponBonus: $hasMagicWeaponBonus,
            isPlayer: false
        );
    }
}
