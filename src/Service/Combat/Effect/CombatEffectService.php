<?php

namespace App\Service\Combat\Effect;

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

    public function getActiveBonuses(PlayerCombat $playerCombat, ?PlayerCombatEnemy $playerCombatEnemy = null): array
    {
        $repo = $this->entityManager->getRepository(PlayerCombatEffect::class);
        $criteria = ['playerCombat' => $playerCombat];

        $effects = $repo->findBy($criteria);
        $bonuses = [
            'damage' => 0,
            'defense' => 0,
            'invisibility' => 0,
        ];

        foreach($effects as $effect) {
            if($playerCombatEnemy && $effect->getPlayerCombatEnemy() && $effect->getPlayerCombatEnemy() !== $playerCombatEnemy) {
                continue;
            }

            if(!$playerCombatEnemy && $effect->getPlayerCombatEnemy() !== null) {
                continue;
            }

            $target = $effect->getTarget();
            if($target === 'damage') {
                $bonuses['damage'] += $effect->getAmount();
            }
            if($target === 'defense') {
                $bonuses['defense'] += $effect->getAmount();
            }
            if($target === 'invisibility') {
                $bonuses['invisibility'] = true;
            }
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
                // Déterminer le label cible
                $targetLabel = $effect->getPlayerCombatEnemy()
                    ? $effect->getPlayerCombatEnemy()->getEnemy()->getName() . ' ' . $effect->getPlayerCombatEnemy()->getPosition()
                    : 'vous';

                // Déterminer quel type d'effet s'est dissipé
                $effectType = $effect->getTarget();
                $effectName = match ($effectType) {
                    'invisibility' => "d'invisibilité",
                    'damage' => "d'augmentation des dégâts",
                    'defense' => "d'augmentation de la défense",
                    default => "effet inconnu",
                };

                // Personnaliser le message selon la cible
                if($targetLabel === 'vous') {
                    $logs[] = "<em class='text-info'>Votre effet {$effectName} s’est dissipé.</em><br/>";
                } else {
                    $logs[] = "<em class='text-info'>L’effet {$effectName} s’est dissipé sur $targetLabel.</em><br/>";
                }

                // Supprimer l'effet expiré
                $this->entityManager->remove($effect);
            }
        }

        // Enregistrer les modifications dans la base de données
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

    public function getActiveCombatEffects(Character $character): array
    {
        // Récupérer les effets actifs de type "damage" ou "defense"
        $qb = $this->entityManager->createQueryBuilder()
            ->select('effect')
            ->from(PlayerCombatEffect::class, 'effect')
            ->where('effect.character = :character')
            ->andWhere('effect.expirationDate > CURRENT_TIMESTAMP()') // Si tu gères une date d'expiration pour les effets
            ->setParameter('character', $character)
            ->getQuery();

        return $qb->getResult();
    }
}
