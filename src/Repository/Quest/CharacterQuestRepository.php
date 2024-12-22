<?php

namespace App\Repository\Quest;

use App\Entity\Character\Player;
use App\Entity\Quest\CharacterQuest;
use App\Entity\Quest\Quest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CharacterQuest>
 */
class CharacterQuestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CharacterQuest::class);
    }

    public function findCharacterPrimaryQuest(Player $player): ?CharacterQuest
    {
        return $this->createQueryBuilder('cq')
            ->leftJoin('cq.quest', 'q')
            ->where('cq.character = :player')
            ->andWhere('q.type = :type')
            ->setParameter('player', $player)
            ->setParameter('type', 'Principale')
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findCharacterSecondaryQuests(Player $player): array
    {
        return $this->createQueryBuilder('cq')
            ->leftJoin('cq.quest', 'q')
            ->where('cq.character = :player')
            ->andWhere('q.type = :type')
            ->setParameter('player', $player)
            ->setParameter('type', 'Secondaire')
            ->getQuery()
            ->getResult();
    }
}
