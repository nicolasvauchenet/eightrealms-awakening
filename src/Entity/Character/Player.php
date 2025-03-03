<?php

namespace App\Entity\Character;

use App\Entity\Combat\PlayerCombat;
use App\Entity\Location\Location;
use App\Entity\Location\PlayerLocation;
use App\Entity\Quest\PlayerQuest;
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

    /**
     * @var Collection<int, PlayerCreature>
     */
    #[ORM\OneToMany(targetEntity: PlayerCreature::class, mappedBy: 'player', orphanRemoval: true)]
    private Collection $playerCreatures;

    /**
     * @var Collection<int, PlayerQuest>
     */
    #[ORM\OneToMany(targetEntity: PlayerQuest::class, mappedBy: 'player', orphanRemoval: true)]
    private Collection $playerQuests;

    /**
     * @var Collection<int, PlayerCombat>
     */
    #[ORM\OneToMany(targetEntity: PlayerCombat::class, mappedBy: 'player', orphanRemoval: true)]
    private Collection $playerCombats;

    public function __construct()
    {
        parent::__construct();
        $this->playerNpcs = new ArrayCollection();
        $this->playerLocations = new ArrayCollection();
        $this->playerCreatures = new ArrayCollection();
        $this->playerQuests = new ArrayCollection();
        $this->playerCombats = new ArrayCollection();
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

    /**
     * @return Collection<int, PlayerCreature>
     */
    public function getPlayerCreatures(): Collection
    {
        return $this->playerCreatures;
    }

    public function addPlayerCreature(PlayerCreature $playerCreature): static
    {
        if (!$this->playerCreatures->contains($playerCreature)) {
            $this->playerCreatures->add($playerCreature);
            $playerCreature->setPlayer($this);
        }

        return $this;
    }

    public function removePlayerCreature(PlayerCreature $playerCreature): static
    {
        if ($this->playerCreatures->removeElement($playerCreature)) {
            // set the owning side to null (unless already changed)
            if ($playerCreature->getPlayer() === $this) {
                $playerCreature->setPlayer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PlayerQuest>
     */
    public function getPlayerQuests(): Collection
    {
        return $this->playerQuests;
    }

    public function addPlayerQuest(PlayerQuest $playerQuest): static
    {
        if (!$this->playerQuests->contains($playerQuest)) {
            $this->playerQuests->add($playerQuest);
            $playerQuest->setPlayer($this);
        }

        return $this;
    }

    public function removePlayerQuest(PlayerQuest $playerQuest): static
    {
        if ($this->playerQuests->removeElement($playerQuest)) {
            // set the owning side to null (unless already changed)
            if ($playerQuest->getPlayer() === $this) {
                $playerQuest->setPlayer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PlayerCombat>
     */
    public function getPlayerCombats(): Collection
    {
        return $this->playerCombats;
    }

    public function addPlayerCombat(PlayerCombat $playerCombat): static
    {
        if (!$this->playerCombats->contains($playerCombat)) {
            $this->playerCombats->add($playerCombat);
            $playerCombat->setPlayer($this);
        }

        return $this;
    }

    public function removePlayerCombat(PlayerCombat $playerCombat): static
    {
        if ($this->playerCombats->removeElement($playerCombat)) {
            // set the owning side to null (unless already changed)
            if ($playerCombat->getPlayer() === $this) {
                $playerCombat->setPlayer(null);
            }
        }

        return $this;
    }
}
