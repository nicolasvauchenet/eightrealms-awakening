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

    public function findCharacterSpells(Character $character): array
    {
        return $this->createQueryBuilder('cs')
            ->join('cs.spell', 's')
            ->join('s.category', 'c')
            ->andWhere('cs.character = :character')
            ->setParameter('character', $character)
            ->orderBy('c.position', 'ASC')
            ->addOrderBy('cs.level', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
