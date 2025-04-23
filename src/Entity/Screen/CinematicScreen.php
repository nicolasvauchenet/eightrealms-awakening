<?php

namespace App\Entity\Screen;

use App\Entity\Reward\Reward;
use App\Repository\Screen\CinematicScreenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CinematicScreenRepository::class)]
class CinematicScreen extends Screen
{
    #[ORM\Column]
    private array $actions = [];

    #[ORM\ManyToOne]
    private ?Reward $reward = null;

    public function getActions(): array
    {
        return $this->actions;
    }

    public function setActions(array $actions): static
    {
        $this->actions = $actions;

        return $this;
    }

    public function getReward(): ?Reward
    {
        return $this->reward;
    }

    public function setReward(?Reward $reward): static
    {
        $this->reward = $reward;

        return $this;
    }
}
