<?php

namespace App\Repository\Item;

use App\Entity\Character\Character;
use App\Entity\Item\CharacterItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CharacterItem>
 */
class CharacterItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CharacterItem::class);
    }

    public function findCharacterItems(Character $character): array
    {
        return $this->createQueryBuilder('ci')
            ->join('ci.item', 'i')
            ->join('i.category', 'c')
            ->andWhere('ci.character = :character')
            ->setParameter('character', $character)
            ->orderBy('ci.equipped', 'DESC')
            ->addOrderBy('c.position', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findByEquipped(Character $character): array
    {
        return $this->createQueryBuilder('ci')
            ->andWhere('ci.equipped = true')
            ->andWhere('ci.character = :character')
            ->setParameter('character', $character)
            ->orderBy('ci.item', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
