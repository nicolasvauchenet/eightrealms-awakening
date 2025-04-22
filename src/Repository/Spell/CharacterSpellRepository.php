<?php

namespace App\Repository\Spell;

use App\Entity\Character\Character;
use App\Entity\Spell\CharacterSpell;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CharacterSpell>
 */
class CharacterSpellRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CharacterSpell::class);
    }

    public function findCharacterSpellsByCategories(Character $character): array
    {
        $characterSpells = $this->createQueryBuilder('cs')
            ->leftJoin('cs.spell', 's')
            ->leftJoin('s.category', 'c')
            ->addSelect('s', 'c')
            ->andWhere('cs.character = :character')
            ->setParameter('character', $character)
            ->orderBy('c.position', 'ASC')
            ->getQuery()
            ->getResult();

        $grouped = [];
        foreach($characterSpells as $characterSpell) {
            $categoryName = $characterSpell->getSpell()->getCategory()->getName();
            $grouped[$categoryName][] = $characterSpell;
        }

        return $grouped;
    }
}
