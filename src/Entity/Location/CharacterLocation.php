<?php

namespace App\Entity\Location;

use App\Entity\Character\Character;
use App\Repository\Location\CharacterLocationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterLocationRepository::class)]
class CharacterLocation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?array $conditions = null;

    #[ORM\ManyToOne(inversedBy: 'characterLocations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Character $character = null;

    #[ORM\ManyToOne(inversedBy: 'characterLocations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Location $location = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConditions(): ?array
    {
        return $this->conditions;
    }

    public function setConditions(?array $conditions): static
    {
        $this->conditions = $conditions;

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

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): static
    {
        $this->location = $location;

        return $this;
    }
}
