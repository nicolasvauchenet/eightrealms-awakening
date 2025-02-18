<?php

namespace App\Entity\Item;

use App\Repository\Item\GiftRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GiftRepository::class)]
class Gift extends Item
{
    #[ORM\Column]
    private ?int $price = null;

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }
}
