<?php

namespace App\Entity\Location;

use App\Entity\Character\Creature;
use App\Repository\Location\CreatureLocationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CreatureLocationRepository::class)]
class CreatureLocation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Creature $creature = null;

    #[ORM\ManyToOne(inversedBy: 'creatureLocations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Location $location = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreature(): ?Creature
    {
        return $this->creature;
    }

    public function setCreature(?Creature $creature): static
    {
        $this->creature = $creature;

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
