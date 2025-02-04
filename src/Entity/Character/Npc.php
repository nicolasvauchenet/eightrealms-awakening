<?php

namespace App\Entity\Character;

use App\Entity\Location\Place;
use App\Entity\Scene\CombatScene;
use App\Entity\Scene\CombatSceneNpc;
use App\Entity\Scene\DialogueScene;
use App\Entity\Scene\TradeScene;
use App\Entity\Screen\CombatScreen;
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

    /**
     * @var Collection<int, PlayerNpc>
     */
    #[ORM\OneToMany(targetEntity: PlayerNpc::class, mappedBy: 'npc')]
    private Collection $playerNpcs;

    /**
     * @var Collection<int, CombatScreen>
     */
    #[ORM\ManyToMany(targetEntity: CombatScreen::class, mappedBy: 'npcs')]
    private Collection $combatScreens;

    /**
     * @var Collection<int, CombatScene>
     */
    #[ORM\ManyToMany(targetEntity: CombatScene::class, mappedBy: 'npcs')]
    private Collection $combatScenes;

    /**
     * @var Collection<int, CombatSceneNpc>
     */
    #[ORM\OneToMany(targetEntity: CombatSceneNpc::class, mappedBy: 'npc')]
    private Collection $combatSceneNpcs;

    public function __construct()
    {
        parent::__construct();
        $this->placeScreens = new ArrayCollection();
        $this->dialogueScreens = new ArrayCollection();
        $this->dialogueScenes = new ArrayCollection();
        $this->tradeScreens = new ArrayCollection();
        $this->tradeScenes = new ArrayCollection();
        $this->playerNpcs = new ArrayCollection();
        $this->combatScreens = new ArrayCollection();
        $this->combatScenes = new ArrayCollection();
        $this->combatSceneNpcs = new ArrayCollection();
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
            $playerNpc->setNpc($this);
        }

        return $this;
    }

    public function removePlayerNpc(PlayerNpc $playerNpc): static
    {
        if ($this->playerNpcs->removeElement($playerNpc)) {
            // set the owning side to null (unless already changed)
            if ($playerNpc->getNpc() === $this) {
                $playerNpc->setNpc(null);
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
            $combatScreen->addNpc($this);
        }

        return $this;
    }

    public function removeCombatScreen(CombatScreen $combatScreen): static
    {
        if ($this->combatScreens->removeElement($combatScreen)) {
            $combatScreen->removeNpc($this);
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
            $combatScene->addNpc($this);
        }

        return $this;
    }

    public function removeCombatScene(CombatScene $combatScene): static
    {
        if ($this->combatScenes->removeElement($combatScene)) {
            $combatScene->removeNpc($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, CombatSceneNpc>
     */
    public function getCombatSceneNpcs(): Collection
    {
        return $this->combatSceneNpcs;
    }

    public function addCombatSceneNpc(CombatSceneNpc $combatSceneNpc): static
    {
        if (!$this->combatSceneNpcs->contains($combatSceneNpc)) {
            $this->combatSceneNpcs->add($combatSceneNpc);
            $combatSceneNpc->setNpc($this);
        }

        return $this;
    }

    public function removeCombatSceneNpc(CombatSceneNpc $combatSceneNpc): static
    {
        if ($this->combatSceneNpcs->removeElement($combatSceneNpc)) {
            // set the owning side to null (unless already changed)
            if ($combatSceneNpc->getNpc() === $this) {
                $combatSceneNpc->setNpc(null);
            }
        }

        return $this;
    }
}
