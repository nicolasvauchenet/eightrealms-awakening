<?php

namespace App\Service\Combat;

use App\Entity\Character\Player;
use App\Entity\Combat\Combat;
use App\Entity\Combat\PlayerCombat;
use App\Entity\Combat\PlayerCombatEnemy;
use App\Entity\Item\Weapon;
use App\Service\Item\CharacterItemService;
use Doctrine\ORM\EntityManagerInterface;

readonly class PlayerAttackService
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private CharacterItemService   $characterItemService
    )
    {
    }

    public function playerAttack(Player $player, Combat $combat, int $enemyId, string $mode): string
    {
        $playerCombat = $this->getPlayerCombat($player, $combat);
        $target = $this->getTargetEnemy($playerCombat, $enemyId);

        [$weaponName, $baseDamage, $isMagical, $hasMagicWeaponBonus] = $this->resolveWeapon($player, $mode);
        $bonusFromEquipment = $this->getEquipmentBonus($player);

        $totalDamage = $baseDamage + $bonusFromEquipment['amount'];

        $target->setHealth(max(0, $target->getHealth() - $totalDamage));
        $this->entityManager->persist($target);
        $this->entityManager->flush();

        return $this->generateLog($target, $weaponName, $totalDamage, $bonusFromEquipment['text'], $hasMagicWeaponBonus);
    }

    private function getPlayerCombat(Player $player, Combat $combat): ?PlayerCombat
    {
        return $player->getPlayerCombats()->filter(
            fn($pc) => $pc->getCombat() === $combat
        )->first();
    }

    private function getTargetEnemy(PlayerCombat $playerCombat, int $enemyId): ?PlayerCombatEnemy
    {
        return $playerCombat->getPlayerCombatEnemies()->filter(
            fn($pce) => $pce->getId() === $enemyId
        )->first();
    }

    private function resolveWeapon(Player $player, string $mode): array
    {
        $equipped = $this->characterItemService->getEquippedItems($player);
        $weaponName = 'vos poings';
        $baseDamage = 1;
        $isMagical = false;
        $hasMagicWeaponBonus = false;

        $getWeaponDamage = function($item) use (&$hasMagicWeaponBonus): int {
            $damage = $item->getDamage() ?? 1;
            if($item instanceof Weapon && $item->getTarget() === 'damage') {
                $bonus = $item->getAmount() ?? 0;
                if(method_exists($item, 'isMagical') && $item->isMagical() && $bonus > 0) {
                    $hasMagicWeaponBonus = true;
                }
                $damage += $bonus;
            }

            return $damage;
        };

        switch($mode) {
            case 'righthand':
            case 'lefthand':
            case 'bow':
                if($equipped[$mode]) {
                    $item = $equipped[$mode]->getItem();
                    $weaponName = 'votre ' . $item->getName();
                    $baseDamage = $getWeaponDamage($item);
                    $isMagical = method_exists($item, 'isMagical') && $item->isMagical();
                }
                break;

            case 'twohands':
                $names = [];
                $damage = 0;
                foreach(['righthand', 'lefthand'] as $hand) {
                    if($equipped[$hand]) {
                        $item = $equipped[$hand]->getItem();
                        $names[] = 'votre ' . $item->getName();
                        $damage += $getWeaponDamage($item);
                        if(method_exists($item, 'isMagical') && $item->isMagical()) {
                            $isMagical = true;
                        }
                    }
                }
                $weaponName = count($names) > 0 ? implode(' et ', $names) : 'vos deux mains';
                $baseDamage = $damage > 0 ? $damage : 2;
                break;
        }

        return [$weaponName, $baseDamage, $isMagical, $hasMagicWeaponBonus];
    }

    private function getEquipmentBonus(Player $player): array
    {
        $bonusAmount = 0;
        $bonusText = '';

        // On récupère uniquement les objets équipés offensifs NON armes
        $equippedItems = $this->characterItemService->getEquippedBonus($player, 'offensive', 'damage');

        foreach($equippedItems as $equippedItem) {
            $category = $equippedItem->getItem()->getCategory()->getSlug();
            if(!in_array($category, ['arme', 'arme-magique'])) {
                $bonusAmount += $equippedItem->getItem()->getAmount();
            }
        }

        if($bonusAmount > 0) {
            $bonusText = "<br/><small class='text-info'>(Bonus de dégâts appliqué grâce à vos équipements offensifs)</small>";
        }

        return [
            'amount' => $bonusAmount,
            'text' => $bonusText,
        ];
    }

    private function generateLog(PlayerCombatEnemy $target, string $weaponName, int $totalDamage, string $bonusText, bool $hasMagicWeaponBonus = false): string
    {
        $log = "<span class='text-success'>Vous attaquez {$target->getEnemy()->getName()} avec <strong>$weaponName</strong> et lui infligez <strong>$totalDamage</strong> point" . ($totalDamage > 1 ? 's' : '') . " de dégâts.</span>";

        if($hasMagicWeaponBonus) {
            $log .= "<br/><small class='text-info'>(Bonus magique appliqué par votre arme enchantée)</small>";
        }

        $log .= $bonusText;

        if($target->getHealth() <= 0) {
            $log .= "<br/><strong class='text-success'>{$target->getEnemy()->getName()} {$target->getPosition()} est vaincu&nbsp;!</strong>";
        }

        return $log;
    }
}
