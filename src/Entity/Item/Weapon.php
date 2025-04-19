<?php

namespace App\Entity\Item;

use App\Repository\Item\WeaponRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WeaponRepository::class)]
class Weapon extends Item
{
    #[ORM\Column]
    private ?int $healthMax = null;

    #[ORM\Column]
    private ?int $damage = null;

    #[ORM\Column]
    private ?int $range = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $target = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $effect = null;

    #[ORM\Column(nullable: true)]
    private ?int $amount = null;

    #[ORM\Column]
    private ?bool $magical = null;

    public function getHealthMax(): ?int
    {
        return $this->healthMax;
    }

    public function setHealthMax(int $healthMax): static
    {
        $this->healthMax = $healthMax;

        return $this;
    }

    public function getDamage(): ?int
    {
        return $this->damage;
    }

    public function setDamage(int $damage): static
    {
        $this->damage = $damage;

        return $this;
    }

    public function getRange(): ?int
    {
        return $this->range;
    }

    public function setRange(int $range): static
    {
        $this->range = $range;

        return $this;
    }

    public function getTarget(): ?string
    {
        return $this->target;
    }

    public function setTarget(?string $target): static
    {
        $this->target = $target;

        return $this;
    }

    public function getEffect(): ?string
    {
        return $this->effect;
    }

    public function setEffect(?string $effect): static
    {
        $this->effect = $effect;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(?int $amount): static
    {
        $this->amount = $amount;

        return $this;
    }

    public function isMagical(): ?bool
    {
        return $this->magical;
    }

    public function setMagical(bool $magical): static
    {
        $this->magical = $magical;

        return $this;
    }
}
