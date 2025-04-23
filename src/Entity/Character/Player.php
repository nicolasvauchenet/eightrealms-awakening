<?php

namespace App\Entity\Character;

use App\Entity\Combat\PlayerCombat;
use App\Entity\Location\Location;
use App\Entity\Quest\PlayerQuest;
use App\Entity\Quest\PlayerQuestStep;
use App\Entity\Screen\Screen;
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

    #[ORM\OneToOne(inversedBy: 'player', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false, onDelete: 'CASCADE')]
    private ?User $owner = null;

    /**
     * @var Collection<int, PlayerNpc>
     */
    #[ORM\OneToMany(targetEntity: PlayerNpc::class, mappedBy: 'player', orphanRemoval: true)]
    private Collection $playerNpcs;

    #[ORM\ManyToOne]
    private ?Location $currentLocation = null;

    /**
     * @var Collection<int, PlayerQuest>
     */
    #[ORM\OneToMany(targetEntity: PlayerQuest::class, mappedBy: 'player', orphanRemoval: true)]
    private Collection $playerQuests;

    /**
     * @var Collection<int, PlayerQuestStep>
     */
    #[ORM\OneToMany(targetEntity: PlayerQuestStep::class, mappedBy: 'player', orphanRemoval: true)]
    private Collection $playerQuestSteps;

    #[ORM\ManyToOne]
    private ?Screen $currentScreen = null;

    /**
     * @var Collection<int, PlayerCombat>
     */
    #[ORM\OneToMany(targetEntity: PlayerCombat::class, mappedBy: 'player', orphanRemoval: true)]
    private Collection $playerCombats;

    public function __construct()
    {
        $this->playerNpcs = new ArrayCollection();
        $this->playerQuests = new ArrayCollection();
        $this->playerQuestSteps = new ArrayCollection();
        $this->playerCombats = new ArrayCollection();
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

    public function getCurrentLocation(): ?Location
    {
        return $this->currentLocation;
    }

    public function setCurrentLocation(?Location $currentLocation): static
    {
        $this->currentLocation = $currentLocation;

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
     * @return Collection<int, PlayerQuestStep>
     */
    public function getPlayerQuestSteps(): Collection
    {
        return $this->playerQuestSteps;
    }

    public function addPlayerQuestStep(PlayerQuestStep $playerQuestStep): static
    {
        if (!$this->playerQuestSteps->contains($playerQuestStep)) {
            $this->playerQuestSteps->add($playerQuestStep);
            $playerQuestStep->setPlayer($this);
        }

        return $this;
    }

    public function removePlayerQuestStep(PlayerQuestStep $playerQuestStep): static
    {
        if ($this->playerQuestSteps->removeElement($playerQuestStep)) {
            // set the owning side to null (unless already changed)
            if ($playerQuestStep->getPlayer() === $this) {
                $playerQuestStep->setPlayer(null);
            }
        }

        return $this;
    }

    public function getCurrentScreen(): ?Screen
    {
        return $this->currentScreen;
    }

    public function setCurrentScreen(?Screen $currentScreen): static
    {
        $this->currentScreen = $currentScreen;

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
