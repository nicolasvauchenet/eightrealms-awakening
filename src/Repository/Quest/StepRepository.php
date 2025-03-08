<?php

namespace App\Repository\Quest;

use App\Entity\Quest\Step;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Step>
 */
class StepRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Step::class);
    }

    public function findNextStep(Step $currentStep): ?Step
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.quest = :quest')
            ->andWhere('s.position > :position')
            ->setParameter('quest', $currentStep->getQuest())
            ->setParameter('position', $currentStep->getPosition())
            ->orderBy('s.position', 'ASC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
