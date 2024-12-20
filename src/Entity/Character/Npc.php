<?php

namespace App\Entity\Character;

use App\Entity\Screen\DialogueScreen;
use App\Entity\Screen\PlaceScreen;
use App\Repository\Character\NpcRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NpcRepository::class)]
class Npc extends Character
{
    #[ORM\Column]
    private ?int $level = null;

    #[ORM\Column]
    private ?bool $alive = null;

    /**
     * @var Collection<int, PlaceScreen>
     */
    #[ORM\ManyToMany(targetEntity: PlaceScreen::class, mappedBy: 'npcs')]
    private Collection $placeScreens;

    /**
     * @var Collection<int, DialogueScreen>
     */
    #[ORM\OneToMany(targetEntity: DialogueScreen::class, mappedBy: 'npc')]
    private Collection $dialogueScreens;

    public function __construct()
    {
        parent::__construct();
        $this->placeScreens = new ArrayCollection();
        $this->dialogueScreens = new ArrayCollection();
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

    public function isAlive(): ?bool
    {
        return $this->alive;
    }

    public function setAlive(bool $alive): static
    {
        $this->alive = $alive;

        return $this;
    }

    /**
     * @return Collection<int, PlaceScreen>
     */
    public function getPlaceScreens(): Collection
    {
        return $this->placeScreens;
    }

    public function addPlaceScreen(PlaceScreen $placeScreen): static
    {
        if(!$this->placeScreens->contains($placeScreen)) {
            $this->placeScreens->add($placeScreen);
            $placeScreen->addNpc($this);
        }

        return $this;
    }

    public function removePlaceScreen(PlaceScreen $placeScreen): static
    {
        if($this->placeScreens->removeElement($placeScreen)) {
            $placeScreen->removeNpc($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, DialogueScreen>
     */
    public function getDialogueScreens(): Collection
    {
        return $this->dialogueScreens;
    }

    public function addDialogueScreen(DialogueScreen $dialogueScreen): static
    {
        if(!$this->dialogueScreens->contains($dialogueScreen)) {
            $this->dialogueScreens->add($dialogueScreen);
            $dialogueScreen->setNpc($this);
        }

        return $this;
    }

    public function removeDialogueScreen(DialogueScreen $dialogueScreen): static
    {
        if($this->dialogueScreens->removeElement($dialogueScreen)) {
            // set the owning side to null (unless already changed)
            if($dialogueScreen->getNpc() === $this) {
                $dialogueScreen->setNpc(null);
            }
        }

        return $this;
    }
}
