<?php

namespace App\Service\Combat;

use App\Entity\Combat\PlayerCombat;
use Random\RandomException;

readonly class InitiativeService
{
    /**
     * @throws RandomException
     */
    public function getTurnOrder(PlayerCombat $playerCombat): array
    {
        $turnOrder = [];

        $rollWithAdvantage = function(int $dex) {
            $roll1 = random_int(1, 20);
            $roll2 = random_int(1, 20);

            if($dex >= 15) {
                return max($roll1, $roll2);
            } else if($dex <= 8) {
                return min($roll1, $roll2);
            } else {
                return $roll1;
            }
        };

        // Joueur principal
        $player = $playerCombat->getPlayer();
        $dex = $player->getDexterity();
        $roll = $rollWithAdvantage($dex);
        $initiative = $roll + $dex;
        $turnOrder[] = [
            'id' => $player->getId(),
            'type' => 'player',
            'initiative' => $initiative,
        ];

        // Ennemis
        foreach($playerCombat->getPlayerCombatEnemies() as $enemyCombat) {
            if($enemyCombat->getHealth() <= 0) {
                continue;
            }
            $character = $enemyCombat->getEnemy();
            $dex = $character->getDexterity();
            $roll = $rollWithAdvantage($dex);
            $initiative = $roll + $dex;
            $turnOrder[] = [
                'id' => $enemyCombat->getId(),
                'type' => 'enemy',
                'initiative' => $initiative,
            ];
        }

        // Tri décroissant
        usort($turnOrder, function($a, $b) {
            return $b['initiative'] <=> $a['initiative'];
        });

        return $turnOrder;
    }
}
