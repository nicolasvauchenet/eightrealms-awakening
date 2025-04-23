<?php

namespace App\Entity\Screen;

use App\Entity\Reward\Reward;
use App\Repository\Screen\CinematicScreenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CinematicScreenRepository::class)]
class CinematicScreen extends Screen
{
    #[ORM\ManyToOne]
    private ?Reward $reward = null;

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
