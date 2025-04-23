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
    private ?int $currentRound = null;

    #[ORM\Column]
    private ?int $currentTurn = null;

    #[ORM\Column(nullable: true)]
    private ?array $turnOrder = null;

    #[ORM\Column]
    #[Gedmo\Timestampable(on: 'update')]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'playerCombats')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Player $player = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Combat $combat = null;

    /**
     * @var Collection<int, PlayerCombatEnemy>
     */
    #[ORM\OneToMany(targetEntity: PlayerCombatEnemy::class, mappedBy: 'playerCombat', orphanRemoval: true)]
    private Collection $playerCombatEnemies;

    public function __construct()
    {
        $this->playerCombatEnemies = new ArrayCollection();
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

    public function getCurrentRound(): ?int
    {
        return $this->currentRound;
    }

    public function setCurrentRound(int $currentRound): static
    {
        $this->currentRound = $currentRound;

        return $this;
    }

    public function getCurrentTurn(): ?int
    {
        return $this->currentTurn;
    }

    public function setCurrentTurn(int $currentTurn): static
    {
        $this->currentTurn = $currentTurn;

        return $this;
    }

    public function getTurnOrder(): ?array
    {
        return $this->turnOrder;
    }

    public function setTurnOrder(?array $turnOrder): static
    {
        $this->turnOrder = $turnOrder;

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

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function setPlayer(?Player $player): static
    {
        $this->player = $player;

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

    /**
     * @return Collection<int, PlayerCombatEnemy>
     */
    public function getPlayerCombatEnemies(): Collection
    {
        return $this->playerCombatEnemies;
    }

    public function addPlayerCombatEnemy(PlayerCombatEnemy $playerCombatEnemy): static
    {
        if(!$this->playerCombatEnemies->contains($playerCombatEnemy)) {
            $this->playerCombatEnemies->add($playerCombatEnemy);
            $playerCombatEnemy->setPlayerCombat($this);
        }

        return $this;
    }

    public function removePlayerCombatEnemy(PlayerCombatEnemy $playerCombatEnemy): static
    {
        if($this->playerCombatEnemies->removeElement($playerCombatEnemy)) {
            // set the owning side to null (unless already changed)
            if($playerCombatEnemy->getPlayerCombat() === $this) {
                $playerCombatEnemy->setPlayerCombat(null);
            }
        }

        return $this;
    }
}
