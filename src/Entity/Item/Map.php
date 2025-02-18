<?php

namespace App\Entity\Item;

use App\Repository\Item\MapRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MapRepository::class)]
class Map extends Item
{
    #[ORM\Column(length: 255)]
    private ?string $map = null;

    #[ORM\Column]
    private ?int $price = null;

    public function getMap(): ?string
    {
        return $this->map;
    }

    public function setMap(string $map): static
    {
        $this->map = $map;

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
