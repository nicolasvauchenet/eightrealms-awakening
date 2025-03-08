<?php

namespace App\Entity\Combat;

use App\Entity\Character\Player;
use App\Repository\Combat\PlayerCombatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: PlayerCombatRepository::class)]
class PlayerCombat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\Column]
    #[Gedmo\Timestampable(on: 'create')]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    #[Gedmo\Timestampable(on: 'update')]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Combat $combat = null;

    #[ORM\ManyToOne(inversedBy: 'playerCombats')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Player $player = null;

    /**
     * @var Collection<int, CreaturePlayerCombat>
     */
    #[ORM\OneToMany(targetEntity: CreaturePlayerCombat::class, mappedBy: 'playerCombat', orphanRemoval: true)]
    #[ORM\OrderBy(['id' => 'ASC'])]
    private Collection $creaturePlayerCombats;

    /**
     * @var Collection<int, NpcPlayerCombat>
     */
    #[ORM\OneToMany(targetEntity: NpcPlayerCombat::class, mappedBy: 'playerCombat', orphanRemoval: true)]
    #[ORM\OrderBy(['id' => 'ASC'])]
    private Collection $npcPlayerCombats;

    public function __construct()
    {
        $this->creaturePlayerCombats = new ArrayCollection();
        $this->npcPlayerCombats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getCombat(): ?Combat
    {
        return $this->combat;
    }

    public function setCombat(?Combat $combat): static
    {
        $this->combat = $combat;

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

    /**
     * @return Collection<int, CreaturePlayerCombat>
     */
    public function getCreaturePlayerCombats(): Collection
    {
        return $this->creaturePlayerCombats;
    }

    public function addCreaturePlayerCombat(CreaturePlayerCombat $creaturePlayerCombat): static
    {
        if(!$this->creaturePlayerCombats->contains($creaturePlayerCombat)) {
            $this->creaturePlayerCombats->add($creaturePlayerCombat);
            $creaturePlayerCombat->setPlayerCombat($this);
        }

        return $this;
    }

    public function removeCreaturePlayerCombat(CreaturePlayerCombat $creaturePlayerCombat): static
    {
        if($this->creaturePlayerCombats->removeElement($creaturePlayerCombat)) {
            // set the owning side to null (unless already changed)
            if($creaturePlayerCombat->getPlayerCombat() === $this) {
                $creaturePlayerCombat->setPlayerCombat(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, NpcPlayerCombat>
     */
    public function getNpcPlayerCombats(): Collection
    {
        return $this->npcPlayerCombats;
    }

    public function addNpcPlayerCombat(NpcPlayerCombat $npcPlayerCombat): static
    {
        if(!$this->npcPlayerCombats->contains($npcPlayerCombat)) {
            $this->npcPlayerCombats->add($npcPlayerCombat);
            $npcPlayerCombat->setPlayerCombat($this);
        }

        return $this;
    }

    public function removeNpcPlayerCombat(NpcPlayerCombat $npcPlayerCombat): static
    {
        if($this->npcPlayerCombats->removeElement($npcPlayerCombat)) {
            // set the owning side to null (unless already changed)
            if($npcPlayerCombat->getPlayerCombat() === $this) {
                $npcPlayerCombat->setPlayerCombat(null);
            }
        }

        return $this;
    }
}
