<?php

namespace App\Repository\Quest;

use App\Entity\Character\Player;
use App\Entity\Quest\PlayerQuest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PlayerQuest>
 */
class PlayerQuestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlayerQuest::class);
    }

    public function findMainQuest(Player $player, ?bool $isRewarded = false): ?PlayerQuest
    {
        $qb = $this->createQueryBuilder('pq')
            ->join('pq.quest', 'q')
            ->where('pq.player = :player')
            ->andWhere('q.type = :type')
            ->setParameter('player', $player)
            ->setParameter('type', 'Principale');

        if($isRewarded) {
            $qb->andWhere('pq.status = :status');
        } else {
            $qb->andWhere('pq.status != :status');
        }
        $qb->setParameter('status', 'rewarded');

        return $qb->getQuery()->getOneOrNullResult();
    }

    public function findSideQuests(Player $player, ?bool $isRewarded = false): array
    {
        $qb = $this->createQueryBuilder('pq')
            ->join('pq.quest', 'q')
            ->where('pq.player = :player')
            ->andWhere('q.type = :type')
            ->setParameter('player', $player)
            ->setParameter('type', 'Secondaire');

        if($isRewarded) {
            $qb->andWhere('pq.status = :status');
        } else {
            $qb->andWhere('pq.status != :status');
        }
        $qb->setParameter('status', 'rewarded');

        return $qb->getQuery()->getResult();
    }
}
