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

    /**
     * @return array Returns items grouped by category
     */
    public function findCharacterItemsByCategories(Character $character): array
    {
        $characterItems = $this->createQueryBuilder('ci')
            ->leftJoin('ci.item', 'i')
            ->leftJoin('i.category', 'c')
            ->addSelect('i', 'c')
            ->andWhere('ci.character = :character')
            ->setParameter('character', $character)
            ->orderBy('c.position', 'ASC')
            ->addOrderBy('ci.equipped', 'DESC')
            ->getQuery()
            ->getResult();

        $grouped = [];
        foreach($characterItems as $characterItem) {
            $categoryName = $characterItem->getItem()->getCategory()->getName();
            $grouped[$categoryName][] = $characterItem;
        }

        return $grouped;
    }
}
