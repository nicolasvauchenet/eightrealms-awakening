<?php

namespace App\Entity\Combat;

use App\Entity\Character\Character;
use App\Repository\Combat\EnemyCombatRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EnemyCombatRepository::class)]
class CombatEnemy
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

    #[ORM\ManyToOne(inversedBy: 'combatEnemies')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Character $enemy = null;

    #[ORM\ManyToOne(inversedBy: 'combatEnemies')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Combat $combat = null;

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

    public function getCombat(): ?Combat
    {
        return $this->combat;
    }

    public function setCombat(?Combat $combat): static
    {
        $this->combat = $combat;

        return $this;
    }
}
