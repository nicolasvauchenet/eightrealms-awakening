<?php

namespace App\Entity\Screen;

use App\Entity\Character\Npc;
use App\Entity\Location\Place;
use App\Repository\Screen\PlaceScreenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlaceScreenRepository::class)]
class PlaceScreen extends Screen
{
    #[ORM\ManyToOne(inversedBy: 'placeScreens')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Place $place = null;

    /**
     * @var Collection<int, Npc>
     */
    #[ORM\ManyToMany(targetEntity: Npc::class, inversedBy: 'placeScreens')]
    private Collection $npcs;

    public function __construct()
    {
        parent::__construct();
        $this->npcs = new ArrayCollection();
    }

    public function getPlace(): ?Place
    {
        return $this->place;
    }

    public function setPlace(?Place $place): static
    {
        $this->place = $place;

        return $this;
    }

    /**
     * @return Collection<int, Npc>
     */
    public function getNpcs(): Collection
    {
        return $this->npcs;
    }

    public function addNpc(Npc $npc): static
    {
        if(!$this->npcs->contains($npc)) {
            $this->npcs->add($npc);
        }

        return $this;
    }

    public function removeNpc(Npc $npc): static
    {
        $this->npcs->removeElement($npc);

        return $this;
    }
}
