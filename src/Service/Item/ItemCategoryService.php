<?php

namespace App\Service\Item;

use App\Repository\Item\CategoryRepository;
use App\Entity\Item\Category;

readonly class ItemCategoryService
{
    public function __construct(
        private CategoryRepository $itemCategoryRepository
    )
    {
    }

    /**
     * Récupère toutes les catégories triées par nom.
     *
     * @return Category[]
     */
    public function allCategories(): array
    {
        return $this->itemCategoryRepository->createQueryBuilder('c')
            ->orderBy('c.name', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
