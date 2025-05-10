<?php

namespace App\Service\Game\Combat\Helper;

use App\Entity\Combat\PlayerCombatEnemy;

class EnemyLabelHelperService
{
    public function getDisplayName(PlayerCombatEnemy $target): string
    {
        $enemyName = $target->getEnemy()->getName();
        $targetPosition = $target->getPosition();
        $sameNameEnemies = array_filter(
            $target->getPlayerCombat()->getCombat()->getCombatEnemies()->toArray(),
            fn($e) => $e->getEnemy()->getName() === $enemyName
        );

        if(count($sameNameEnemies) > 1) {
            $count = 0;
            foreach($sameNameEnemies as $e) {
                if($e->getPosition() < $targetPosition) {
                    $count++;
                }
            }

            return $enemyName . ' ' . ($count + 1);
        }

        return $enemyName;
    }
}
