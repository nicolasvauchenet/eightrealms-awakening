<?php

namespace App\Entity\Reward;

use App\Entity\Item\Item;
use App\Repository\Reward\RewardItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RewardItemRepository::class)]
class RewardItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\ManyToOne(inversedBy: 'rewardItems')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Reward $reward = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Item $item = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getReward(): ?Reward
    {
        return $this->reward;
    }

    public function setReward(?Reward $reward): static
    {
        $this->reward = $reward;

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
}
