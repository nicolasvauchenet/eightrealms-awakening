<?php

namespace App\Service\Game\Combat;

use App\Entity\Character\Character;
use App\Entity\Character\Player;
use App\Entity\Combat\PlayerCombat;
use App\Entity\Combat\PlayerCombatEnemy;
use App\Service\Game\Combat\Effect\CombatEffectService;
use App\Service\Game\Combat\Helper\AttackHelperService;
use App\Service\Game\Combat\Helper\DamageCalculatorHelperService;
use App\Service\Game\Combat\Helper\DiceRollerHelperService;
use App\Service\Game\Combat\Helper\DurabilityHelperService;
use Doctrine\ORM\EntityManagerInterface;
use Random\RandomException;

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
        $enemyName = $enemy->getName();
        if(sizeof($playerCombat->getCombat()->getCombatEnemies()) > 1) {
            $enemyName .= ' ' . $enemyInstance->getPosition();
        }
        $player = $playerCombat->getPlayer();
        $playerEffects = $this->combatEffectService->getActiveBonusesForTarget($playerCombat, $player);
        $enemyEffects = $this->combatEffectService->getActiveBonusesForTarget($playerCombat, $enemy);

        if(!empty($enemyEffects['charmed'])) {
            return "<span class='text-muted'>$enemyName vous regarde avec des yeux doux et n’attaque pas.</span><br/>";
        }

        if(!empty($playerEffects['invisibility'])) {
            return "<span class='text-info'>Vous êtes invisible. $enemyName ne vous voit pas et rate son attaque.</span><br/>";
        }

        // Récupère les sorts que l’ennemi peut lancer (suffisamment de mana)
        $availableSpells = array_filter(
            $enemy->getCharacterSpells()->toArray(),
            fn($characterSpell) => $enemyInstance->getMana() >= ($characterSpell->getSpell()->getManaCost() + $characterSpell->getManaCost())
        );

        if(!empty($availableSpells) && random_int(1, 100) <= 33) {
            // Tente de lancer un sort
            shuffle($availableSpells);
            $characterSpell = $availableSpells[0];
            $spell = $characterSpell->getSpell();
            $manaCost = $spell->getManaCost() + $characterSpell->getManaCost();
            $type = $spell->getType();
            $targetStat = $spell->getTarget() ?? $spell->getEffect();
            $amount = $spell->getAmount() + $characterSpell->getAmountBonus();
            $duration = $spell->getDuration() ? $spell->getDuration() + $characterSpell->getDurationBonus() : null;

            $enemyInstance->setMana($enemyInstance->getMana() - $manaCost);
            $this->entityManager->persist($enemyInstance);

            if($type === 'offensive') {
                $statName = match ($targetStat) {
                    'damage', 'health' => 'dégâts',
                    'mana' => 'magie',
                    default => $targetStat,
                };

                if(in_array($targetStat, ['damage', 'health'])) {
                    $player->setHealth(max(0, $player->getHealth() - $amount));
                } else if($targetStat === 'mana') {
                    $player->setMana(max(0, $player->getMana() - $amount));
                }

                $this->entityManager->persist($player);

                $log = "<span class='text-danger'>$enemyName lance {$spell->getName()} sur vous et vous inflige $amount point" . ($amount > 1 ? 's' : '') . " de $statName&nbsp;!</span><br/>";
            } else {
                $this->combatEffectService->addEffect(
                    type: $type,
                    target: $targetStat,
                    amount: $amount,
                    duration: $duration,
                    playerCombat: $playerCombat,
                    playerCombatEnemy: ($spell->getSlug() === 'charme-hypnotique' ? null : $enemyInstance),
                );

                $label = match ($targetStat) {
                    'damage' => 'gagne un bonus de puissance',
                    'defense' => 'gagne un bonus de défense',
                    'invisibility' => 'devient invisible',
                    'charmed' => 'vous charme',
                    default => 'bénéficie d’un effet inconnu',
                };

                $log = "<span class='text-info'>$enemyName lance {$spell->getName()} et {$label} pendant $duration tour" . ($duration > 1 ? 's' : '') . ".</span><br/>";
            }

            $this->entityManager->flush();

            return $log;
        }

        // Sinon, attaque physique
        $equipped = $this->attackHelper->getCharacterItemService()->getEquippedItems($enemy);
        $modes = [];

        if(!empty($equipped['righthand'])) $modes[] = 'righthand';
        if(!empty($equipped['lefthand'])) $modes[] = 'lefthand';
        if(!empty($equipped['righthand']) && !empty($equipped['lefthand'])) $modes[] = 'twohands';

        if(empty($modes)) {
            return "<span class='text-info'>$enemyName n’a pas d’arme pour attaquer.</span><br/>";
        }

        $attackMode = $modes[random_int(0, count($modes) - 1)];

        return $this->handleClassicalWeaponAttack($playerCombat, $equipped, $enemy, $player, $enemyInstance, $attackMode);
    }

    /**
     * @throws RandomException
     */
    private function handleClassicalWeaponAttack(PlayerCombat $playerCombat, array $equipped, Character $enemy, Player $player, PlayerCombatEnemy $enemyInstance, ?string $forcedMode = null): string
    {
        $attackMode = $forcedMode;
        $enemyName = $enemy->getName();
        if(sizeof($playerCombat->getCombat()->getCombatEnemies()) > 1) {
            $enemyName .= ' ' . $enemyInstance->getPosition();
        }

        if($attackMode === 'twohands') {
            $weaponsData = $this->attackHelper->resolveWeapons($enemy);
            $weaponName = implode(' et ', $weaponsData['weaponNames']);
            $baseDamage = array_sum($weaponsData['damages']);
            $hasMagicWeaponBonus = $weaponsData['hasMagicWeaponBonus'];
        } else {
            [$weaponName, $baseDamage, , $hasMagicWeaponBonus] = $this->attackHelper->resolveSingleWeapon($enemy, $attackMode);
        }

        $equippedItemsPlayer = $this->attackHelper->getCharacterItemService()->getEquippedItems($player);
        $attackRoll = $this->diceRollerHelperService->rollDice(20, $enemy->getDexterity());
        $defenseRoll = $this->diceRollerHelperService->rollDice(20, $player->getDexterity());

        $logs = [];

        if($attackRoll['isCriticalSuccess'] && $defenseRoll['isCriticalSuccess']) {
            $criticalLogs = $this->durabilityHelperService->handleCriticalHitDamage(null, $equippedItemsPlayer, true);
            $logs = array_merge($logs, $criticalLogs);

            return "<span class='text-warning'>Un choc brutal se produit entre l'attaque de $enemyName et votre défense. Les équipements sont mis à rude épreuve&nbsp;!</span><br/>" . implode('', $logs);
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
                $criticalLogs = $this->durabilityHelperService->handleCriticalHitDamage(null, $equippedItemsPlayer, false);
                $logs = array_merge($logs, $criticalLogs);
            }

            return $this->attackHelper->generateAttackLog(
                    target: $enemyInstance,
                    targetName: $enemyName,
                    weaponName: $weaponName,
                    damage: $totalDamage,
                    bonusText: '',
                    hasMagicWeaponBonus: $hasMagicWeaponBonus,
                    isPlayer: false,
                    isCriticalSuccess: $attackRoll['isCriticalSuccess']
                ) . implode('', $logs);
        }

        return $this->attackHelper->generateAttackFailLog($enemyInstance, $enemyName, false);
    }

    private function getEnemyInstance(PlayerCombat $playerCombat, int $enemyId): PlayerCombatEnemy
    {
        return $playerCombat->getPlayerCombatEnemies()->filter(
            fn($e) => $e->getId() === $enemyId
        )->first();
    }
}
