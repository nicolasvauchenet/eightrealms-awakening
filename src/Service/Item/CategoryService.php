<?php

namespace App\Service\Item;

use App\Entity\Item\Category;
use Doctrine\ORM\EntityManagerInterface;

class CategoryService
{
    public function __construct(private EntityManagerInterface $manager)
    {
    }

    public function getCategories(): array
    {
        return $this->manager->getRepository(Category::class)->findBy([], ['position' => 'ASC']);
    }
}
