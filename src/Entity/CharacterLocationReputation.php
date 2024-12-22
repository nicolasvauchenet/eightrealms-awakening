<?php

namespace App\Entity;

use App\Entity\Character\Character;
use App\Entity\Location\Location;
use App\Repository\CharacterLocationReputationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterLocationReputationRepository::class)]
class CharacterLocationReputation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'characterLocationReputations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Character $character = null;

    #[ORM\ManyToOne(inversedBy: 'characterLocationReputations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Location $location = null;

    #[ORM\Column(nullable: true)]
    private ?int $value = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(?int $value): static
    {
        $this->value = $value;

        return $this;
    }
}
