<?php

namespace App\Service\Combat\Helper;

use App\Entity\Combat\PlayerCombatEnemy;
use Doctrine\ORM\EntityManagerInterface;

readonly class AreaEffectHelperService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function applyAreaEffect(PlayerCombatEnemy $target, string $targetStat, int $baseAmount, int $area): string
    {
        $log = '';
        $aoeAmount = ceil($baseAmount * 0.75);
        $statName = match ($targetStat) {
            'health', 'damage' => 'dégâts',
            'mana' => 'magie',
            default => $targetStat,
        };

        $enemies = $target->getPlayerCombat()->getPlayerCombatEnemies()->filter(
            fn($e) => $e->getHealth() > 0 && $e !== $target
        )->slice(0, $area - 1);

        foreach($enemies as $e) {
            if($targetStat === 'health' || $targetStat === 'damage') {
                $e->setHealth(max(0, $e->getHealth() - $aoeAmount));
            } else if($targetStat === 'mana') {
                $e->setMana(max(0, $e->getMana() - $aoeAmount));
            }

            $this->entityManager->persist($e);

            $log .= "<span class='text-success'>{$e->getEnemy()->getName()} {$e->getPosition()} est aussi touché et perd $aoeAmount point" . ($aoeAmount > 1 ? 's' : '') . " de $statName&nbsp;!</span><br/>";

            if($e->getHealth() <= 0) {
                $log .= "<strong class='text-success'>{$e->getEnemy()->getName()} {$e->getPosition()} est vaincu&nbsp;!</strong><br/>";
            }
        }

        return $log;
    }
}
