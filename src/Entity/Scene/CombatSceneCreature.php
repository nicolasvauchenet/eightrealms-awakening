<?php

namespace App\Entity\Scene;

use App\Entity\Character\Creature;
use App\Repository\Scene\CombatSceneCreatureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CombatSceneCreatureRepository::class)]
class CombatSceneCreature
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $crownReward = null;

    #[ORM\Column(nullable: true)]
    private ?int $xpReward = null;

    #[ORM\Column]
    private ?bool $alive = null;

    #[ORM\ManyToOne(inversedBy: 'combatSceneCreatures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Scene $scene = null;

    #[ORM\ManyToOne(inversedBy: 'combatSceneCreatures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Creature $creature = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getScene(): ?Scene
    {
        return $this->scene;
    }

    public function setScene(?Scene $scene): static
    {
        $this->scene = $scene;

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
