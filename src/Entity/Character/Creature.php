<?php

namespace App\Entity\Character;

use App\Entity\Scene\CombatScene;
use App\Entity\Scene\CombatSceneCreature;
use App\Entity\Screen\CombatScreen;
use App\Repository\Character\CreatureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CreatureRepository::class)]
class Creature extends Character
{
    #[ORM\Column]
    private ?int $level = null;

    /**
     * @var Collection<int, PlayerCreature>
     */
    #[ORM\OneToMany(targetEntity: PlayerCreature::class, mappedBy: 'creature')]
    private Collection $playerCreatures;

    /**
     * @var Collection<int, CombatScreen>
     */
    #[ORM\ManyToMany(targetEntity: CombatScreen::class, mappedBy: 'creatures')]
    private Collection $combatScreens;

    /**
     * @var Collection<int, CombatScene>
     */
    #[ORM\ManyToMany(targetEntity: CombatScene::class, mappedBy: 'creatures')]
    private Collection $combatScenes;

    /**
     * @var Collection<int, CombatSceneCreature>
     */
    #[ORM\OneToMany(targetEntity: CombatSceneCreature::class, mappedBy: 'creature')]
    private Collection $combatSceneCreatures;

    public function __construct()
    {
        parent::__construct();
        $this->playerCreatures = new ArrayCollection();
        $this->combatScreens = new ArrayCollection();
        $this->combatScenes = new ArrayCollection();
        $this->combatSceneCreatures = new ArrayCollection();
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
            $playerCreature->setCreature($this);
        }

        return $this;
    }

    public function removePlayerCreature(PlayerCreature $playerCreature): static
    {
        if ($this->playerCreatures->removeElement($playerCreature)) {
            // set the owning side to null (unless already changed)
            if ($playerCreature->getCreature() === $this) {
                $playerCreature->setCreature(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CombatScreen>
     */
    public function getCombatScreens(): Collection
    {
        return $this->combatScreens;
    }

    public function addCombatScreen(CombatScreen $combatScreen): static
    {
        if (!$this->combatScreens->contains($combatScreen)) {
            $this->combatScreens->add($combatScreen);
            $combatScreen->addCreature($this);
        }

        return $this;
    }

    public function removeCombatScreen(CombatScreen $combatScreen): static
    {
        if ($this->combatScreens->removeElement($combatScreen)) {
            $combatScreen->removeCreature($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, CombatScene>
     */
    public function getCombatScenes(): Collection
    {
        return $this->combatScenes;
    }

    public function addCombatScene(CombatScene $combatScene): static
    {
        if (!$this->combatScenes->contains($combatScene)) {
            $this->combatScenes->add($combatScene);
            $combatScene->addCreature($this);
        }

        return $this;
    }

    public function removeCombatScene(CombatScene $combatScene): static
    {
        if ($this->combatScenes->removeElement($combatScene)) {
            $combatScene->removeCreature($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, CombatSceneCreature>
     */
    public function getCombatSceneCreatures(): Collection
    {
        return $this->combatSceneCreatures;
    }

    public function addCombatSceneCreature(CombatSceneCreature $combatSceneCreature): static
    {
        if (!$this->combatSceneCreatures->contains($combatSceneCreature)) {
            $this->combatSceneCreatures->add($combatSceneCreature);
            $combatSceneCreature->setCreature($this);
        }

        return $this;
    }

    public function removeCombatSceneCreature(CombatSceneCreature $combatSceneCreature): static
    {
        if ($this->combatSceneCreatures->removeElement($combatSceneCreature)) {
            // set the owning side to null (unless already changed)
            if ($combatSceneCreature->getCreature() === $this) {
                $combatSceneCreature->setCreature(null);
            }
        }

        return $this;
    }
}
