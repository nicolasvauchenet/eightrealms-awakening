<?php

namespace App\Entity\Character;

use App\Entity\Combat\NpcCombat;
use App\Entity\Dialogue\Dialogue;
use App\Entity\Location\Location;
use App\Entity\Screen\InteractionScreen;
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
     * @var Collection<int, PlayerNpc>
     */
    #[ORM\OneToMany(targetEntity: PlayerNpc::class, mappedBy: 'npc', orphanRemoval: true)]
    private Collection $playerNpcs;

    #[ORM\ManyToOne(inversedBy: 'npcs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Location $location = null;

    /**
     * @var Collection<int, Dialogue>
     */
    #[ORM\OneToMany(targetEntity: Dialogue::class, mappedBy: 'npc', orphanRemoval: true)]
    private Collection $dialogues;

    /**
     * @var Collection<int, NpcCombat>
     */
    #[ORM\OneToMany(targetEntity: NpcCombat::class, mappedBy: 'npc', orphanRemoval: true)]
    private Collection $npcCombats;

    public function __construct()
    {
        parent::__construct();
        $this->playerNpcs = new ArrayCollection();
        $this->dialogues = new ArrayCollection();
        $this->npcCombats = new ArrayCollection();
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
            $playerNpc->setNpc($this);
        }

        return $this;
    }

    public function removePlayerNpc(PlayerNpc $playerNpc): static
    {
        if($this->playerNpcs->removeElement($playerNpc)) {
            // set the owning side to null (unless already changed)
            if($playerNpc->getNpc() === $this) {
                $playerNpc->setNpc(null);
            }
        }

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
     * @return Collection<int, Dialogue>
     */
    public function getDialogues(): Collection
    {
        return $this->dialogues;
    }

    public function addDialogue(Dialogue $dialogue): static
    {
        if(!$this->dialogues->contains($dialogue)) {
            $this->dialogues->add($dialogue);
            $dialogue->setNpc($this);
        }

        return $this;
    }

    public function removeDialogue(Dialogue $dialogue): static
    {
        if($this->dialogues->removeElement($dialogue)) {
            // set the owning side to null (unless already changed)
            if($dialogue->getNpc() === $this) {
                $dialogue->setNpc(null);
            }
        }

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
            $npcCombat->setNpc($this);
        }

        return $this;
    }

    public function removeNpcCombat(NpcCombat $npcCombat): static
    {
        if ($this->npcCombats->removeElement($npcCombat)) {
            // set the owning side to null (unless already changed)
            if ($npcCombat->getNpc() === $this) {
                $npcCombat->setNpc(null);
            }
        }

        return $this;
    }
}
