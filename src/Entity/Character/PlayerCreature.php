<?php

namespace App\Entity\Character;

use App\Entity\Scene\Scene;
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

    #[ORM\Column(nullable: true)]
    private ?int $crownReward = null;

    #[ORM\Column(nullable: true)]
    private ?int $xpReward = null;

    #[ORM\Column]
    private ?bool $alive = null;

    #[ORM\ManyToOne(inversedBy: 'playerCreatures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Player $player = null;

    #[ORM\ManyToOne(inversedBy: 'playerCreatures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Creature $creature = null;

    #[ORM\ManyToOne(inversedBy: 'playerCreatures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Scene $scene = null;

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

    public function getCrownReward(): ?int
    {
        return $this->crownReward;
    }

    public function setCrownReward(?int $crownReward): static
    {
        $this->crownReward = $crownReward;

        return $this;
    }

    public function getXpReward(): ?int
    {
        return $this->xpReward;
    }

    public function setXpReward(?int $xpReward): static
    {
        $this->xpReward = $xpReward;

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

    public function getScene(): ?Scene
    {
        return $this->scene;
    }

    public function setScene(?Scene $scene): static
    {
        $this->scene = $scene;

        return $this;
    }
}
