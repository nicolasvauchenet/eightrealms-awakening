<?php

namespace App\Entity\Screen;

use App\Entity\Character\Character;
use App\Repository\Screen\RepairScreenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RepairScreenRepository::class)]
class RepairScreen extends Screen
{
    #[ORM\OneToOne(inversedBy: 'repairScreen', cascade: ['persist', 'remove'])]
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
