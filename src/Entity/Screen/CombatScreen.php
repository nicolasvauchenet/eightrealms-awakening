<?php

namespace App\Entity\Screen;

use App\Entity\Combat\Combat;
use App\Repository\Screen\CombatScreenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CombatScreenRepository::class)]
class CombatScreen extends Screen
{
    #[ORM\OneToOne(inversedBy: 'combatScreen', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Combat $combat = null;

    public function getCombat(): ?Combat
    {
        return $this->combat;
    }

    public function setCombat(Combat $combat): static
    {
        $this->combat = $combat;

        return $this;
    }
}
