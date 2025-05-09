<?php

namespace App\Entity\Spell;

use App\Entity\Character\Character;
use App\Repository\Spell\CharacterSpellRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterSpellRepository::class)]
class CharacterSpell
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $level = null;

    #[ORM\Column(nullable: true)]
    private ?int $manaCost = null;

    #[ORM\Column(nullable: true)]
    private ?int $amountBonus = null;

    #[ORM\Column(nullable: true)]
    private ?int $areaBonus = null;

    #[ORM\Column(nullable: true)]
    private ?int $durationBonus = null;

    #[ORM\ManyToOne(inversedBy: 'characterSpells')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Character $character = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Spell $spell = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): static
    {
        $this->level = $level;

        return $this;
    }

    public function getManaCost(): ?int
    {
        return $this->manaCost;
    }

    public function setManaCost(?int $manaCost): static
    {
        $this->manaCost = $manaCost;

        return $this;
    }

    public function getAmountBonus(): ?int
    {
        return $this->amountBonus;
    }

    public function setAmountBonus(?int $amountBonus): static
    {
        $this->amountBonus = $amountBonus;

        return $this;
    }

    public function getAreaBonus(): ?int
    {
        return $this->areaBonus;
    }

    public function setAreaBonus(?int $areaBonus): static
    {
        $this->areaBonus = $areaBonus;

        return $this;
    }

    public function getDurationBonus(): ?int
    {
        return $this->durationBonus;
    }

    public function setDurationBonus(?int $durationBonus): static
    {
        $this->durationBonus = $durationBonus;

        return $this;
    }

    public function getCharacter(): ?Character
    {
        return $this->character;
    }

    public function setCharacter(?Character $character): static
    {
        $this->character = $character;

        return $this;
    }

    public function getSpell(): ?Spell
    {
        return $this->spell;
    }

    public function setSpell(?Spell $spell): static
    {
        $this->spell = $spell;

        return $this;
    }
}
