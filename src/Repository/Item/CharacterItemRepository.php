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
            ->addOrderBy('ci.slot', 'DESC')
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

    public function findEquippedItemsByType(Character $character, array $slots, array $slugs): array
    {
        $query = $this->createQueryBuilder('ci')
            ->leftJoin('ci.item', 'i')
            ->leftJoin('i.category', 'c')
            ->addSelect('i')
            ->andWhere('ci.character = :character')
            ->andWhere('ci.equipped = true')
            ->andWhere('ci.slot IN (:slots)')
            ->andWhere('c.slug IN (:slugs)')
            ->setParameter('character', $character)
            ->setParameter('slots', $slots)
            ->setParameter('slugs', $slugs);

        return $query->getQuery()->getResult();
    }

    public function findEquippedItemsWithBonuses(Character $character, string $type, string $target): array
    {
        $items = $this->createQueryBuilder('ci')
            ->leftJoin('ci.item', 'i')
            ->leftJoin('i.category', 'c')
            ->addSelect('i')
            ->andWhere('ci.character = :character')
            ->andWhere('ci.equipped = true')
            ->andWhere('c.slug IN (:slugs)')
            ->setParameter('character', $character)
            ->setParameter('slugs', ['armure', 'bouclier', 'anneau', 'amulette'])
            ->getQuery()
            ->getResult();

        return array_filter($items, function($characterItem) use ($type, $target) {
            $item = $characterItem->getItem();

            $isDefensiveType = method_exists($item, 'getType') && $item->getType() === $type;
            $isMagical = method_exists($item, 'isMagical') && $item->isMagical();
            $hasTarget = method_exists($item, 'getTarget') && $item->getTarget() === $target;

            return $hasTarget && ($isDefensiveType || $isMagical);
        });
    }
}
