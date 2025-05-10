<?php

namespace App\Service\Game\Combat\Effect;

use App\Entity\Character\Character;
use App\Entity\Combat\PlayerCombat;
use App\Entity\Combat\PlayerCombatEffect;
use App\Entity\Combat\PlayerCombatEnemy;
use Doctrine\ORM\EntityManagerInterface;

readonly class CombatEffectService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function addEffect(
        string             $type,
        string             $target,
        int                $amount,
        ?int               $duration = null,
        ?PlayerCombat      $playerCombat = null,
        ?PlayerCombatEnemy $playerCombatEnemy = null,
    ): void
    {
        $effect = new PlayerCombatEffect();
        $effect->setType($type);
        $effect->setTarget($target);
        $effect->setAmount($amount);
        $effect->setDuration($duration + 1);
        if($playerCombat) {
            $effect->setPlayerCombat($playerCombat);
        }
        if($playerCombatEnemy) {
            $effect->setPlayerCombatEnemy($playerCombatEnemy);
        }

        $this->entityManager->persist($effect);
    }

    public function getActiveBonusesForTarget(PlayerCombat $playerCombat, Character $target): array
    {
        $repo = $this->entityManager->getRepository(PlayerCombatEffect::class);

        if($playerCombat->getPlayer() === $target) {
            $effects = $repo->findBy([
                'playerCombat' => $playerCombat,
                'playerCombatEnemy' => null,
            ]);
        } else {
            $enemyInstance = $playerCombat->getPlayerCombatEnemies()->filter(
                fn(PlayerCombatEnemy $e) => $e->getEnemy() === $target
            )->first();

            if(!$enemyInstance) {
                throw new \LogicException('Cannot find PlayerCombatEnemy for this Character.');
            }

            $effects = $repo->findBy([
                'playerCombatEnemy' => $enemyInstance,
            ]);
        }

        $bonuses = [
            'damage' => 0,
            'defense' => 0,
            'invisibility' => false,
            'charmed' => false,
        ];

        foreach($effects as $effect) {
            match ($effect->getTarget()) {
                'damage' => $bonuses['damage'] += $effect->getAmount(),
                'defense' => $bonuses['defense'] += $effect->getAmount(),
                'invisibility' => $bonuses['invisibility'] = true,
                'charmed' => $bonuses['charmed'] = true,
                default => null,
            };
        }

        return $bonuses;
    }

    public function tickEffects(PlayerCombat $playerCombat): void
    {
        $repo = $this->entityManager->getRepository(PlayerCombatEffect::class);
        $effects = $repo->findBy(['playerCombat' => $playerCombat]);

        foreach($effects as $effect) {
            if($effect->getDuration() !== null) {
                $effect->setDuration($effect->getDuration() - 1);
            }
        }

        $this->entityManager->flush();
    }

    public function removeExpiredEffects(PlayerCombat $playerCombat): array
    {
        $repo = $this->entityManager->getRepository(PlayerCombatEffect::class);
        $effects = $repo->findBy(['playerCombat' => $playerCombat]);

        $logs = [];

        foreach($effects as $effect) {
            if($effect->getDuration() !== null && $effect->getDuration() <= 0) {
                $targetLabel = $effect->getPlayerCombatEnemy()
                    ? $effect->getPlayerCombatEnemy()->getEnemy()->getName() . ' ' . $effect->getPlayerCombatEnemy()->getPosition()
                    : 'vous';

                $effectType = $effect->getTarget();
                $effectName = match ($effectType) {
                    'invisibility' => "d'invisibilité",
                    'damage' => "d'augmentation des dégâts",
                    'defense' => "d'augmentation de la défense",
                    'charmed' => 'de charme',
                    default => "effet inconnu",
                };

                if($targetLabel === 'vous') {
                    $logs[] = "<em class='text-info'>Votre effet {$effectName} s’est dissipé.</em><br/>";
                } else {
                    $logs[] = "<em class='text-info'>L’effet {$effectName} s’est dissipé sur $targetLabel.</em><br/>";
                }

                $this->entityManager->remove($effect);
            }
        }

        $this->entityManager->flush();

        return $logs;
    }

    public function getActiveEffectEntities(PlayerCombat $playerCombat): array
    {
        $repo = $this->entityManager->getRepository(PlayerCombatEffect::class);

        return $repo->findBy([
            'playerCombat' => $playerCombat,
            'playerCombatEnemy' => null,
        ]);
    }

    public function removeEffect(PlayerCombatEffect $effect): void
    {
        $this->entityManager->remove($effect);
        $this->entityManager->flush();
    }

    public function getActiveCombatEffects(Character $character, PlayerCombat $playerCombat): array
    {
        $qb = $this->entityManager->createQueryBuilder()
            ->select('effect')
            ->from(PlayerCombatEffect::class, 'effect');

        if($playerCombat->getPlayer() === $character) {
            $qb->andWhere('effect.playerCombat = :playerCombat')
                ->andWhere('effect.playerCombatEnemy IS NULL')
                ->setParameter('playerCombat', $playerCombat);
        } else {
            $enemyInstance = $playerCombat->getPlayerCombatEnemies()->filter(
                fn(PlayerCombatEnemy $e) => $e->getEnemy() === $character
            )->first();

            if(!$enemyInstance) {
                throw new \LogicException('Cannot find PlayerCombatEnemy for this Character.');
            }

            $qb->andWhere('effect.playerCombatEnemy = :enemyInstance')
                ->setParameter('enemyInstance', $enemyInstance);
        }

        return $qb->getQuery()->getResult();
    }
}
