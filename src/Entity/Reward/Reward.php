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

    #[ORM\Column(length: 255)]
    private ?string $picture = null;

    #[ORM\Column(nullable: true)]
    private ?int $crowns = null;

    #[ORM\Column(nullable: true)]
    private ?int $experience = null;

    /**
     * @var Collection<int, PlayerReward>
     */
    #[ORM\OneToMany(targetEntity: PlayerReward::class, mappedBy: 'reward', orphanRemoval: true)]
    private Collection $playerRewards;

    /**
     * @var Collection<int, RewardItem>
     */
    #[ORM\OneToMany(targetEntity: RewardItem::class, mappedBy: 'reward', orphanRemoval: true)]
    private Collection $rewardItems;

    /**
     * @var Collection<int, RewardLocation>
     */
    #[ORM\OneToMany(targetEntity: RewardLocation::class, mappedBy: 'reward', orphanRemoval: true)]
    private Collection $rewardLocations;

    public function __construct()
    {
        $this->playerRewards = new ArrayCollection();
        $this->rewardItems = new ArrayCollection();
        $this->rewardLocations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): static
    {
        $this->picture = $picture;

        return $this;
    }

    public function getCrowns(): ?int
    {
        return $this->crowns;
    }

    public function setCrowns(?int $crowns): static
    {
        $this->crowns = $crowns;

        return $this;
    }

    public function getExperience(): ?int
    {
        return $this->experience;
    }

    public function setExperience(?int $experience): static
    {
        $this->experience = $experience;

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
        if(!$this->playerRewards->contains($playerReward)) {
            $this->playerRewards->add($playerReward);
            $playerReward->setReward($this);
        }

        return $this;
    }

    public function removePlayerReward(PlayerReward $playerReward): static
    {
        if($this->playerRewards->removeElement($playerReward)) {
            // set the owning side to null (unless already changed)
            if($playerReward->getReward() === $this) {
                $playerReward->setReward(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, RewardItem>
     */
    public function getRewardItems(): Collection
    {
        return $this->rewardItems;
    }

    public function addRewardItem(RewardItem $rewardItem): static
    {
        if(!$this->rewardItems->contains($rewardItem)) {
            $this->rewardItems->add($rewardItem);
            $rewardItem->setReward($this);
        }

        return $this;
    }

    public function removeRewardItem(RewardItem $rewardItem): static
    {
        if($this->rewardItems->removeElement($rewardItem)) {
            // set the owning side to null (unless already changed)
            if($rewardItem->getReward() === $this) {
                $rewardItem->setReward(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, RewardLocation>
     */
    public function getRewardLocations(): Collection
    {
        return $this->rewardLocations;
    }

    public function addRewardLocation(RewardLocation $rewardLocation): static
    {
        if (!$this->rewardLocations->contains($rewardLocation)) {
            $this->rewardLocations->add($rewardLocation);
            $rewardLocation->setReward($this);
        }

        return $this;
    }

    public function removeRewardLocation(RewardLocation $rewardLocation): static
    {
        if ($this->rewardLocations->removeElement($rewardLocation)) {
            // set the owning side to null (unless already changed)
            if ($rewardLocation->getReward() === $this) {
                $rewardLocation->setReward(null);
            }
        }

        return $this;
    }
}
