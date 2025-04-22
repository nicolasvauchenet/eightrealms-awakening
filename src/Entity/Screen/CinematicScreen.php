<?php

namespace App\Entity\Screen;

use App\Repository\Screen\CinematicScreenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CinematicScreenRepository::class)]
class CinematicScreen extends Screen
{
    #[ORM\Column]
    private array $actions = [];

    #[ORM\Column]
    private ?bool $rewarded = null;

    public function getActions(): array
    {
        return $this->actions;
    }

    public function setActions(array $actions): static
    {
        $this->actions = $actions;

        return $this;
    }

    public function isRewarded(): ?bool
    {
        return $this->rewarded;
    }

    public function setRewarded(bool $rewarded): static
    {
        $this->rewarded = $rewarded;

        return $this;
    }
}
