<?php

namespace App\Entity\Character;

use App\Repository\Character\CreatureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CreatureRepository::class)]
class Creature extends Character
{
    #[ORM\Column]
    private ?int $level = null;

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): static
    {
        $this->level = $level;

        return $this;
    }
}
