<?php

namespace App\Entity\Screen;

use App\Entity\Character\Character;
use App\Repository\Screen\ReloadScreenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReloadScreenRepository::class)]
class ReloadScreen extends Screen
{
    #[ORM\OneToOne(inversedBy: 'reloadScreen', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Character $character = null;

    public function getCharacter(): ?Character
    {
        return $this->character;
    }

    public function setCharacter(Character $character): static
    {
        $this->character = $character;

        return $this;
    }
}
