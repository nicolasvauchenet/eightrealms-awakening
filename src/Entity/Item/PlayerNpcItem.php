<?php

namespace App\Entity\Item;

use App\Entity\Character\PlayerNpc;
use App\Repository\Item\PlayerNpcItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerNpcItemRepository::class)]
class PlayerNpcItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $original = null;

    #[ORM\ManyToOne(inversedBy: 'playerNpcItems')]
    #[ORM\JoinColumn(nullable: false)]
    private ?PlayerNpc $playerNpc = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Item $item = null;

    #[ORM\Column(nullable: true)]
    private ?int $health = null;

    #[ORM\Column(nullable: true)]
    private ?int $charge = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isOriginal(): ?bool
    {
        return $this->original;
    }

    public function setOriginal(bool $original): static
    {
        $this->original = $original;

        return $this;
    }

    public function getPlayerNpc(): ?PlayerNpc
    {
        return $this->playerNpc;
    }

    public function setPlayerNpc(?PlayerNpc $playerNpc): static
    {
        $this->playerNpc = $playerNpc;

        return $this;
    }

    public function getItem(): ?Item
    {
        return $this->item;
    }

    public function setItem(?Item $item): static
    {
        $this->item = $item;

        return $this;
    }

    public function getHealth(): ?int
    {
        return $this->health;
    }

    public function setHealth(?int $health): static
    {
        $this->health = $health;

        return $this;
    }

    public function getCharge(): ?int
    {
        return $this->charge;
    }

    public function setCharge(?int $charge): static
    {
        $this->charge = $charge;

        return $this;
    }
}
