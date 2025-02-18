<?php

namespace App\Entity\Item;

use App\Repository\Item\WeaponRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WeaponRepository::class)]
class Weapon extends Item
{
    #[ORM\Column]
    private ?int $damage = null;

    #[ORM\Column]
    private ?int $range = null;

    #[ORM\Column]
    private ?int $price = null;

    public function getDamage(): ?int
    {
        return $this->damage;
    }

    public function setDamage(int $damage): static
    {
        $this->damage = $damage;

        return $this;
    }

    public function getRange(): ?int
    {
        return $this->range;
    }

    public function setRange(?int $range): static
    {
        $this->range = $range;

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
