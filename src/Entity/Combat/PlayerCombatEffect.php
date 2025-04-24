<?php

namespace App\Entity\Combat;

use App\Repository\Combat\PlayerCombatEffectRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerCombatEffectRepository::class)]
class PlayerCombatEffect
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $target = null;

    #[ORM\Column]
    private ?int $amount = null;

    #[ORM\Column(nullable: true)]
    private ?int $duration = null;

    #[ORM\ManyToOne(inversedBy: 'playerCombatEffects')]
    private ?PlayerCombat $playerCombat = null;

    #[ORM\ManyToOne(inversedBy: 'playerCombatEffects')]
    private ?PlayerCombatEnemy $playerCombatEnemy = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getTarget(): ?string
    {
        return $this->target;
    }

    public function setTarget(string $target): static
    {
        $this->target = $target;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): static
    {
        $this->amount = $amount;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): static
    {
        $this->duration = $duration;

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

    public function getPlayerCombatEnemy(): ?PlayerCombatEnemy
    {
        return $this->playerCombatEnemy;
    }

    public function setPlayerCombatEnemy(?PlayerCombatEnemy $playerCombatEnemy): static
    {
        $this->playerCombatEnemy = $playerCombatEnemy;

        return $this;
    }
}
