<?php

namespace App\Entity\Character;

use App\Entity\Location\Location;
use App\Entity\Location\Place;
use App\Entity\Quest\CharacterQuest;
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

    #[ORM\Column]
    private ?int $healthMax = null;

    #[ORM\Column]
    private ?int $manaMax = null;

    #[ORM\Column]
    private ?bool $alive = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $lastActiveAt = null;

    #[ORM\OneToOne(inversedBy: 'player', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $owner = null;

    #[ORM\ManyToOne(inversedBy: 'players')]
    private ?Place $currentPlace = null;

    /**
     * @var Collection<int, Location>
     */
    #[ORM\ManyToMany(targetEntity: Location::class, inversedBy: 'players')]
    private Collection $visitedLocations;

    /**
     * @var Collection<int, Place>
     */
    #[ORM\ManyToMany(targetEntity: Place::class, inversedBy: 'visitedPlayers')]
    private Collection $visitedPlaces;

    /**
     * @var Collection<int, CharacterQuest>
     */
    #[ORM\OneToMany(targetEntity: CharacterQuest::class, mappedBy: 'character')]
    private Collection $characterQuests;

    /**
     * @var Collection<int, PlayerNpc>
     */
    #[ORM\OneToMany(targetEntity: PlayerNpc::class, mappedBy: 'player')]
    private Collection $playerNpcs;

    /**
     * @var Collection<int, PlayerCreature>
     */
    #[ORM\OneToMany(targetEntity: PlayerCreature::class, mappedBy: 'player')]
    private Collection $playerCreatures;

    public function __construct()
    {
        parent::__construct();
        $this->visitedLocations = new ArrayCollection();
        $this->visitedPlaces = new ArrayCollection();
        $this->characterQuests = new ArrayCollection();
        $this->playerNpcs = new ArrayCollection();
        $this->playerCreatures = new ArrayCollection();
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

    public function getHealthMax(): ?int
    {
        return $this->healthMax;
    }

    public function setHealthMax(int $healthMax): static
    {
        $this->healthMax = $healthMax;

        return $this;
    }

    public function getManaMax(): ?int
    {
        return $this->manaMax;
    }

    public function setManaMax(int $manaMax): static
    {
        $this->manaMax = $manaMax;

        return $this;
    }

    public function isAlive(): ?bool
    {
        return $this->alive;
    }

    public function setAlive(bool $alive): static
    {
        $this->alive = $alive;

        return $this;
    }

    public function getLastActiveAt(): ?\DateTimeImmutable
    {
        return $this->lastActiveAt;
    }

    public function setLastActiveAt(?\DateTimeImmutable $lastActiveAt): static
    {
        $this->lastActiveAt = $lastActiveAt;

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

    public function getCurrentPlace(): ?Place
    {
        return $this->currentPlace;
    }

    public function setCurrentPlace(?Place $currentPlace): static
    {
        $this->currentPlace = $currentPlace;

        return $this;
    }

    /**
     * @return Collection<int, Location>
     */
    public function getVisitedLocations(): Collection
    {
        return $this->visitedLocations;
    }

    public function addVisitedLocation(Location $visitedLocation): static
    {
        if(!$this->visitedLocations->contains($visitedLocation)) {
            $this->visitedLocations->add($visitedLocation);
        }

        return $this;
    }

    public function removeVisitedLocation(Location $visitedLocation): static
    {
        $this->visitedLocations->removeElement($visitedLocation);

        return $this;
    }

    /**
     * @return Collection<int, Place>
     */
    public function getVisitedPlaces(): Collection
    {
        return $this->visitedPlaces;
    }

    public function addVisitedPlace(Place $visitedPlace): static
    {
        if(!$this->visitedPlaces->contains($visitedPlace)) {
            $this->visitedPlaces->add($visitedPlace);
        }

        return $this;
    }

    public function removeVisitedPlace(Place $visitedPlace): static
    {
        $this->visitedPlaces->removeElement($visitedPlace);

        return $this;
    }

    /**
     * @return Collection<int, CharacterQuest>
     */
    public function getCharacterQuests(): Collection
    {
        return $this->characterQuests;
    }

    public function addCharacterQuest(CharacterQuest $characterQuest): static
    {
        if(!$this->characterQuests->contains($characterQuest)) {
            $this->characterQuests->add($characterQuest);
            $characterQuest->setCharacter($this);
        }

        return $this;
    }

    public function removeCharacterQuest(CharacterQuest $characterQuest): static
    {
        if($this->characterQuests->removeElement($characterQuest)) {
            // set the owning side to null (unless already changed)
            if($characterQuest->getCharacter() === $this) {
                $characterQuest->setCharacter(null);
            }
        }

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
     * @return Collection<int, PlayerCreature>
     */
    public function getPlayerCreatures(): Collection
    {
        return $this->playerCreatures;
    }

    public function addPlayerCreature(PlayerCreature $playerCreature): static
    {
        if(!$this->playerCreatures->contains($playerCreature)) {
            $this->playerCreatures->add($playerCreature);
            $playerCreature->setPlayer($this);
        }

        return $this;
    }

    public function removePlayerCreature(PlayerCreature $playerCreature): static
    {
        if($this->playerCreatures->removeElement($playerCreature)) {
            // set the owning side to null (unless already changed)
            if($playerCreature->getPlayer() === $this) {
                $playerCreature->setPlayer(null);
            }
        }

        return $this;
    }
}
