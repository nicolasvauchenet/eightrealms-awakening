<?php

namespace App\Entity\Character;

use App\Entity\Dialogue\Dialogue;
use App\Entity\Item\PlayerNpcItem;
use App\Repository\Character\PlayerNpcRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerNpcRepository::class)]
class PlayerNpc
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $health = null;

    #[ORM\Column]
    private ?int $mana = null;

    #[ORM\Column]
    private ?int $fortune = null;

    #[ORM\Column]
    private ?int $reputation = null;

    #[ORM\ManyToOne(inversedBy: 'playerNpcs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Player $player = null;

    #[ORM\ManyToOne(inversedBy: 'playerNpcs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Npc $npc = null;

    /**
     * @var Collection<int, PlayerNpcItem>
     */
    #[ORM\OneToMany(targetEntity: PlayerNpcItem::class, mappedBy: 'playerNpc', orphanRemoval: true)]
    private Collection $playerNpcItems;

    #[ORM\ManyToOne]
    private ?Dialogue $lastDialogue = null;

    public function __construct()
    {
        $this->playerNpcItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getFortune(): ?int
    {
        return $this->fortune;
    }

    public function setFortune(int $fortune): static
    {
        $this->fortune = $fortune;

        return $this;
    }

    public function getReputation(): ?int
    {
        return $this->reputation;
    }

    public function setReputation(int $reputation): static
    {
        $this->reputation = $reputation;

        return $this;
    }

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function setPlayer(?Player $player): static
    {
        $this->player = $player;

        return $this;
    }

    public function getNpc(): ?Npc
    {
        return $this->npc;
    }

    public function setNpc(?Npc $npc): static
    {
        $this->npc = $npc;

        return $this;
    }

    /**
     * @return Collection<int, PlayerNpcItem>
     */
    public function getPlayerNpcItems(): Collection
    {
        return $this->playerNpcItems;
    }

    public function addPlayerNpcItem(PlayerNpcItem $playerNpcItem): static
    {
        if(!$this->playerNpcItems->contains($playerNpcItem)) {
            $this->playerNpcItems->add($playerNpcItem);
            $playerNpcItem->setPlayerNpc($this);
        }

        return $this;
    }

    public function removePlayerNpcItem(PlayerNpcItem $playerNpcItem): static
    {
        if($this->playerNpcItems->removeElement($playerNpcItem)) {
            // set the owning side to null (unless already changed)
            if($playerNpcItem->getPlayerNpc() === $this) {
                $playerNpcItem->setPlayerNpc(null);
            }
        }

        return $this;
    }

    public function getLastDialogue(): ?Dialogue
    {
        return $this->lastDialogue;
    }

    public function setLastDialogue(?Dialogue $lastDialogue): static
    {
        $this->lastDialogue = $lastDialogue;

        return $this;
    }
}
