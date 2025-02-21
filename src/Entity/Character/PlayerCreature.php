<?php

namespace App\Entity\Character;

use App\Repository\Character\PlayerCreatureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerCreatureRepository::class)]
class PlayerCreature
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $health = null;

    #[ORM\Column]
    private ?int $mana = null;

    #[ORM\ManyToOne(inversedBy: 'playerCreatures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Player $player = null;

    #[ORM\ManyToOne(inversedBy: 'playerCreatures')]
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

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function setPlayer(?Player $player): static
    {
        $this->player = $player;

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
