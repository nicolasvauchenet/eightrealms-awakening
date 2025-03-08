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
    public function findCharacterItemsByCategories(Character $character, ?bool $questItem = false): array
    {
        $characterItems = $this->createQueryBuilder('ci')
            ->leftJoin('ci.item', 'i')
            ->leftJoin('i.category', 'c')
            ->addSelect('i', 'c')
            ->andWhere('ci.character = :character')
            ->setParameter('character', $character)
            ->andWhere('ci.questItem = :questItem')
            ->setParameter('questItem', $questItem)
            ->orderBy('c.position', 'ASC')
            ->addOrderBy('ci.equipped', 'DESC')
            ->addOrderBy('i.name', 'ASC')
            ->getQuery()
            ->getResult();

        $grouped = [];
        foreach($characterItems as $characterItem) {
            $categoryName = $characterItem->getItem()->getCategory()->getName();
            $grouped[$categoryName][] = $characterItem;
        }

        return $grouped;
    }

    public function findEquippedItems(Character $character): array
    {
        return $this->createQueryBuilder('ci')
            ->andWhere('ci.equipped = true')
            ->andWhere('ci.character = :character')
            ->setParameter('character', $character)
            ->orderBy('ci.item', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findEquippedWeapons(Character $character, ?bool $isMagical = false): array
    {
        $query = $this->createQueryBuilder('ci')
            ->leftJoin('ci.item', 'i')
            ->leftJoin('i.category', 'c')
            ->addSelect('i')
            ->andWhere('ci.character = :character')
            ->andWhere('ci.equipped = true')
            ->andWhere('ci.slot IN (:slots)')
            ->andWhere('c.slug = :slug')
            ->setParameter('character', $character)
            ->setParameter('slots', ['lefthand', 'righthand', 'bow']);

        if($isMagical) {
            $query->setParameter('slug', 'arme-magique');
        } else {
            $query->setParameter('slug', 'arme');
        }

        return $query->getQuery()->getResult();
    }
}
