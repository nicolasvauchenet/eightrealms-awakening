<?php

namespace App\Entity\Location;

use App\Entity\Character\Player;
use App\Entity\Item\Misc;
use App\Repository\Location\LocationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: LocationRepository::class)]
class Location
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Gedmo\Slug(fields: ['name'])]
    private ?string $slug = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $picture = null;

    /**
     * @var Collection<int, Place>
     */
    #[ORM\OneToMany(targetEntity: Place::class, mappedBy: 'location')]
    private Collection $places;

    /**
     * @var Collection<int, Player>
     */
    #[ORM\ManyToMany(targetEntity: Player::class, mappedBy: 'visitedLocations')]
    private Collection $players;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Misc $map = null;

    public function __construct()
    {
        $this->places = new ArrayCollection();
        $this->players = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): static
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * @return Collection<int, Place>
     */
    public function getPlaces(): Collection
    {
        return $this->places;
    }

    public function addPlace(Place $place): static
    {
        if(!$this->places->contains($place)) {
            $this->places->add($place);
            $place->setLocation($this);
        }

        return $this;
    }

    public function removePlace(Place $place): static
    {
        if($this->places->removeElement($place)) {
            // set the owning side to null (unless already changed)
            if($place->getLocation() === $this) {
                $place->setLocation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Player>
     */
    public function getPlayers(): Collection
    {
        return $this->players;
    }

    public function addPlayer(Player $player): static
    {
        if(!$this->players->contains($player)) {
            $this->players->add($player);
            $player->addVisitedLocation($this);
        }

        return $this;
    }

    public function removePlayer(Player $player): static
    {
        if($this->players->removeElement($player)) {
            $player->removeVisitedLocation($this);
        }

        return $this;
    }

    public function getMap(): ?Misc
    {
        return $this->map;
    }

    public function setMap(?Misc $map): static
    {
        $this->map = $map;

        return $this;
    }
}
