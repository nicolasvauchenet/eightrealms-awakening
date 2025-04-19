<?php

namespace App\Entity\Item;

use App\Repository\Item\GiftRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GiftRepository::class)]
class Gift extends Item
{
    #[ORM\Column]
    private ?int $reputation = null;

    public function getReputation(): ?int
    {
        return $this->reputation;
    }

    public function setReputation(int $reputation): static
    {
        $this->reputation = $reputation;

        return $this;
    }
}
