<?php

namespace App\Service\Combat;

use App\Entity\Character\Character;
use App\Entity\Character\Player;
use App\Entity\Combat\PlayerCombat;
use App\Entity\Combat\PlayerCombatEnemy;
use App\Entity\Item\CharacterItem;
use App\Entity\Item\Item;
use App\Service\Combat\Helper\AttackHelperService;
use App\Service\Combat\Helper\AreaEffectHelperService;
use App\Service\Combat\Helper\DiceRollerHelperService;
use App\Service\Combat\Helper\DamageCalculatorHelperService;
use App\Service\Combat\Effect\CombatEffectService;
use Doctrine\ORM\EntityManagerInterface;

readonly class EnemyAttackService
{
    public function __construct(
        private EntityManagerInterface        $entityManager,
        private AttackHelperService           $attackHelper,
        private CombatEffectService           $combatEffectService,
        private AreaEffectHelperService       $areaEffectHelper,
        private DiceRollerHelperService       $diceRollerHelperService,
        private DamageCalculatorHelperService $damageCalculatorHelperService
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
        $enemyEffects = $this->combatEffectService->getActiveBonuses($playerCombat, $enemyInstance);
        $equipped = $this->attackHelper->getCharacterItemService()->getEquippedItems($enemy);

        if($this->getPlayerInvisibility($playerEffects)) {
            return "<span class='text-info'>Vous êtes invisible. {$enemy->getName()} {$enemyInstance->getPosition()} ne vous voit pas et rate son attaque.</span><br/>";
        }

        $weaponSlot = !empty($equipped['righthand']) ? 'righthand' : 'lefthand';
        $characterItem = $equipped[$weaponSlot] ?? null;
        $item = $characterItem?->getItem();

        if($item && $item->getCategory()?->getSlug() === 'arme-magique') {
            return $this->handleMagicalWeaponAttack($item, $characterItem, $enemy, $player, $enemyInstance);
        }

        return $this->handleClassicalWeaponAttack($playerCombat, $equipped, $enemy, $weaponSlot, $player, $enemyInstance);
    }

    private function handleMagicalWeaponAttack(Item $item, CharacterItem $characterItem, Character $enemy, Player $player, PlayerCombatEnemy $enemyInstance): string
    {
        $targetStat = $item->getTarget() ?? $item->getEffect();
        $amount = $item->getAmount() ?? 0;
        $area = $item->getArea() ?? 1;

        if($characterItem->getCharge() <= 0) {
            return "<span class='text-muted'>{$enemy->getName()} tente d'utiliser {$item->getName()}, mais il n'a plus de charge.</span><br/>";
        }

        $characterItem->setCharge($characterItem->getCharge() - 1);
        $this->entityManager->persist($characterItem);

        if(in_array($targetStat, ['damage', 'health'])) {
            $player->setHealth(max(0, $player->getHealth() - $amount));
        } else if($targetStat === 'mana') {
            $player->setMana(max(0, $player->getMana() - $amount));
        }

        $this->entityManager->persist($player);

        $log = "<span class='text-warning'>{$enemy->getName()} utilise {$item->getName()} sur vous et inflige $amount point" . ($amount > 1 ? 's' : '') . " de dégâts.</span><br/>";

        if($player->getHealth() <= 0) {
            $log .= "<strong class='text-danger'>Vous êtes vaincu…</strong><br/>";
        }

        if($area > 1) {
            $log .= $this->areaEffectHelper->applyAreaEffect($enemyInstance, $targetStat, $amount, $area);
        }

        $this->entityManager->flush();

        return $log;
    }

    private function handleClassicalWeaponAttack(PlayerCombat $playerCombat, array $equipped, Character $enemy, string $weaponSlot, Player $player, PlayerCombatEnemy $enemyInstance): string
    {
        $hasTwoWeapons = !empty($equipped['righthand']) && !empty($equipped['lefthand']);
        [$weaponName, $baseDamage, $hasMagicWeaponBonus] = $hasTwoWeapons
            ? $this->attackHelper->resolveWeapons($enemy)
            : $this->attackHelper->resolveSingleWeapon($enemy, $weaponSlot);

        $attackRoll = $this->diceRollerHelperService->rollDice(20, $enemy->getDexterity());
        $defenseRoll = $this->diceRollerHelperService->rollDice(20, $player->getDexterity());

        if($attackRoll['isCriticalSuccess'] && $defenseRoll['isCriticalSuccess']) {
            return "<span class='text-warning'>Un choc brutal se produit entre l'attaque de {$enemy->getName()} et votre défense. Les armes sont mises à rude épreuve !</span><br/>";
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

            return $this->attackHelper->generateAttackLog(
                target: $enemyInstance,
                weaponName: $weaponName,
                damage: $totalDamage,
                bonusText: '',
                hasMagicWeaponBonus: $hasMagicWeaponBonus,
                isPlayer: false,
                isCriticalSuccess: $attackRoll['isCriticalSuccess']
            );
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
