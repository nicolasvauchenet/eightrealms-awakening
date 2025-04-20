<?php

namespace App\Service\Character;

use App\Entity\Character\PreGenerated;
use Doctrine\ORM\EntityManagerInterface;

readonly class CharacterService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function getPreGenerated(): array
    {
        return $this->entityManager->getRepository(PreGenerated::class)->findBy([], ['name' => 'ASC']);
    }
}
