<?php

namespace App\Entity\Scene;

use App\Entity\Character\Npc;
use App\Repository\Scene\CombatSceneNpcRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CombatSceneNpcRepository::class)]
class CombatSceneNpc
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

    #[ORM\ManyToOne(inversedBy: 'combatSceneNpcs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Scene $scene = null;

    #[ORM\ManyToOne(inversedBy: 'combatSceneNpcs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Npc $npc = null;

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

    public function getNpc(): ?Npc
    {
        return $this->npc;
    }

    public function setNpc(?Npc $npc): static
    {
        $this->npc = $npc;

        return $this;
    }
}