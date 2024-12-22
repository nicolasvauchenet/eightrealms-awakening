<?php

namespace App\Entity\Quest;

use App\Entity\Character\Player;
use App\Entity\Location\Location;
use App\Repository\Quest\CharacterQuestRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterQuestRepository::class)]
class CharacterQuest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\ManyToOne(inversedBy: 'characterQuests')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Player $character = null;

    #[ORM\ManyToOne(inversedBy: 'characterQuests')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Quest $quest = null;

    #[ORM\ManyToOne(inversedBy: 'characterQuests')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Location $startLocation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getCharacter(): ?Player
    {
        return $this->character;
    }

    public function setCharacter(?Player $character): static
    {
        $this->character = $character;

        return $this;
    }

    public function getQuest(): ?Quest
    {
        return $this->quest;
    }

    public function setQuest(?Quest $quest): static
    {
        $this->quest = $quest;

        return $this;
    }

    public function getStartLocation(): ?Location
    {
        return $this->startLocation;
    }

    public function setStartLocation(?Location $startLocation): static
    {
        $this->startLocation = $startLocation;

        return $this;
    }
}
