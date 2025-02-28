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

    public function findQuestsWithStepsByPlayer(Player $player): array
    {
        return $this->createQueryBuilder('pq')
            ->select('pq, q, s')
            ->join('pq.step', 's')
            ->join('pq.quest', 'q')
            ->where('pq.player = :player')
            ->setParameter('player', $player)
            ->orderBy('q.type', 'ASC')
            ->addOrderBy('q.id', 'ASC')
            ->addOrderBy('s.position', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
