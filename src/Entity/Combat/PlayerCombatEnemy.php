<?php

namespace App\Entity\Combat;

use App\Entity\Character\Character;
use App\Repository\Combat\PlayerCombatEnemyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerCombatEnemyRepository::class)]
class PlayerCombatEnemy
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
    private ?int $position = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Character $enemy = null;

    #[ORM\ManyToOne(inversedBy: 'playerCombatEnemies')]
    #[ORM\JoinColumn(nullable: false)]
    private ?PlayerCombat $playerCombat = null;

    /**
     * @var Collection<int, PlayerCombatEffect>
     */
    #[ORM\OneToMany(targetEntity: PlayerCombatEffect::class, mappedBy: 'playerCombatEnemy')]
    private Collection $playerCombatEffects;

    public function __construct()
    {
        $this->playerCombatEffects = new ArrayCollection();
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

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function getEnemy(): ?Character
    {
        return $this->enemy;
    }

    public function setEnemy(?Character $enemy): static
    {
        $this->enemy = $enemy;

        return $this;
    }

    public function getPlayerCombat(): ?PlayerCombat
    {
        return $this->playerCombat;
    }

    public function setPlayerCombat(?PlayerCombat $playerCombat): static
    {
        $this->playerCombat = $playerCombat;

        return $this;
    }

    /**
     * @return Collection<int, PlayerCombatEffect>
     */
    public function getPlayerCombatEffects(): Collection
    {
        return $this->playerCombatEffects;
    }

    public function addPlayerCombatEffect(PlayerCombatEffect $playerCombatEffect): static
    {
        if (!$this->playerCombatEffects->contains($playerCombatEffect)) {
            $this->playerCombatEffects->add($playerCombatEffect);
            $playerCombatEffect->setPlayerCombatEnemy($this);
        }

        return $this;
    }

    public function removePlayerCombatEffect(PlayerCombatEffect $playerCombatEffect): static
    {
        if ($this->playerCombatEffects->removeElement($playerCombatEffect)) {
            // set the owning side to null (unless already changed)
            if ($playerCombatEffect->getPlayerCombatEnemy() === $this) {
                $playerCombatEffect->setPlayerCombatEnemy(null);
            }
        }

        return $this;
    }
}
