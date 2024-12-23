<?php

namespace App\Entity\Character;

use App\Entity\Location\Place;
use App\Entity\Scene\DialogueScene;
use App\Entity\Scene\TradeScene;
use App\Entity\Screen\DialogueScreen;
use App\Entity\Screen\PlaceScreen;
use App\Entity\Screen\TradeScreen;
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

    /**
     * @var Collection<int, DialogueScene>
     */
    #[ORM\OneToMany(targetEntity: DialogueScene::class, mappedBy: 'npc')]
    private Collection $dialogueScenes;

    /**
     * @var Collection<int, TradeScreen>
     */
    #[ORM\OneToMany(targetEntity: TradeScreen::class, mappedBy: 'npc')]
    private Collection $tradeScreens;

    /**
     * @var Collection<int, TradeScene>
     */
    #[ORM\OneToMany(targetEntity: TradeScene::class, mappedBy: 'npc')]
    private Collection $tradeScenes;

    public function __construct()
    {
        parent::__construct();
        $this->placeScreens = new ArrayCollection();
        $this->dialogueScreens = new ArrayCollection();
        $this->dialogueScenes = new ArrayCollection();
        $this->tradeScreens = new ArrayCollection();
        $this->tradeScenes = new ArrayCollection();
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

    /**
     * @return Collection<int, DialogueScene>
     */
    public function getDialogueScenes(): Collection
    {
        return $this->dialogueScenes;
    }

    public function addDialogueScene(DialogueScene $dialogueScene): static
    {
        if (!$this->dialogueScenes->contains($dialogueScene)) {
            $this->dialogueScenes->add($dialogueScene);
            $dialogueScene->setNpc($this);
        }

        return $this;
    }

    public function removeDialogueScene(DialogueScene $dialogueScene): static
    {
        if ($this->dialogueScenes->removeElement($dialogueScene)) {
            // set the owning side to null (unless already changed)
            if ($dialogueScene->getNpc() === $this) {
                $dialogueScene->setNpc(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, TradeScreen>
     */
    public function getTradeScreens(): Collection
    {
        return $this->tradeScreens;
    }

    public function addTradeScreen(TradeScreen $tradeScreen): static
    {
        if (!$this->tradeScreens->contains($tradeScreen)) {
            $this->tradeScreens->add($tradeScreen);
            $tradeScreen->setNpc($this);
        }

        return $this;
    }

    public function removeTradeScreen(TradeScreen $tradeScreen): static
    {
        if ($this->tradeScreens->removeElement($tradeScreen)) {
            // set the owning side to null (unless already changed)
            if ($tradeScreen->getNpc() === $this) {
                $tradeScreen->setNpc(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, TradeScene>
     */
    public function getTradeScenes(): Collection
    {
        return $this->tradeScenes;
    }

    public function addTradeScene(TradeScene $tradeScene): static
    {
        if (!$this->tradeScenes->contains($tradeScene)) {
            $this->tradeScenes->add($tradeScene);
            $tradeScene->setNpc($this);
        }

        return $this;
    }

    public function removeTradeScene(TradeScene $tradeScene): static
    {
        if ($this->tradeScenes->removeElement($tradeScene)) {
            // set the owning side to null (unless already changed)
            if ($tradeScene->getNpc() === $this) {
                $tradeScene->setNpc(null);
            }
        }

        return $this;
    }
}
