<?php

namespace App\Entity\Combat;

use App\Entity\Character\Npc;
use App\Repository\Combat\NpcPlayerCombatRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NpcPlayerCombatRepository::class)]
class NpcPlayerCombat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $health = null;

    #[ORM\Column]
    private ?int $mana = null;

    #[ORM\ManyToOne(inversedBy: 'npcPlayerCombats')]
    #[ORM\JoinColumn(nullable: false)]
    private ?PlayerCombat $playerCombat = null;

    #[ORM\ManyToOne]
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

    public function getPlayerCombat(): ?PlayerCombat
    {
        return $this->playerCombat;
    }

    public function setPlayerCombat(?PlayerCombat $playerCombat): static
    {
        $this->playerCombat = $playerCombat;

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
