<?php

namespace App\Entity\Character;

use App\Entity\Location\Location;
use App\Entity\PlayerLocation;
use App\Entity\User;
use App\Repository\Character\PlayerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerRepository::class)]
class Player extends Character
{
    #[ORM\Column]
    private ?int $level = null;

    #[ORM\Column]
    private ?int $experience = null;

    #[ORM\OneToOne(inversedBy: 'character', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?User $owner = null;

    #[ORM\ManyToOne]
    private ?Location $location = null;

    /**
     * @var Collection<int, PlayerNpc>
     */
    #[ORM\OneToMany(targetEntity: PlayerNpc::class, mappedBy: 'player', orphanRemoval: true)]
    private Collection $playerNpcs;

    /**
     * @var Collection<int, PlayerLocation>
     */
    #[ORM\OneToMany(targetEntity: PlayerLocation::class, mappedBy: 'player', orphanRemoval: true)]
    private Collection $playerLocations;

    public function __construct()
    {
        parent::__construct();
        $this->playerNpcs = new ArrayCollection();
        $this->playerLocations = new ArrayCollection();
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

    public function getExperience(): ?int
    {
        return $this->experience;
    }

    public function setExperience(int $experience): static
    {
        $this->experience = $experience;

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

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): static
    {
        $this->location = $location;

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
        if(!$this->playerNpcs->contains($playerNpc)) {
            $this->playerNpcs->add($playerNpc);
            $playerNpc->setPlayer($this);
        }

        return $this;
    }

    public function removePlayerNpc(PlayerNpc $playerNpc): static
    {
        if($this->playerNpcs->removeElement($playerNpc)) {
            // set the owning side to null (unless already changed)
            if($playerNpc->getPlayer() === $this) {
                $playerNpc->setPlayer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PlayerLocation>
     */
    public function getPlayerLocations(): Collection
    {
        return $this->playerLocations;
    }

    public function addPlayerLocation(PlayerLocation $playerLocation): static
    {
        if(!$this->playerLocations->contains($playerLocation)) {
            $this->playerLocations->add($playerLocation);
            $playerLocation->setPlayer($this);
        }

        return $this;
    }

    public function removePlayerLocation(PlayerLocation $playerLocation): static
    {
        if($this->playerLocations->removeElement($playerLocation)) {
            // set the owning side to null (unless already changed)
            if($playerLocation->getPlayer() === $this) {
                $playerLocation->setPlayer(null);
            }
        }

        return $this;
    }
}
