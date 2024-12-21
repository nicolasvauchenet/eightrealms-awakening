<?php

namespace App\Entity\Scene;

use App\Entity\Location\Place;
use App\Repository\Scene\PlaceSceneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaceSceneRepository::class)]
class PlaceScene extends Scene
{
    #[ORM\ManyToOne(inversedBy: 'placeScenes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Place $place = null;

    public function getPlace(): ?Place
    {
        return $this->place;
    }

    public function setPlace(?Place $place): static
    {
        $this->place = $place;

        return $this;
    }
}
