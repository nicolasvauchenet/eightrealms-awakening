<?php

namespace App\Service\Combat;

use App\Entity\Character\Player;
use App\Entity\Combat\Combat;
use Doctrine\ORM\EntityManagerInterface;

readonly class PlayerAttackService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function playerAttack(Player $player, Combat $combat, int $enemyId, string $mode): string
    {
        // 1. Récupère le PlayerCombat correspondant
        $playerCombat = $player->getPlayerCombats()->filter(
            fn($pc) => $pc->getCombat() === $combat
        )->first();

        // 2. Récupère le PlayerCombatEnemy ciblé
        $target = $playerCombat->getPlayerCombatEnemies()->filter(
            fn($pce) => $pce->getId() === $enemyId
        )->first();

        // 3. Calcule les dégâts (à adapter selon les règles du jeu)
        $damage = match ($mode) {
            'bow' => 8,
            'righthand' => 10,
            'lefthand' => 6,
            'twohands' => 14,
            default => 5,
        };

        $currentHealth = $target->getHealth();
        $target->setHealth(max(0, $currentHealth - $damage));
        $this->entityManager->persist($target);
        $this->entityManager->flush();

        $log = "<span class='text-success'>Vous attaquez {$target->getEnemy()->getName()} avec votre $mode et lui infligez $damage point" . ($damage > 1 ? 's' : '') . " de dégâts&nbsp;!</span>\n";
        if($target->getHealth() <= 0) {
            $log .= "<strong class='text-success'>{$target->getEnemy()->getName()} {$target->getPosition()} est vaincu&nbsp;!</strong>\n";
        }

        return $log;
    }
}
