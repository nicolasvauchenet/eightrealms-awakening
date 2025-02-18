<?php

namespace App\Entity\Item;

use App\Repository\Item\ArmorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArmorRepository::class)]
class Armor extends Item
{
    #[ORM\Column]
    private ?int $defense = null;

    #[ORM\Column]
    private ?int $price = null;

    public function getDefense(): ?int
    {
        return $this->defense;
    }

    public function setDefense(int $defense): static
    {
        $this->defense = $defense;

        return $this;
    }

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
