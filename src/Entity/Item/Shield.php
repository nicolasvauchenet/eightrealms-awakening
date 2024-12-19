<?php

namespace App\Entity\Item;

use App\Repository\Item\ShieldRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ShieldRepository::class)]
class Shield extends Item
{
    #[ORM\Column]
    private ?int $defense = null;

    #[ORM\Column(nullable: true)]
    private ?int $blockChance = null;

    public function getDefense(): ?int
    {
        return $this->defense;
    }

    public function setDefense(int $defense): static
    {
        $this->defense = $defense;

        return $this;
    }

    public function getBlockChance(): ?int
    {
        return $this->blockChance;
    }

    public function setBlockChance(?int $blockChance): static
    {
        $this->blockChance = $blockChance;

        return $this;
    }
}
