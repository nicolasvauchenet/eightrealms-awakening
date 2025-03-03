<?php

namespace App\Entity\Combat;

use App\Entity\Character\Npc;
use App\Repository\Combat\NpcCombatRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NpcCombatRepository::class)]
class NpcCombat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $health = null;

    #[ORM\Column]
    private ?int $mana = null;

    #[ORM\ManyToOne(inversedBy: 'npcCombats')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Combat $combat = null;

    #[ORM\ManyToOne(inversedBy: 'npcCombats')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Npc $npc = null;

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

    public function getCombat(): ?Combat
    {
        return $this->combat;
    }

    public function setCombat(?Combat $combat): static
    {
        $this->combat = $combat;

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
