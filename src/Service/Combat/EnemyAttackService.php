<?php

namespace App\Service\Combat;

use App\Entity\Combat\PlayerCombat;
use Doctrine\ORM\EntityManagerInterface;

readonly class EnemyAttackService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function enemyAttack(PlayerCombat $playerCombat, int $enemyId): string
    {
        $enemy = $playerCombat->getPlayerCombatEnemies()->filter(
            fn($e) => $e->getId() === $enemyId
        )->first();

        if(!$enemy || $enemy->getHealth() <= 0) {
            return '';
        }

        $player = $playerCombat->getPlayer();

        // Dégâts simples (à affiner plus tard avec une vraie formule)
        $damage = random_int(1, 10);
        $player->setHealth(max(0, $player->getHealth() - $damage));

        $this->entityManager->persist($player);
        $this->entityManager->flush();

        $enemyName = $enemy->getEnemy()->getName();

        return "<span class='text-warning'>$enemyName {$enemy->getPosition()} vous attaque et vous inflige $damage point" . ($damage > 1 ? 's' : '') . " de dégâts&nbsp;!</span>\n";
    }
}
