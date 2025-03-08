<?php

namespace App\Entity\Combat;

use App\Entity\Character\Creature;
use App\Repository\Combat\CreaturePlayerCombatRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CreaturePlayerCombatRepository::class)]
class CreaturePlayerCombat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $health = null;

    #[ORM\Column]
    private ?int $mana = null;

    #[ORM\ManyToOne(inversedBy: 'creaturePlayerCombats')]
    #[ORM\JoinColumn(nullable: false)]
    private ?PlayerCombat $playerCombat = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Creature $creature = null;

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

    public function getPlayerCombat(): ?PlayerCombat
    {
        return $this->playerCombat;
    }

    public function setPlayerCombat(?PlayerCombat $playerCombat): static
    {
        $this->playerCombat = $playerCombat;

        return $this;
    }

    public function getCreature(): ?Creature
    {
        return $this->creature;
    }

    public function setCreature(?Creature $creature): static
    {
        $this->creature = $creature;

        return $this;
    }
}
