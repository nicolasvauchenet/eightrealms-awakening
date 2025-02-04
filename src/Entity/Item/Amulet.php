<?php

namespace App\Entity\Item;

use App\Repository\Item\AmuletRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AmuletRepository::class)]
class Amulet extends Item
{
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $target = null;

    #[ORM\Column(nullable: true)]
    private ?int $amount = null;

    public function getTarget(): ?string
    {
        return $this->target;
    }

    public function setTarget(?string $target): static
    {
        $this->target = $target;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(?int $amount): static
    {
        $this->amount = $amount;

        return $this;
    }
}
