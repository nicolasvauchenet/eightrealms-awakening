<?php

namespace App\Entity\Character;

use App\Entity\User;
use App\Repository\Character\PlayerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerRepository::class)]
class Player extends Character
{
    #[ORM\Column]
    private ?int $experience = null;

    #[ORM\Column]
    private ?int $level = null;

    #[ORM\Column]
    private ?int $health = null;

    #[ORM\Column]
    private ?int $mana = null;

    #[ORM\OneToOne(inversedBy: 'player', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $owner = null;

    /**
     * @var Collection<int, PlayerNpc>
     */
    #[ORM\OneToMany(targetEntity: PlayerNpc::class, mappedBy: 'player', orphanRemoval: true)]
    private Collection $playerNpcs;

    public function __construct()
    {
        $this->playerNpcs = new ArrayCollection();
    }

    public function getExperience(): ?int
    {
        return $this->experience;
    }

    public function setExperience(int $experience): static
    {
        $this->experience = $experience;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): static
    {
        $this->level = $level;

        return $this;
    }

    public function getHealth(): ?int
    {
        return $this->health;
    }

    public function setHealth(int $health): static
    {
        $this->health = $health;

        return $this;
    }

    public function getMana(): ?int
    {
        return $this->mana;
    }

    public function setMana(int $mana): static
    {
        $this->mana = $mana;

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(User $owner): static
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return Collection<int, PlayerNpc>
     */
    public function getPlayerNpcs(): Collection
    {
        return $this->playerNpcs;
    }

    public function addPlayerNpc(PlayerNpc $playerNpc): static
    {
        if (!$this->playerNpcs->contains($playerNpc)) {
            $this->playerNpcs->add($playerNpc);
            $playerNpc->setPlayer($this);
        }

        return $this;
    }

    public function removePlayerNpc(PlayerNpc $playerNpc): static
    {
        if ($this->playerNpcs->removeElement($playerNpc)) {
            // set the owning side to null (unless already changed)
            if ($playerNpc->getPlayer() === $this) {
                $playerNpc->setPlayer(null);
            }
        }

        return $this;
    }
}
