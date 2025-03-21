<?php

namespace App\Entity\Screen;

use App\Entity\Location\Location;
use App\Repository\Screen\LocationScreenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocationScreenRepository::class)]
#[ORM\Table(name: '`screen_location`')]
class LocationScreen extends Screen
{
    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Location $location = null;

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(Location $location): static
    {
        $this->location = $location;

        return $this;
    }
}
