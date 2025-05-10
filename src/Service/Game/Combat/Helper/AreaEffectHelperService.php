<?php

namespace App\Service\Game\Combat\Helper;

use App\Entity\Combat\PlayerCombatEnemy;
use Doctrine\ORM\EntityManagerInterface;

readonly class AreaEffectHelperService
{
    public function __construct(private EntityManagerInterface  $entityManager,
                                private EnemyLabelHelperService $enemyLabelHelperService,)
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

        foreach($enemies as $enemy) {
            $enemyName = $this->enemyLabelHelperService->getDisplayName($enemy);
            if($targetStat === 'health' || $targetStat === 'damage') {
                $enemy->setHealth(max(0, $enemy->getHealth() - $aoeAmount));
            } else if($targetStat === 'mana') {
                $enemy->setMana(max(0, $enemy->getMana() - $aoeAmount));
            }

            $this->entityManager->persist($enemy);

            $log .= "<span class='text-success'>$enemyName est aussi touché et perd $aoeAmount point" . ($aoeAmount > 1 ? 's' : '') . " de $statName&nbsp;!</span><br/>";

            if($enemy->getHealth() <= 0) {
                $log .= "<strong class='text-success'>$enemyName est vaincu&nbsp;!</strong><br/>";
            }
        }

        return $log;
    }
}
