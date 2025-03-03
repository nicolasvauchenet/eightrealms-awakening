<?php

namespace App\Entity\Combat;

use App\Entity\Location\Location;
use App\Entity\Quest\Quest;
use App\Entity\Quest\Step;
use App\Entity\Screen\CombatScreen;
use App\Repository\Combat\CombatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CombatRepository::class)]
class Combat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'combats')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Location $location = null;

    #[ORM\ManyToOne]
    private ?Quest $quest = null;

    #[ORM\ManyToOne(inversedBy: 'combats')]
    private ?Step $step = null;

    /**
     * @var Collection<int, NpcCombat>
     */
    #[ORM\OneToMany(targetEntity: NpcCombat::class, mappedBy: 'combat', orphanRemoval: true)]
    private Collection $npcCombats;

    /**
     * @var Collection<int, CreatureCombat>
     */
    #[ORM\OneToMany(targetEntity: CreatureCombat::class, mappedBy: 'combat', orphanRemoval: true)]
    private Collection $creatureCombats;

    #[ORM\ManyToOne(inversedBy: 'combats')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CombatScreen $combatScreen = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $picture = null;

    public function __construct()
    {
        $this->npcCombats = new ArrayCollection();
        $this->creatureCombats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

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

    public function getQuest(): ?Quest
    {
        return $this->quest;
    }

    public function setQuest(?Quest $quest): static
    {
        $this->quest = $quest;

        return $this;
    }

    public function getStep(): ?Step
    {
        return $this->step;
    }

    public function setStep(?Step $step): static
    {
        $this->step = $step;

        return $this;
    }

    /**
     * @return Collection<int, NpcCombat>
     */
    public function getNpcCombats(): Collection
    {
        return $this->npcCombats;
    }

    public function addNpcCombat(NpcCombat $npcCombat): static
    {
        if (!$this->npcCombats->contains($npcCombat)) {
            $this->npcCombats->add($npcCombat);
            $npcCombat->setCombat($this);
        }

        return $this;
    }

    public function removeNpcCombat(NpcCombat $npcCombat): static
    {
        if ($this->npcCombats->removeElement($npcCombat)) {
            // set the owning side to null (unless already changed)
            if ($npcCombat->getCombat() === $this) {
                $npcCombat->setCombat(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CreatureCombat>
     */
    public function getCreatureCombats(): Collection
    {
        return $this->creatureCombats;
    }

    public function addCreatureCombat(CreatureCombat $creatureCombat): static
    {
        if (!$this->creatureCombats->contains($creatureCombat)) {
            $this->creatureCombats->add($creatureCombat);
            $creatureCombat->setCombat($this);
        }

        return $this;
    }

    public function removeCreatureCombat(CreatureCombat $creatureCombat): static
    {
        if ($this->creatureCombats->removeElement($creatureCombat)) {
            // set the owning side to null (unless already changed)
            if ($creatureCombat->getCombat() === $this) {
                $creatureCombat->setCombat(null);
            }
        }

        return $this;
    }

    public function getCombatScreen(): ?CombatScreen
    {
        return $this->combatScreen;
    }

    public function setCombatScreen(?CombatScreen $combatScreen): static
    {
        $this->combatScreen = $combatScreen;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): static
    {
        $this->picture = $picture;

        return $this;
    }
}
