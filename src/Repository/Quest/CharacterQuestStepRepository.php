<?php

namespace App\Repository\Quest;

use App\Entity\Character\Player;
use App\Entity\Quest\CharacterQuestStep;
use App\Entity\Quest\Quest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CharacterQuestStep>
 */
class CharacterQuestStepRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CharacterQuestStep::class);
    }

    public function findCharacterQuestSteps(Player $player, Quest $quest): array
    {
        return $this->createQueryBuilder('cqs')
            ->leftJoin('cqs.questStep', 'qs')
            ->leftJoin('qs.quest', 'q')
            ->where('cqs.character = :player')
            ->andWhere('q = :quest')
            ->setParameter('player', $player)
            ->setParameter('quest', $quest)
            ->getQuery()
            ->getResult();
    }
}
