<?php

namespace App\Repository\Reward;

use App\Entity\Reward\RewardItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RewardItem>
 */
class RewardItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RewardItem::class);
    }

//    /**
//     * @return RewardItem[] Returns an array of RewardItem objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?RewardItem
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
