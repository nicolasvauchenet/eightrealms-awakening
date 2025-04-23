<?php

namespace App\Entity\Reward;

use App\Entity\Item\Item;
use App\Repository\Reward\RewardRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RewardRepository::class)]
class Reward
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Item>
     */
    #[ORM\ManyToMany(targetEntity: Item::class)]
    private Collection $items;

    /**
     * @var Collection<int, PlayerReward>
     */
    #[ORM\OneToMany(targetEntity: PlayerReward::class, mappedBy: 'reward', orphanRemoval: true)]
    private Collection $playerRewards;

    public function __construct()
    {
        $this->items = new ArrayCollection();
        $this->playerRewards = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Item>
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(Item $item): static
    {
        if (!$this->items->contains($item)) {
            $this->items->add($item);
        }

        return $this;
    }

    public function removeItem(Item $item): static
    {
        $this->items->removeElement($item);

        return $this;
    }

    /**
     * @return Collection<int, PlayerReward>
     */
    public function getPlayerRewards(): Collection
    {
        return $this->playerRewards;
    }

    public function addPlayerReward(PlayerReward $playerReward): static
    {
        if (!$this->playerRewards->contains($playerReward)) {
            $this->playerRewards->add($playerReward);
            $playerReward->setReward($this);
        }

        return $this;
    }

    public function removePlayerReward(PlayerReward $playerReward): static
    {
        if ($this->playerRewards->removeElement($playerReward)) {
            // set the owning side to null (unless already changed)
            if ($playerReward->getReward() === $this) {
                $playerReward->setReward(null);
            }
        }

        return $this;
    }
}
